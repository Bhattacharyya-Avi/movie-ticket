@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
        <h3 class="text-center text-style">Grab Your Tickets</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
        <div class="container-list">
            <div class="row">
                <div class="col-sm-6">
                    <div class="Movie-menu-box action">
                        <div class="Movie-menu-img">
                            <a href="{{route('single.movie.view',$movie->id)}}">
                                <img src="{{url('/uploads/movie/'.$movie->image)}}" alt="Incredibles"
                                    class="img-responsive img-curve">
                            </a>
                        </div>
                        <div class="Movie-menu-desc">
                            <h5>{{$movie->name}}</h5>
                            <p class="Movie-price">
                                TK {{$movie->ticket_price}} <br>
                                <small style="color: red">This Price is for only one ticket.</small>
                            </p>
                            <p class="Movie-detail">
                                Director: {{$movie->details}}<br>
                                Genre: {{$movie->category->name}}
                            </p>
                            <p>Time:{{$movie->slot->start}} - {{$movie->slot->end}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <form action="{{route('book.ticket.movie.post')}}" method="POST">
                      @csrf
                        <div class="form-group">
                            <input hidden value="{{$movie->id}}" type="number" name="movie_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <input hidden value="{{auth()->user()->id}}" type="number" name="user_id"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Name</label>
                            <input type="text" value="{{auth()->user()->name}}" class="form-control"
                                id="exampleFormControlInput1" placeholder="Enter Your name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Email</label>
                            <input name="email" type="email" value="{{auth()->user()->email}}" class="form-control"
                                id="exampleFormControlInput1" placeholder="Enter Your email">
                        </div>
                        <div class="form_select">
                            <label>Select your seat</label>
                            <select id="category" name="seat[]" multiple class="form-select">
                              @foreach ($seats as $seat)
                                   <option value="{{$seat->id}}">{{$seat->seat_number}}</option>
                              @endforeach
                            </select>
                        </div>
                        <br><br>
                        <div class="form-group">
                          <button type="submit" class="btn btn-info">Book now</button>
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
