<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('backend.pages.login.login');
    }

    public function doLogin(Request $request){
        // dd($request->all());
        $userpost = $request->except('_token');
        // dd(Auth::attempt($userpost));
        if (Auth::attempt($userpost)) {
            session()->flash('success','Login suceessful!');
            return redirect()->route('admin.dashboard');
        }
        else {
            session()->flash('error','Invalid Emaill or Password');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        session()->flash('warning','Successfully loged out!');
        return redirect()->route('admin.login');
    }
}
