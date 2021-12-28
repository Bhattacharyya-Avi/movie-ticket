<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view('frontend.pages.loginRegistration.login');
    }

    public function registration(){
        return view('frontend.pages.loginRegistration.registration');
    }

    public function registrationPost(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:5',
            'username'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password),
            'username'=>$request->username,
        ]);

        return redirect()->route('user.login');
    }

    public function doLogin(Request $request){
        // dd($request->all());
        $userpost = $request->except('_token');
        // dd($userpost);
        // dd(Auth::attempt($userpost));
        if (Auth::attempt($userpost)) {
            return redirect()->route('frontend.index');
        }
        else {
            return redirect()->back();
        }

    }

    public function userLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
