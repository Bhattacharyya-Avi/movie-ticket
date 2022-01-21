<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        $users = User::withTrashed()->where('role','user')->get();
        return view('backend.pages.user.user',compact('users'));
    }

    public function userBlock($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            session()->flash('warning', 'User blocked!');
            return redirect()->back();
        }
        else {
            session()->flash('error','User not found.');
            return redirect()->back();
        }
    }

    public function userFree($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user) {
            $user->restore();
            session()->flash('success', 'User unblocked!');
            return redirect()->back();
        }
        else {
            session()->flash('error', 'user not found');
            return redirect()->back();
        }
    }
}
