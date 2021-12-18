@extends('backend.master')

@section('contents')
<hr>
<h3>Edit Category</h3>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if(session()->has('error'))
<p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form action="{{route('admin.category.edit.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @method('put')
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Category Name 
            <span style="color: red">*</span>
        </label>
        <input value="{{$category->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="category name">
    </div>
    
    
    
    <div class="form-group">
        <label for="exampleFormControlFile1">Category Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="category price">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Previous Image</label>
        <p>
            <img width="100px" src="{{url('/uploads/category/'.$category->image)}}" alt="category image">
        </p>
    </div>
    
    
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Category Details
            <span style="color: red">*</span>
        </label>
        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$category->details}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
  <div class="col-sm-2"></div>
</div>




@endsection
