@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
        <h3 class="text-center text-style">Movie Details</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
        <div class="container-list2">
            <div class="row">
                <div class="col-sm-6">
                    <div class="Movie-menu-box2 action">
                        <div class="Movie-menu-img">
                            <a href="{{route('single.movie.view',$movie->id)}}">
                                <img id="imageT" src="{{url('/uploads/movie/'.$movie->image)}}" alt="Incredibles"
                                    class="img-responsive img-curve">
                            </a>
                        </div>
                        <div class="Movie-menu-desc2">
                            <h5>{{$movie->name}}</h5>
                            <p class="Movie-price">
                                TK {{$movie->ticket_price}} <br>
                                <small style="color: red">This Price is for only one ticket.</small>
                            </p>
                            <p class="Movie-detail">
                                Director: {{$movie->details}}<br>
                                Genre: {{$movie->category->name}}
                            </p>
                            <p>Time: {{$movie->slot->start}} - {{$movie->slot->end}}</p>
                            <div class="form-group">
                          <button type="submit" class="btn btn-info">Book now</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    
                   <h4 style="color: blue" >{{$movie->name}} : Movie Details</h4>
                  <p style="text-align: justify;text-justify: inter-word;">
                    {{$movie->details}}
                </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- list end -->
</div>
@endsection
