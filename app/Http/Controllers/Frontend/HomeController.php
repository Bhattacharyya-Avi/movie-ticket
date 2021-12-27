<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function master(){
        return view('frontend/master');
    }

    public function index(){
        // $moviepopular = Movie::all()->random(3);
        $moviepopular = Movie::latest()->take(3)->get();
        // dd($moviepopular);
        $movieall = Movie::all();
        return view('frontend.pages.home.index',compact('moviepopular','movieall'));
    }
}
