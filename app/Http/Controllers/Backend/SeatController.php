<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function seat()
    { $seats = Seat::withTrashed()->get();
        return view('backend.pages.seat.seat',compact('seats'));
    }

    public function seatadd(Request $request)
    {
        Seat::create([
            'seat_number'=>$request->seat_number,
            'details'=>$request->details,
            'status'=>$request->status
        ]);
        session()->flash('success','Seat Added.');
        return redirect()->back();
    }

    public function seatEdit($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            return view('backend.pages.seat.seatEdit',compact('seat'));
        }
        else {
            session()->flash('error','Seat not found');
            return redirect()->back();
        }
    }

    public function seatUpdate(Request $request,$id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $seat->update([
                'seat_number'=>$request->seat_number,
                'details'=>$request->details,
                'status'=>$request->status
            ]);
            session()->flash('success','Seat added');
            return redirect()->route('admin.seat.list');
        }
        else{
            session()->flash('error','Seat not found');
            return redirect()->route('admin.seat.list');
        }
    }

    public function seatDetele($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $seat->delete();
            session()->flash('success','Seat deleted.');
            return redirect()->back();
        }
        else {
            session()->flash('error','Seat not found');
            return redirect()->back();
        }
    }
    public function seatRestore($id){
        $seat = Seat::withTrashed()->find($id);
        if ($seat) {
            $seat->restore();
            session()->flash('success','Seat restored.');
            return redirect()->back();
            
        }
        else {
            session()->flash('error','Seat not found');
        }
    }
}
