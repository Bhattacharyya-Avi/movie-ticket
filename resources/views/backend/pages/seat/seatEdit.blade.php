@extends('backend.master')

@section('contents')
<hr>
<h3>Edit movie</h3>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{route('admin.seat.update',$seat->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
           
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Seat number
                    <span style="color: red">*</span>
                </label>
                <input value="{{$seat->seat_number}}" name="seat_number" type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="movie name">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Seat Details
                    <span style="color: red">*</span>
                </label>
                <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$seat->details}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seat status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option @if($seat->status == 'free') selected @endif value="free">Free</option>
                    <option @if($seat->status == 'booked') selected @endif value="booked">Booked</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>




@endsection
