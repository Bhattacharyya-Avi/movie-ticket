@extends('frontend.master')

@section('contents')
<section class="categories">
    <div class="container">
      <h2 class="text-center wh">Popular Movies</h2>

      @foreach ($moviepopular as $movies)
        <a href="movie_list.html">
          <div class="box-3 float-container">
            <img src="{{url('/uploads/movie/'.$movies->image)}}" alt="toystory" class="img-responsive img-curve">

            <h3 class="float-text text-blue">Toy Story</h3>
          </div>
        </a>
      @endforeach
      
      <div class="clearfix"></div>
    </div>
  </section>

  <!-- slider_start-->
  <h2>Movie list</h2>
  <div class="owl-carousel owl-theme">
    @foreach ($movieall as $movie)
    <div class="item">
      <a href="">
        <div class="box-2">
          <img src="{{url('/uploads/movie/'.$movie->image)}}" alt="moana" class="img-responsive img-curve">
          <h3 class="float-text text-blue">{{$movie->name}}</h3>
        </div>
      </a>
    </div>
    @endforeach
{{--     
    <div class="item">
      <a href="#">
        <div class="box-2">
          <img src="assets/image/movie_img1.jpg" alt="moana" class="img-responsive img-curve">
          <h3 class="float-text text-blue">Moana</h3>
        </div>
      </a>
    </div>
    <div class="item">
      <a href="#">
        <div class="box-2">
          <img src="assets/image/Kung_Fu_Panda_3_poster.jpg" alt="Kung Fu Panda-3" class="img-responsive img-curve">
          <h3 class="float-text text-blue">Kung Fu Panda-3</h3>
        </div>
      </a>
    </div>
    <div class="item">
      <a href="#">
        <div class="box-2">
          <img src="assets/image/Rio2011Poster.jpg" alt="Rio" class="img-responsive img-curve">
          <h3 class="float-text text-blue">Rio-2</h3>
        </div>
      </a>
    </div>
    <div class="item">
      <a href="#">
        <div class="box-2">
          <img src="assets/image/toystory.jpg" alt="Toy Story" class="img-responsive img-curve">
          <h3 class="float-text text-blue">Toy Story</h3>
        </div>
      </a>
    </div>
    <div class="item">
      <a href="#">
        <div class="box-2">
          <img src="assets/image/Incredibles-2.jpg" alt="Incredibles" class="img-responsive img-curve">
          <h3 class="float-text text-blue">Incredibles-2</h3>
        </div>
      </a>
    </div> --}}

  </div>
  <!-- slider_end-->
@endsection
