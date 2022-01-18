<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentList(){
        $payments = Payment::with(['user','movie'])->get();
        // dd($payments);
        return view('backend.pages.payment.payment',compact('payments'));
    }

    public function paymentApprove($id){
        // dd($id);
        Payment::where('id',$id)->update([
            'status'=>'approved'
        ]);
        session()->flash('success', 'Payment Approved!');
        return redirect()->back();
    }

    public function paymentDelete($id){
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            session()->flash('success','Record Deleted!');
            return redirect()->back();
        }
        else {
            session()->flash('error','Record Not Found!');
            return redirect()->back();
        }
    }
}
