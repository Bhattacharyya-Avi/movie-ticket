@extends('backend.master')

@section('contents')
<hr>
{{--
<form action="{{route('sharch.movie')}}" method="get">
<div class="form-group">
    <label for="exampleInputEmail1">search</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">User list</h5>
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
                            <th>Email</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username}}</td>
                            <td>
                                @if (!empty($user->deleted_at))
                                <a href="{{route('admin.free.user',$user->id)}}"><i class="material-icons">person_add</i></a>
                                @else
                                {{-- <a href="{{route('admin.movie.edit',$user->id)}}"><i class="material-icons">edit</i></a> --}}
                                <a href="{{route('admin.user.block',$user->id)}}"><i class="material-icons">block</i></a>
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
@endsection