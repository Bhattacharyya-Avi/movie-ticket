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
        $movies = Movie::latest()->take(6)->get();
        $categories = Category::all();
        // dd($categories);
        //dd(auth()->user());
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));
    }

    public function allMovie(){
        $movies = Movie::all(); 
        $categories = Category::all();
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));

    }

    public function categoryMovie($id){
        $movies = Movie::where('category_id',$id)->get();
        $categories = Category::all();
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));
        
    }

    public function singleMovie($id){
        // dd($id);
        $movie = Movie::find($id);
        return view('frontend.pages.movieList.details',compact('movie'));
    }

    public function searchMovie(){
        // dd(request()->all());
        $categories = Category::all();
        $key = request()->search;
        $movies = Movie::where('name','Like',"%{$key}%")->get();
        return view('frontend.pages.movieList.movieList',compact('movies','categories'));
    }


    // public function searchMovie(){
    //     $key = request()->name;
    //     // dd(request()->all());
    //     // dd($key);
    //     $movies=Movie::where('name','LIKE',"%{$key}%")->get();
    //     dd($movies);

    // }
}
