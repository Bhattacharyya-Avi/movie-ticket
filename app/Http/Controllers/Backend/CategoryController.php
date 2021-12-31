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
        Category::create([
            'name'=>$request->name,
            'details'=>$request->details,
        ]);
        session()->flash('success','Category added.');
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
        session()->flash('error','Category not found');
        return redirect()->back();
        

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
                session()->flash('success','Category updated successfuly.');
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
            session()->flash('success','Category Deleted!');
            return redirect()->back();
            
        }
        session()->flash('error','Category not found!');
        return redirect()->back();


    }

    public function categoryRestore($id){
        $category = Category::withTrashed()->find($id);
        if ($category) {
            $category->restore();
            session()->flash('success','Category restored!');
            return redirect()->back();
        }
        session()->flash('error','Category Not found!');
        return redirect()->back();
    }
}
