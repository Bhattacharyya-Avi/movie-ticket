<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment($id){
        $book = Book::with('movieSeats')->find($id);
        // dd($book);
        return view('frontend.pages.payment.payment',compact('book'));
    }

    public function paymentPost(Request $request,$id){
        // dd($id);
        // dd($request->all());
        Payment::create([
            'user_id'=>$request->user_id,
            'book_id'=>$id,
            'movie_id'=>$request->movie_id,
            'payment_method'=>$request->payment_method,
            'account_number'=>$request->account_number,
            'amount'=>$request->amount
        ]);
        session()->flash('success','Payment request has sent.');
        return redirect()->route('ticket.book.history');
    }
}
