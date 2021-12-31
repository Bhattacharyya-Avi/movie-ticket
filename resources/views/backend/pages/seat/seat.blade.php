@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important;">
    Add Seat
</button>
{{-- 
<form action="{{route('sharch.seat')}}" method="get">
  <div class="form-group">
    <label for="exampleInputEmail1">search</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">seat list</h5>
        <div class="card-body">
            <div class="table-responsive"> 
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Seat number</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seats as $key=>$seat)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$seat->seat_number}}</td>
                            <td>{{$seat->details}}</td>
                            <td>{{$seat->status}}</td>
                            <td>
                                
                                @if (!empty($seat->deleted_at))
                                <a href="{{route('admin.seat.restore',$seat->id)}}"><i class="material-icons">settings_backup_restore</i></a>
                                
                                @else
                                <a href="{{route('admin.seat.edit',$seat->id)}}"><i class="material-icons">edit</i></a>
                                <a href="{{route('admin.seat.delete',$seat->id)}}"><i class="material-icons">delete</i></a>
                                @endif
                                
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add seat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.seat.add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Seat number 
                        <span style="color: red">*</span>
                    </label>
                    <input name="seat_number" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="seat number">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">seat Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Seat Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <option selected value="free">Free</option>
                            <option value="booked">Booked</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
</div>
</div>



{{-- </div> --}}

@endsection
