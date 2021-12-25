@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
      <h3 class="text-center text-style">MOVIE LIST</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
      <div class="menu">
        <ul>
            <a href="{{route('all.movie.list')}}" style="color: white"><li>All</li></a>
          
          @foreach ($categories as $category)
              <a href="{{route('category.movie.list',$category->id)}}" style="color: white"><li>{{$category->name}}</li></a>
          @endforeach
        </ul>
      </div>
      <div class="container-list">
          @foreach ($movies as $movie)
              <div class="Movie-menu-box action">
          <div class="Movie-menu-img">
            <img src="{{url('/uploads/movie/'.$movie->image)}}" alt="Incredibles" class="img-responsive img-curve">
          </div>
          <div class="Movie-menu-desc">
            <h5>{{$movie->name}}</h5>
            <p class="Movie-price">TK {{$movie->ticket_price}}</p>
            <p class="Movie-detail">
              Director: {{$movie->details}}<br>
              Genre: {{$movie->category->name}}
            </p>

            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
          @endforeach
        


        <div class="clearfix"></div>

      </div>

    </section>
    <!-- list end -->
  </div>
@endsection
