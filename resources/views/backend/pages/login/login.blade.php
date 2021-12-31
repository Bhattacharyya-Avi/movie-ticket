<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BUSTERX</title>
  <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head> 
<body>
  <!--Hero area start-->
  <div class="hero-area">
    <div class="container">
      <div class="row">
        <!--Logo sart-->
        <div class="col-md-2">
          <div class="logo">
            <a href="#"><img src="assets/image/logo.png" alt=""></a>
          </div>
        </div>
        <!--Menu bar sart-->
        <div class="col-md-10">
          <div class="menu-area">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="{{route('frontend.index')}}">Home</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="movie_list.html">Movie list</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
              <li class="nav-item"><a class="nav-link" href="#">About</a></li>
              <li class="nav-item"><a class="nav-link" href="index.html">Login</a></li> --}}
            </ul>
          </div>
        </div>
        <!-- Menu bar end -->
        <!-- login start -->
        <div class="login-box">
          @include('flash-message')
          <h1>Login</h1>
          <form action="{{route('admin.do.login')}}" method="POST">
            @csrf
            <div class="textbox">
              <i class="fas fa-user"></i>
              <input name="email" type="email" placeholder="Enter your email">
            </div>
            
            <div class="textbox">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Password">
            </div>
            <a >
              <input type="submit" class="btn2" value="Sign in">
            </a>
          </form>
        </div>
        <!-- login end -->
        
      </div>
      
      
    </body>
    </html>