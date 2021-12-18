<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::withTrashed()->get();
        return view('backend.pages.category.categoryList',compact('categories'));
    }

    public function categoryCreate(Request $request){
        // dd($request->all());

        $request->validate([
            'name'=>'required',
            'details'=>'required'
        ]);

        if ($request->hasFile('image')) {
            $file= $request->file('image');
            $filename= date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads/category',$filename);
        }

        Category::create([
            'name'=>$request->name,
            'details'=>$request->details,
            'image'=>$filename
        ]);
        return redirect()->back();
    }

    public function categoryEdit($id){
        // dd($id);
        $category = Category::find($id);
        // dd($category);
        if ($category) {
            return view('backend.pages.category.categoryEdit',compact('category'));
        }
        else
        return redirect()->back()->with('error','Category not found');
        

    }

    public function categoryEditUpdate(Request $request,$id){
        // dd($id);
        // dd($request->all());
        // $filename ='{{$request}}'
        // if ($request->hasFile('image')) {
        //     $file= $request->file('image');
        //     $filename= date('Ymdhms').'.'.$file->getClientOriginalExtension();
        //     $file->storeAs('/uploads/category',$filename);
        // }
            $category = Category::find($id);
            if ($category) {
                $category->update([
                'name'=>$request->name,
                'details'=>$request->details,
                // 'image'=>$filename
                ]);
                return redirect()->route('admin.category');
            }
            else
            return redirect()->route('admin.category');
        
    }

    public function categoryDelete($id){
        // dd($id);
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('message','category deleted!');
            
        }

        return redirect()->back()->with('error','category not found!');


    }

    public function categoryRestore($id){
        $category = Category::withTrashed()->find($id);
        if ($category) {
            $category->restore();
            return redirect()->back()->with('message','category restored!');
        }
        return redirect()->back()->with('error','category not found!');
    }
}
