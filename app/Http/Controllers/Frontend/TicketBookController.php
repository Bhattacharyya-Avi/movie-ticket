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
        $user_id = auth()->user()->id;
        // dd($user_id);
        $book = Book::where([
            ['movie_id',$id],
            ['user_id',$user_id]
        ])->get();
        // dd($book);
        if (!empty($book)) {
            foreach ($book as $value) {
                $seatBooked = Movies_seat::where([
                    ['books_id',$value->id]
                ])->get();
                // dd($seatBooked);
            }
        } 
        // dd($seatBooked);
        $X=$seatBooked->pluck('seat_id');
        // dd($X);
        if (!empty($seatBooked)) {
            // foreach ($X as $key => $x) {
            $seats = Seat::where([
                ['id', '!=', $X]
            ])->get();
            // dd($seats);
        // }
        } else {
            // dd("in else seat");
            $seats = Seat::all();
            
        }
        
        // dd($key);
        // dd($seats);
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
         //dd($request->all());
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
