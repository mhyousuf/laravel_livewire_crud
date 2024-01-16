<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public $model = User::class;

    public function persists($attributes = [])
    {
        if (! data_get($attributes, 'password')) {
            unset($attributes['password']);
        }

        if (data_get($attributes, 'password')) {
            $attributes['password'] = bcrypt(data_get($attributes, 'password'));
        }

        $files = ['image'];

        foreach ($files as $key => $file) {
            if (isset($attributes[$file])) {
                $media = $attributes[$file];

                $foldername = 'text_image';

                $name = time() + ($key + 1).'.'.\Str::slug($media->getClientOriginalExtension());

                $upload = $media->storeAs($foldername, $name);

                $attributes[$file] = $foldername.'/'.$name;
            }
        }

        return $attributes;
    }

    public function create($attributes = [])
    {
        $user = User::create($this->persists($attributes));

        if (data_get($attributes, 'nid_front')) {
            $user->addMedia($attributes['nid_front'])->toMediaCollection('nid_front');
        }

        if (data_get($attributes, 'nid_back')) {
            $user->addMedia($attributes['nid_back'])->toMediaCollection('nid_back');
        }

        if (data_get($attributes, 'passport')) {
            $user->addMedia($attributes['passport'])->toMediaCollection('passport');
        }
    }

    public function update($attributes, $user)
    {
        if (isset($attributes['image']) && $user->image !== null) {
            Storage::delete($user->image);
        }

        $user->update($this->persists($attributes));

        if (data_get($attributes, 'nid_front')) {
            $user->addMedia($attributes['nid_front'])->toMediaCollection('nid_front');
        }

        if (data_get($attributes, 'nid_back')) {
            $user->addMedia($attributes['nid_back'])->toMediaCollection('nid_back');
        }

        if (data_get($attributes, 'passport')) {
            $user->addMedia($attributes['passport'])->toMediaCollection('passport');
        }
    }

    public function delete($user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }

        return $user->delete();
    }
}
