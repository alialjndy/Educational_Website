<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/Header_CSS.css')}}">

        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?V = 3433242"/>
    <title>@yield('title')</title>
</head>
<body>
    @include('partial.flush')
     <header>
      <div class="container">
        <a href="#" class="logo">
          <h2 class="textIcon">
            <i class="fa fa-book" id="icon"></i>eLEARNING
          </h2>
        </a>
        <nav>
          <i class="fas fa-bars toggle-menu"></i>
          <ul>
            <li id="head"><a class="nav-link" href="{{url('Home')}}">Home</a></li>
            <li id="head"><a href="{{route('service')}}"  class="nav-link">Services</a></li>
            <li id="head"><a href="{{route('Quizes')}}"  class="nav-link">Quiz</a></li>
            {{-- <li id="head"><a href="#"  class="nav-link">help</a></li> --}}
            <li id="head"><a href="{{url('lessons')}}"  class="nav-link">All Lessons</a></li>
            <li id="head"><a href="{{route('contact')}}"  class="nav-link">Contact_Us</a></li>



          </ul>
          <div class="form">
            <i class="fas fa-search"></i>
          </div>
        </nav>
      </div>
      {{--  --}}
    @auth
        <div class="menu-container">
            <!-- زر الهامبرغر -->
            <button class="hamburger" id="hamburgerButton">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>

            <!-- قائمة المنسدلة (مخفية بشكل افتراضي) -->
            <div class="menu" id="menu">
                <ul>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Log Out</button>
                    </form>

                </ul>
            </div>
        </div>
    @endauth




      {{--  --}}




    </header>
    <div class="finaly">

        @yield('content')
    </div>

        {{-- this is the footer  --}}
    <footer>
        <div class="zero">
          <h1>
            <i class="fa fa-book"></i>
            <a href="#">eLEARNING</a>
          </h1>
          <p>
            An educational website that aims to provide comprehensive and diverse educational content targeting various segments of society.
            The site offers high-quality educational resources in a wide range of technical or IT topics.
          </p>
        </div>
        <div class="one">

          <h2>Quick Link</h2>
          <ul>
            <a href="{{route('Quizes')}}"><li class="fa fa-arrow-right">Quiz</li></a> <br>
            <a href="{{route('service')}}"><li class="fa fa-arrow-right" > Services</li></a> <br>
            <a href="{{url('lessons')}}"><li class="fa fa-arrow-right"> All Lessons</li></a>  <br>
            <a href="{{route('contact')}}"><li class="fa fa-arrow-right"> Contact_Us</li></a>

          </ul>
        </div>
        <div class="two">
          <h2>Contact</h2>
          <ul>
            <li class="">
              <i class="fa fa-envelope"></i>
              EmailName@gmail.com
            </li>
            <li class="">
              <i class="fa fa-map-marker"></i>
              Location
            </li>
            <li class="">
              <i class="fa fa-phone"></i>
              Telephone
            </li>

          </ul>
        </div>
        <div class="three">
          <h2>Follow Us</h2>
            <div class="two_one">
              <i class="fa fa-messenger" id="message"></i>
              <i class="fa fa-linkedin"></i>
              <i class="fa fa-github"></i>
              <i class="fa fa-facebook"></i>
              <i class="fa fa-youtube"></i>
              <i class="fa fa-telegram"></i>
            </div>
        </div>
        <div class="End_footer">
          <div class="End_footer_child">
            © 2024 all rights reserved
          </div>
        </div>
      </footer>
      <script src="{{url('JavaScript/hoverAndFocus.js')}}"></script>
</body>
</html>
