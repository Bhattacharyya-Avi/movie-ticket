@extends('frontend.master')

@section('contents')
<section class="categories">
    <div class="container">
      <h2 style="color:white" class="text-center wh">Popular Movies</h2>
      @if (!empty($moviepopular))
        @foreach ($moviepopular as $movies)
        <a href="{{route('single.movie.view',$movies->id)}}">
          <div class="box-3 float-container">
            <img src="{{url('/uploads/movie/'.$movies->image)}}" alt="Movie image" class="img-responsive img-curve">

            <h3 class="float-text text-blue">{{$movies->name}}</h3>
          </div>
        </a>
      @endforeach
      @else
      <a href="movie_list.html">
        <div class="box-3 float-container">
          <img src="" alt="Movie image" class="img-responsive img-curve">

          <h3 class="float-text text-blue">No Movie Found</h3>
        </div>
      </a>
      @endif
      
      
      <div class="clearfix"></div>
    </div>
  </section>

  <!-- slider_start-->
  <h2>Movie list</h2>
  <div class="owl-carousel owl-theme">
    @if (!empty($movieall))
    @foreach ($movieall as $movie)
    <div class="item">
      <a href="{{route('single.movie.view',$movie->id)}}">
        <div class="box-2">
          <img src="{{url('/uploads/movie/'.$movie->image)}}" style="height:300px;" alt="Movie image" class="img-responsive img-curve">
          <h3 class="float-text text-blue">{{$movie->name}}</h3>
        </div>
      </a>
    </div>
    @endforeach
    @else
    <div class="item">
      <a href="">
        <div class="box-2">
          <img src="" alt="Movie image" class="img-responsive img-curve">
          <h3 class="float-text text-blue">No Movie found!</h3>
        </div>
      </a>
    </div>
    @endif
  </div>
  <!-- slider_end-->
@endsection
