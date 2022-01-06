<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Movie;
use App\Models\Movies_seat;
use App\Models\Seat;
use Illuminate\Http\Request;

class TicketBookController extends Controller
{
    public function bookMovie($id)
    {
        $seats = Seat::where('status','free')->get();
        $movie = Movie::find($id);
        if ($movie) {
            return view('frontend.pages.ticketbook.ticket',compact('movie','seats'));
        }else {
            session()->flash('error','Movie Not Found!');
            return redirect()->back();
        }
        
    }

    public function bookTicket(Request $request)
    {
        // dd($request->all());
        $book=Book::create([
            'user_id'=>$request->user_id,
            'movie_id'=>$request->movie_id
        ]);

        foreach ($request->seat as $value) {
            Movies_seat::create([
                'books_id'=>$book->id,
                'seat_id'=>$value
            ]);
            // Seat::where('id',$value)->update([
            //     'status'=>'booked'
            // ]);
        }

        return redirect()->back();
    }
}
