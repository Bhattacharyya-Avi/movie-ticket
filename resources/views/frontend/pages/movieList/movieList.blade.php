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
        @if (!empty($categories))
        @foreach ($categories as $category)
        <a href="{{route('category.movie.list',$category->id)}}" style="color: white"><li>{{$category->name}}</li></a>
        @endforeach
        @else
        <a href="" style="color: white"><li>No Category Found</li></a>
        @endif
        
      </ul>
    </div>
    <div class="container-list">
      @if (!empty($movies))
      @foreach ($movies as $movie)
      <div class="Movie-menu-box action">
        <div class="Movie-menu-img">
          <a href="{{route('single.movie.view',$movie->id)}}">
          <img src="{{url('/uploads/movie/'.$movie->image)}}" alt="Incredibles" class="img-responsive img-curve">
          </a>
        </div>
        <div class="Movie-menu-desc">
          <h5>{{$movie->name}}</h5>
          <p class="Movie-price">TK {{$movie->ticket_price}}</p>
          <p class="Movie-detail">
            Director: {{$movie->details}}<br>
            Genre: {{$movie->category->name}}
          </p>
          
          <a href="{{route('book.ticket.movie',$movie->id)}}" class="btn btn-primary">Book Now</a>
        </div>
      </div>
      @endforeach
      @else
      <div class="Movie-menu-box action">
        <div class="Movie-menu-img">
          <img src="" alt="Movie image" class="img-responsive img-curve">
        </div>
        <div class="Movie-menu-desc">
          <h5>No movie found</h5>
          <p class="Movie-price">TK 0.00</p>
          <p class="Movie-detail">
            Director: <br>
            Genre: 
          </p>
          
          <a href="#" class="btn btn-primary">Book Now</a>
        </div>
      </div>
      @endif
      
      
      
      
      <div class="clearfix"></div>
      
    </div>
    
  </section>
  <!-- list end -->
</div>
@endsection
