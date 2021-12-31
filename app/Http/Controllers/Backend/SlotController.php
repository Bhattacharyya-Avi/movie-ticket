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
        session()->flash('success','Sloat added');
        return redirect()->back();
    }

    public function slotEdit($id){
        $slot = Slot::find($id);
        if ($slot) {
            return view('backend.pages.time.slotEdit',compact('slot'));
        }
        else
        session()->flash('error','Slot not found');
        return redirect()->back();
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
            session()->flash('success','Slot updated.');
            return redirect()->route('admin.slot');
        }
        else
        session()->flash('error','Slot not found');
            return redirect()->route('admin.slot');

    }

    public function slotDelete($id){
        $slot = Slot::find($id);
        if ($slot) {
            $slot->delete();
            session()->flash('success','Slot removed.');
            return redirect()->back();
        }
        else
        session()->flash('error','Slot not found');
            return redirect()->back();

    }

    public function slotRestore($id){
        $slot = Slot::withTrashed()->find($id);
        if ($slot) {
            $slot->restore();
            session()->flash('success','Slot restored');
            return redirect()->back();
        }
        else
        session()->flash('error','Slot not found');
            return redirect()->back();
    }
}
