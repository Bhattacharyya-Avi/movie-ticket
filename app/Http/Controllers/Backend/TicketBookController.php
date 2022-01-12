<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketBookController extends Controller
{
    public function bookList(){
        $bookDetails =Book::with('movieSeats')->get();
        // dd($bookDetails); 
        return view('backend.pages.ticket.booklist',compact('bookDetails'));
    }

    public function bookDetails($id){
        $book = Book::with('movieSeats')->find($id);
        // $book 
        // dd($book);
        return view('backend.pages.ticket.details',compact('book'));
    }
    
    public function bookRelease(){
        $now = Carbon::now();
        // dd($now);
        $booked = Book::all();
        // dd($booked);
        foreach ($booked as $key => $book) {
            $booked_time = $book->created_at;
            // dd($booked_time);
            $diffInHours = Carbon::parse($booked_time);
            $length = $diffInHours->diffInHours($now);
            // dd($length);
            if ($length>24) {
                $book->delete();
            }
            else {
                session()->flash('error','no set was booked befor 24 hours!');
                return redirect()->back();
            }
        }
        
    }
}
