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
        session()->flash('success','Your ticket has booked.');

        return redirect()->route('ticket.book.history');
    }

    public function history(){
        $history = Book::with(['movieSeats'])->where('user_id',auth()->user()->id)->withTrashed()->get();
        // dd($history);
        return view('frontend.pages.ticketbook.history',compact('history'));
    }
}
