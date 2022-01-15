<div class="col-md-10">
    <div class="menu-area">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{route('frontend.index')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('movie.list')}}">Movie list</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        @if (auth()->user())
        <li class="nav-item"><a class="nav-link" href="{{route('ticket.book.history')}}">History</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">{{auth()->user()->name}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">Login</a></li>
        @endif
      </ul>
    </div>
  </div>