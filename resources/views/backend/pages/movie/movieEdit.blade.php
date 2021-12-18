@extends('backend.master')

@section('contents')
<hr>
<h3>Edit movie</h3>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if(session()->has('error'))
<p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{route('admin.movie.update',$movie->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="exampleFormControlFile1">movie Image</label>
                <input  name="image" type="file" value="{{$movie->image}}"class="form-control-file" id="exampleFormControlFile1" placeholder="movie price">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Previous Image</label>
                <p>
                    <img width="100px" src="{{url('/uploads/movie/'.$movie->image)}}" alt="movie image">
                </p>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">movie Name 
                    <span style="color: red">*</span>
                </label>
                <input value="{{$movie->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="movie name">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">movie Details
                    <span style="color: red">*</span>
                </label>
                <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$movie->details}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select name="category" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Time Slot</label>
                <select name="slot" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($slots as $slot)
                    <option value="{{$slot->id}}">{{$slot->name}}</option>
                    @endforeach
                    
                </select>
            </div>
            
            
            
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>




@endsection
