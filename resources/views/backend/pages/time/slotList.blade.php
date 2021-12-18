@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important;">
    Add slot
</button>
<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">slot list</h5>
        <div class="card-body">
            <div class="table-responsive">
                
                @if(session()->has('message'))
                <p class="alert alert-success">{{session()->get('message')}}</p>
                @endif
                
                @if(session()->has('error'))
                <p class="alert alert-danger">{{session()->get('error')}}</p>
                @endif
                
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slots as $key=>$slot)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$slot->name}}</td>
                            <td>{{$slot->details}}</td>
                            <td>{{$slot->start}}</td>
                            <td>{{$slot->end}}</td>
                            <td>
                                
                                @if (!empty($slot->deleted_at))
                                <a href="{{route('admin.slot.restore',$slot->id)}}"><i class="material-icons">settings_backup_restore</i></a>
                                
                                @else
                                <a href="{{route('admin.slot.edit',$slot->id)}}"><i class="material-icons">edit</i></a>
                                <a href="{{route('admin.slot.delete',$slot->id)}}"><i class="material-icons">delete</i></a>
                                @endif
                                
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Add slot</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.slot.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">slot Name 
                        <span style="color: red">*</span>
                    </label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="slot name">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">slot Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slot start time
                        <span style="color: red">*</span>
                    </label>
                    <input name="start" type="time" class="form-control-file" id="exampleFormControlFile1" placeholder="slot strat time">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Slot end time
                        <span style="color: red">*</span>
                    </label>
                    <input name="end" type="time" class="form-control-file" id="exampleFormControlFile1" placeholder="slot end time">
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
