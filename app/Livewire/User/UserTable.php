<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public function render()
    {
        $data = [];

        $data['users'] = User::query()
            ->orderBy('id', 'desc')->get();

        return view('livewire.user.user-table', $data);
    }
}
