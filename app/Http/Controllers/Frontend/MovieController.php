<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

class MovieController extends Controller
{
    public function movieList(){
        $movies = Movie::all()->random(6);
        $categories = Category::all()->random(4);
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));
    }

    public function allMovie(){
        $movies = Movie::all();
        $categories = Category::all()->random(4);
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));

    }

    public function categoryMovie($id){
        $movies = Movie::where('category_id',$id)->get();
        $categories = Category::all()->random(4);
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));
        
    }
}
