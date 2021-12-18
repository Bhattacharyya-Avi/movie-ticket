@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important;">
    Add movie
</button>
<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">movie list</h5>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>category</th>
                            <th>Time </th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $key=>$movie)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img width="100px" src="{{url('/uploads/movie/'.$movie->image)}}" alt="movie image">
                            </td>
                            <td>{{$movie->name}}</td>
                            <td>{{$movie->details}}</td>
                            <td>{{$movie->category->name}}</td>
                            <td>{{$movie->slot->start}} - {{$movie->slot->end}}</td>
                            <td>
                                
                                @if (!empty($movie->deleted_at))
                                <a href="{{route('admin.movie.restore',$movie->id)}}"><i class="material-icons">settings_backup_restore</i></a>
                                
                                @else
                                <a href="{{route('admin.movie.edit',$movie->id)}}"><i class="material-icons">edit</i></a>
                                <a href="{{route('admin.movie.delete',$movie->id)}}"><i class="material-icons">delete</i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add movie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.movie.add')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlFile1">movie Image</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="movie price">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Movie Name 
                        <span style="color: red">*</span>
                    </label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="Movie name">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">movie Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
</div>
</div>



{{-- </div> --}}

@endsection
