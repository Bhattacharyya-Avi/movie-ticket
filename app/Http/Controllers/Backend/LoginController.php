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
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
