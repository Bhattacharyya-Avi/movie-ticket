@extends('frontend.master')

@section('contents')
<div class="Movie-List">
    <div class="sub-class">
        <h3 class="text-center text-style">MOVIE LIST</h3>
    </div>
    <!-- Movie List Section Starts Here -->
    <section class="Movie-menu">
        <div class="menu">
            {{-- search start --}}
            <form action="{{route('search.movie')}}" method="GET">
            <div class="input-group input-group-sm mb-3">
                  <input name="search" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search a movie">
                  <button type="submit" class="btn btn-primary">
                    <span><i class="material-icons">search</i></span>
                  </button>
            </div>
            </form>
            {{-- search end --}}
            @php
            $info = $categories->random(4); //for selecting random 4 data from all category
            // dd($info);
            @endphp
            <ul>
                <a href="{{route('all.movie.list')}}" style="color: white">
                    <li>All</li>
                </a>
                @if (!empty($info))
                @foreach ($info as $data)
                <a href="{{route('category.movie.list',$data->id)}}" style="color: white">
                    <li>{{$data->name}}</li>
                </a>
                @endforeach
                @else
                <a href="" style="color: white">
                    <li>No Category Found</li>
                </a>
                @endif
                <li>More
                    <ul>
                        @foreach ($categories as $allCategory)
                        <a href="{{route('category.movie.list',$allCategory->id)}}">
                            <li>{{$allCategory->name}}</li>
                        </a>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="container-list">
            @if (!empty($movies))
            @foreach ($movies as $movie)
            <div class="Movie-menu-box action">
                <div class="Movie-menu-img">
                    <a href="{{route('single.movie.view',$movie->id)}}">
                        <img src="{{url('/uploads/movie/'.$movie->image)}}" alt="Incredibles"
                            class="img-responsive img-curve">
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
