<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UnapprovedUsers extends Component
{
    public $unapprovedUsers;

    public function mount()
    {
        $this->getUnapprovedUsers();
    }

    public function getUnapprovedUsers()
    {
        $this->unapprovedUsers = User::where('approved', false)->get();
    }

    public function approveUser($userId)
    {
        $user = User::find($userId);
        $user->approved = true;
        $user->save();

        $this->getUnapprovedUsers();
    }
    public function render()
    {
        return view('livewire.admin.unapproved-users');
    }
}
