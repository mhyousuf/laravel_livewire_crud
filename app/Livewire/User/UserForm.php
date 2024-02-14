<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Services\UserService;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;

class UserForm extends Component
{
    use WithFileUploads;

    public $userId;
    public $name;
    public $email;
    public $password;
    public $image;
    public $nid_front;
    public $nid_back;
    public $passport;

    public UserService $userService;

    public function mount()
    {
        if($userId = $this->userId) {
            $user = User::find($userId);

            $this->fill($user->getAttributes());
            $this->image = null;
            $this->password = old('password');
            // $this->password = old('password') ?? null;
        }
    }

    public function submit()
    {
        $this->validation();

        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['password'] = bcrypt($this->password);

        // dd($data);
        $fields = ['image'];
        foreach ($fields as $key => $field) {

            $file = $this->$field;
            // dd($file);
            if(!$file){
                continue;
            }
            $foldername = 'text_image';

            $name = time() + ($key + 1).'.'.\Str::slug($file->getClientOriginalExtension());

            $upload = $file->storeAs($foldername, $name);

            $data['image'] = $foldername.'/'.$name;
        }

        if ($this->userId) {
            $user = User::find($this->userId);
            // if($user->image){
            //     Storage::delete($user->image);
            // }
            User::find($this->userId)->update($data);

        } else {
            $user = User::create($data);
            $this->image = null;
        }

        // if($user->image){
        //         Storage::delete($user->image);
        //     }

        if ($this->nid_front) {
            $nid_f = $this->nid_front;

            $user->addMedia($nid_f)
                // ->usingFileName(uniqid() . '_' . time() . '.' . $nid_f->extension())
                ->toMediaCollection('nid_front');
        }

        if ($this->nid_back) {
            $nid_b = $this->nid_back;

            $user->addMedia($nid_b)
                // ->usingFileName(uniqid() . '_' . time() . '.' . $nid_b->extension())
                ->toMediaCollection('nid_back');
        }

        if ($this->passport) {
            $pass = $this->passport;

            $user->addMedia($pass)
                // ->usingFileName(uniqid() . '_' . time() . '.' . $pass->extension())
                ->toMediaCollection('passport');
        }

        // $media = Media::find('id');

        // if ($media) {
        //     $media->delete();

        //     Storage::delete([$media->nid_front, $media->nid_back, $media->passport]);
        // }

        // dd($data);
        session()->flash('type','Storage Data Entered succesfully');

        return redirect(route('user.backend.users.index'));
    }


    protected function validation()
    {
        return $this->validate([
            'name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
            ],
            'password' => [
                'required_if:isMethod,POST',
            ],
            'image.*' => [
                'nullable',
                'file',
                'max:10000',
            ],
        ]);
    }

    public function render()
    {

        $data = [];

        $data['users'] = User::find($this->userId);

        return view('livewire.user.user-form', $data);
    }
}
