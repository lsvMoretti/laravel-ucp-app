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
//        $user = User::find(2);
//        $user->approved = false;
//        $user->save();

        $this->unapprovedUsers = User::where('approved', false)->get();
    }

    public function approveUser($userId)
    {
        $user = User::find($userId);
        $user->approved = true;
        $user->save();

        session()->flash('message', "$user->username has been approved!");

        return redirect('admin/unapproved');
    }
    public function render()
    {
        return view('livewire.admin.unapproved-users');
    }
}
