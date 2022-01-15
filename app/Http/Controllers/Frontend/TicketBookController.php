<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Movie;
use App\Models\Movies_seat;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketBookController extends Controller
{
    public function bookMovie($id)
    {
        // $user_id = auth()->user()->id;
        // // dd($user_id);
        // $book = Book::where([
        //     ['movie_id',$id],
        //     ['user_id',$user_id]
        // ])->get();
        // // dd($book);
        // if (!empty($book)) {
        //     foreach ($book as $value) {
        //         $seatBooked = Movies_seat::where([
        //             ['books_id',$value->id]
        //         ])->get();
        //         // dd($seatBooked);
        //     }
        // } 
        // // dd($seatBooked);
        // $X=$seatBooked->pluck('seat_id');
        // // dd($X);
        // if (!empty($seatBooked)) {
        //     // foreach ($X as $key => $x) {
        //     $seats = Seat::where([
        //         ['id', '!=', $X]
        //     ])->get();
        //     // dd($seats);
        // // }
        // } else {
        //     // dd("in else seat");
        //     $seats = Seat::all();

        // }

        // // dd($key);
        // // dd($seats);
        // if ($movie) {
        //     return view('frontend.pages.ticketbook.ticket',compact('movie','seats'));
        // }else {
        //     session()->flash('error','Movie Not Found!');
        //     return redirect()->back();
        // }
        $books = Book::where([
            ['movie_id', $id]
        ])->get();
        // dd($books);
        $books_ids = $books->pluck('id');
        // dd($books_ids);
        $movie_based_booked_seats = Movies_seat::whereIn('books_id', $books_ids)->get();
        $booked_seat_ids = $movie_based_booked_seats->pluck('seat_id');
        $seats = Seat::whereNotIn('id', $booked_seat_ids)->get();
        // dd($seats);
        $movie = Movie::find($id);
        return view('frontend.pages.ticketbook.ticket', compact('movie', 'seats'));
    }

    public function bookTicket(Request $request)
    {
        //dd($request->all());
        $book = Book::firstOrCreate([
            'user_id' => auth()->user()->id,
            'movie_id' => $request->movie_id
        ]);
        // dd($book);
        foreach ($request->seat as $value) {
            Movies_seat::create([
                'books_id' => $book->id,
                'seat_id' => $value
            ]);
            // Seat::where('id',$value)->update([
            //     'status'=>'booked'
            // ]);
        }

        return redirect()->back();
    }

    public function history(){
        $history = Book::with(['movieSeats'])->where('user_id',auth()->user()->id)->withTrashed()->get();
        // dd($history);
        return view('frontend.pages.ticketbook.history',compact('history'));
    }
}
