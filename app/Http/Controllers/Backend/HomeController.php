<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $movie = Movie::count();
        $category = Category::count();
        $slot = Slot::count();
        $user = User::count();
        return view('backend.pages.dashboard',compact('movie','category','slot','user'));
    }
}
