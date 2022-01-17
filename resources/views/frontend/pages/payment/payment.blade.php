@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
        <h3 class="text-center text-style">Payment Details</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
        <div class="container-list2">
            <div class="row">
                <div class="col-sm-6">
                    <div class="Movie-menu-box2 action">
                        <div class="Movie-menu-img">
                            <a href="{{route('single.movie.view',$book->movie->id)}}">
                                <img id="imageT" src="{{url('/uploads/movie/'.$book->movie->image)}}" alt="Incredibles"
                                    class="img-responsive img-curve">
                            </a>
                        </div>
                        <div class="Movie-menu-desc2">
                            <h5>{{$book->movie->name}}</h5>
                            <p class="Movie-price">
                                TK {{$book->movie->ticket_price}} <br>
                                <small style="color: red">This Price is for only one ticket.</small>
                            </p>
                            <p class="Movie-detail">
                                Director: {{$book->movie->details}}<br>
                                Genre: {{$book->movie->category->name}}
                            </p>
                            <p>Time: {{$book->movie->slot->start}} - {{$book->movie->slot->end}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <!-- payment form -->
                    <form action="{{route('ticket.book.payment.post',$book->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input hidden value="{{$book->movie->id}}" type="number" name="movie_id"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <input hidden value="{{auth()->user()->id}}" type="number" name="user_id"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Name</label>
                            <input name="username" type="text" value="{{auth()->user()->name}}" class="form-control"
                                id="exampleFormControlInput1" placeholder="Enter Your name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Email</label>
                            <input name="email" type="email" value="{{auth()->user()->email}}" class="form-control"
                                id="exampleFormControlInput1" placeholder="Enter Your email">
                        </div>



                        {{-- @foreach ($book->movieSeats as $p=>$info)
                                                <span style="color: black" class="badge badge-primary">
                                                {{$info->seat->seat_number}}
                        </span>
                        @endforeach --}}

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Payment Method</label>
                            <select name="payment_method" class="form-control" id="exampleFormControlSelect1">
                                <option>Cash</option>
                                <option>Bkash</option>
                                <option>Rocket</option>
                                <option>Upay</option>
                            </select>
                        </div>

                        <div class="form_select">
                            <label>Account Number</label>
                            <input name="account_number" type="tel" class="form-control" id="exampleFormControlInput1"
                                placeholder="eg. 64yjkiiuy">
                            <span><small style="color: red;">Needed if you are not paying via cash</small></span>
                        </div>

                        <div class="form_select">
                            <label>Selected Seat</label>
                            @foreach ($book->movieSeats as $p=>$info)
                            <span style="color: black" class="badge badge-primary">
                                {{$info->seat->seat_number}}
                            </span>
                            @endforeach
                        </div>

                        @php
                            $single_price = $book->movie->ticket_price;
                            $total_price = $single_price * ($p+1);
                        @endphp

                        <div class="form_select">
                            <label>Amount</label>
                            <input value="{{$total_price}}" name="amount" type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="eg. 64yjkiiuy" readonly>
                        </div>
                        
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Confirm</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- list end -->
</div>
@endsection
