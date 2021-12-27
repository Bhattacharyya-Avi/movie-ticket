<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('frontend.pages.loginRegistration.login');
    }

    public function registration(){
        return view('frontend.pages.loginRegistration.registration');
    }
}
