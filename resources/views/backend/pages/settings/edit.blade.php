@extends('backend.master')

@section('contents')
<hr>
<h3>Edit Bussiness Settings</h3>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{route('bussiness.settings.update',$settings->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="form-group">
                <label for="exampleFormControlInput1">Name 
                    <span style="color: red">*</span>
                </label>
                <input value="{{$settings->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="enter bussiness name">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">About
                    <span style="color: red">*</span>
                </label>
                <textarea name="about" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$settings->about}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email 
                    <span style="color: red">*</span>
                </label>
                <input value="{{$settings->email}}" name="email" type="email" class="form-control" id="exampleFormControlInput1"
                placeholder="enter bussiness email">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Contact number 
                    <span style="color: red">*</span>
                </label>
                <input value="{{$settings->contact}}" name="contact" type="tel" class="form-control" id="exampleFormControlInput1"
                placeholder="enter bussiness contact">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Address 
                    <span style="color: red">*</span>
                </label>
                <input value="{{$settings->address}}" name="address" type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="enter address">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>




@endsection
