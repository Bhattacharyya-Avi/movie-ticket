@extends('backend.master')
@section('contents')
        <a href="#" class="btn btn-warning" onclick="printDiv('printableArea')">Print</a>
        <div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" id="printableArea">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">User information</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="">
                            <div class="mb-3">
                                <label for="username">Name</label>
                                <div class="input-group">
                                    {{-- <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div> --}}
                                    <input value="{{$book->user->name}}" type="text" class="form-control" id="username"
                                        placeholder="Username" required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    {{-- <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div> --}}
                                    <input value="{{$book->user->username}}" type="text" class="form-control"
                                        id="username" placeholder="Username" required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input value="{{$book->user->email}}" type="email" class="form-control" id="email"
                                    placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>


                            <hr class="mb-4">
                            {{-- <h4 class="mb-3">Payment</h4>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                        checked="" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                        required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                        required="">
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div> --}}

                            <hr class="mb-4">
                            <p>💕 Thankyou for being with BUSTERX. Enjoy the show and the time that you have given us. 💕</p>
                            <hr>
                            <p>BUSTERX Wish your long life.</p>
                            {{-- <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between align-items-center mb-0">
                            <span class="text-muted">Your seat number and bill</span>
                            {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">{{$book->movie->name}}</h6>
                                    <h6 class="my-0">
                                        Seat Numbers:
                                        @foreach ($book->movieSeats as $key=>$data)
                                        <strong>
                                            <span class="badge badge-primary">
                                                {{$data->seat->seat_number}}
                                            </span>
                                        </strong>
                                            
                                        @endforeach
                                    </h6>
                                    {{-- @dd($key+1) --}}
                                    @php
                                        $ticket_price = $book->movie->ticket_price;
                                        $total_Price = $ticket_price*($key+1);
                                    @endphp
                                    {{-- <small class="text-muted">Brief description</small> --}}
                                </div>
                                <span class="text-muted">৳ {{$total_Price}}</span>
                            </li>
                            
                        </ul>
                        {{-- <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Apply cupon number">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Apply</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>

@endsection
