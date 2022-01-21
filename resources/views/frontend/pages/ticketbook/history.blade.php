@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
        <h3 class="text-center text-style">Your History</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
        <div class="container-list2">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User name</th>
                                <th scope="col">Movie name</th>
                                <th scope="col">Seats</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$history->isEmpty())
                                @foreach ($history as $key=>$data)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->movie->name}}</td>
                                        <td>
                                            @foreach ($data->movieSeats as $p=>$info)
                                                <span style="color: black" class="badge badge-primary">
                                                {{$info->seat->seat_number}}
                                                </span>
                                            @endforeach
                                        </td>
                                        @php
                                            $single_price = $data->movie->ticket_price;
                                            $total_price = $single_price * ($p+1);
                                        @endphp
                                        <td>{{$total_price}}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-info"><i class="material-icons" style="font-size:18px">filter_list</i></a> --}}
                                            @if ($data->deleted_at == '')
                                                <a href="{{route('ticket.book.payment',$data->id)}}" class="btn btn-warning"><i class="material-icons" style="font-size:18px">attach_money</i></a>
                                            @else
                                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>No Records...</tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- list end -->
</div>
@endsection
