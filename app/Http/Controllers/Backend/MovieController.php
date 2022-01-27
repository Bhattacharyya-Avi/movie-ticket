<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Slot;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movie()
    {

        $categories = Category::all();
        // dd($categories);
        $slots = Slot::all();
        // dd($slots);
        $movies = Movie::with('category', 'slot')->withTrashed()->get();
        // dd($movies);
        return view('backend.pages.movie.movie', compact('categories', 'slots', 'movies'));
    }

    public function movieAdd(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'details'=>'required',
            'category' =>'required',
            'slot' =>'required',
            'price' =>'required',
        ]);
        // dd($request->all());
        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/uploads/movie', $filename);
        }

        Movie::create([
            'name' => $request->name,
            'details' => $request->details,
            'category_id' => $request->category,
            'slot_id' => $request->slot,
            'ticket_price' => $request->price,
            'image' => $filename,
        ]);
        session()->flash('success', 'Movie Added.');
        return redirect()->back();
    }

    public function movieEdit($id)
    {
        $categories = Category::all();
        // dd($categories);
        $slots = Slot::all();
        // dd($slots);
        $movie = Movie::find($id);
        if ($movie) {
            return view('backend.pages.movie.movieEdit', compact('movie', 'categories', 'slots'));
        } else {
            session()->flash('error', 'Movie not found!');
            return redirect()->back();
        }
    }

    public function movieUpdate(Request $request, $id)
    {
        // dd($request->all());
        $movie = Movie::find($id);
        $filename = $movie->image;
        if ($movie) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/uploads/movie', $filename);
            }
            $movie->update([
                'name' => $request->name,
                'details' => $request->details,
                'category_id' => $request->category,
                'slot_id' => $request->slot,
                'image' => $filename
            ]);
            session()->flash('success', 'Movie updated');
            return redirect()->route('admin.movie.list')->with('message', 'Movie updated');
        } else {
            session()->flash('error', 'Movie Not found!');
            return redirect()->route('admin.movie.list');
        }
    }

    public function moviedelete($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            session()->flash('success', 'Movie Removed!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Movie not found.');
            return redirect()->back();
        }
    }

    public function movierestore($id)
    {
        $movie = Movie::withTrashed()->find($id);
        if ($movie) {
            $movie->restore();
            session()->flash('success', 'Movie restored.');
            return redirect()->back();
        } else {
            session()->flash('error', 'Movie not found.');
            return redirect()->back();
        }
    }
}
