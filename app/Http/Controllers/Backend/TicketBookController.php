<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
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
}
