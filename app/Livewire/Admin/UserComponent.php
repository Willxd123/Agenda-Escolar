<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        $users=User::paginate();
        return view('livewire.admin.user-component');
    }
}
