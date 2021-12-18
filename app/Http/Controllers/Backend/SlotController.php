<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function slot(){
        $slots = Slot::withTrashed()->get();
        return view('backend.pages.time.slotList',compact('slots'));
    }

    public function slotCreate(Request $request){
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'start'=>'required',
            'end'=>'required',
        ]);

        Slot::create([
            'name'=>$request->name,
            'details'=>$request->details,
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        return redirect()->back()->with('message','Sloat added!');
    }

    public function slotEdit($id){
        $slot = Slot::find($id);
        if ($slot) {
            return view('backend.pages.time.slotEdit',compact('slot'));
        }
        else
        return redirect()->back()->with('error','Slot not found!');
    }

    public function slotUpdate(Request $request,$id){
        $slot = Slot::find($id);
        if ($slot) {
            $slot->update([
                'name'=>$request->name,
                'details'=>$request->details,
                'start'=>$request->start,
                'end'=>$request->end,
            ]);
            return redirect()->route('admin.slot')->with('message','Sloat updated');
        }
        else
            return redirect()->route('admin.slot')->with('message','Sloat not found!');

    }

    public function slotDelete($id){
        $slot = Slot::find($id);
        if ($slot) {
            $slot->delete();
            return redirect()->back()->with('message','Slot removed!');
        }
        else
            return redirect()->back()->with('message','Slot not found!');

    }

    public function slotRestore($id){
        $slot = Slot::withTrashed()->find($id);
        if ($slot) {
            $slot->restore();
            return redirect()->back()->with('message','Slot restored!');
        }
        else
            return redirect()->back()->with('message','Slot not found!');
    }
}
