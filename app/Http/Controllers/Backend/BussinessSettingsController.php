<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BussinessSettings;
use Illuminate\Http\Request;

class BussinessSettingsController extends Controller
{
    public function settings()
    {
        $settings = BussinessSettings::where('id',1)->first();
        return view('backend.pages.settings.edit',compact('settings'));
    }

    public function settingsUpdate(Request $request, $id)
    {
        $settings = BussinessSettings::find($id);
        try {
            if ($settings) {
                $settings->update([
                    'name'=>$request->name,
                    'about'=>$request->about,
                    'email'=>$request->email,
                    'contact'=>$request->contact,
                    'address'=>$request->address,
                ]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
