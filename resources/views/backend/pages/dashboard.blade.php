@extends('backend.master')

@section('contents')
<div class="row">

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted"> Movies</h5>
                    <h2 class="mb-0"> {{$movie}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="material-icons">video_library</i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Movie Categories</h5>
                    <h2 class="mb-0"> {{$category}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="material-icons">ondemand_video</i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Movie Slots</h5>
                    <h2 class="mb-0">{{$slot}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="material-icons">timelapse</i>
                </div>
            </div>
        </div>
    </div>
 
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted"> User</h5>
                    <h2 class="mb-0"> {{$user}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="material-icons">person</i>
                </div>
            </div>
        </div>
    </div>
    
</div>               






@endsection


