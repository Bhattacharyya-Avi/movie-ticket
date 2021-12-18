@extends('backend.master')

@section('contents')
<hr>
<h3>Edit slot</h3>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if(session()->has('error'))
<p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form action="{{route('admin.slot.update',$slot->id)}}" method="POST" enctype="multipart/form-data">
        @method('put')
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">slot Name 
            <span style="color: red">*</span>
        </label>
        <input value="{{$slot->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="slot name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">slot Details
            <span style="color: red">*</span>
        </label>
        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$slot->details}}</textarea>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlFile1">slot Image</label>
        <input value="{{$slot->start}}" name="start" type="time" class="form-control-file" id="exampleFormControlFile1" placeholder="slot start time">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">slot Image</label>
        <input value="{{$slot->end}}" name="end" type="time" class="form-control-file" id="exampleFormControlFile1" placeholder="slot end time">
    </div>

    
    
    
    
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
  <div class="col-sm-2"></div>
</div>




@endsection
