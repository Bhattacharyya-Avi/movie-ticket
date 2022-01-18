@extends('backend.master')

@section('contents')
<hr>
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important;">
    Add payment
</button> --}}
{{--
<form action="{{route('sharch.payment')}}" method="get">
<div class="form-group">
    <label for="exampleInputEmail1">search</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Payment list</h5>
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
                            <th>User Name</th>
                            <th>Movie name</th>
                            <th>Payment method</th>
                            <th>Account number</th>
                            <th>Amount</th>
                            <th>status</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key=>$payment)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$payment->user->name}}</td>
                            <td>{{$payment->movie->name}}</td>
                            <td>{{$payment->payment_method}}</td>
                            <td>{{$payment->account_number}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->status}}</td>
                            <td>
                                @if ($payment->status == 'pending')
                                <a href="{{route('admin.payment.approve',$payment->id)}}" class="btn btn-info">Approve</a>
                                @else
                                    
                                @endif
                                <a href="{{route('admin.payment.delete',$payment->id)}}" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- </div> --}}

@endsection