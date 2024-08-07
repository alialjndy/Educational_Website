@extends('layout')
@section('content')



   <div class="photo_And_Courses">

        <div class="photo">
            <br><br><br><br><br><br>
            <h2>BEST ONLINE COURSES</h2><br><br><br>
            <h1 >Get Educated Online From <span><br></span> Your Home</h1><br><br><br>
            @guest

            <a href="{{url('registerMe')}}" class= "join">
                Join Now
            </a>
            @endguest

            @auth
            <a href="{{route('lessons.index')}}" class= "join">
                study now
            </a>
            @endauth

        </div>
    </div><br><br>

    <!-- this section of code for more details about this web site -->
    <div class="article">
        <div class="content">
            @guest
                <article>
                    <h1>Sign up now to our educational website!.</h1><br>
                </article>
            @endguest

            @auth
               <div class="content">
                    <article>
                        <h1>welcome {{Auth::user()->UserName}} to our educational website</h1><br>
                    </article>
               </div>
            @endauth

            <div class="info_web">
              <div class="contain">
                <img src="{{(url('Images/11.jpg'))}}" alt="Error In Open Photo" width="400px" height="400px" >
                <div class="paragraph">

                  <div class="text">
                  <p class="paragraph1" > - This site contains the largest collection of educational lessons related to Information Engineering.</p>
                  <p class="paragraph2" > - We at <a href="#">eLEARNING</a> are proud to provide a comprehensive and distinctive educational platform that aims to enable you to achieve your educational goals and develop your skills effectively and fun.</p>
                  <p class="paragraph3" > - Take advantage of our educational resources:</p>
                  @guest

                  <p class="paragraph4" > - <a href="{{url('registerMe')}}">Register now</a> to get full access to all the content of our educational site, and start your journey of gaining knowledge and developing your skills today!</p>
                  @endguest

                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <br><br>

  <!-- this section of code to append the text "Course Categories" only -->
  <div class="categories">
    <div class="categ_child">

      <p id="categ_paragraph">Courses Categories...</p>

    </div><br><br>
  </div>

    <!-- this section of code to show the categories of COURSES -->
    <div class="grand_father">
        <div class="father">
            <div class="child1" >
              <div class="fa fa-mobile"><br> Mobile Development</div>

            </div>
            <div class="child2" >
              <div class="fa fa-globe"><br>Web Development</div>

            </div>
            <div class="child3" >
              <div class="fa fa-user-secret"><br>Cyber Security</div>

            </div>
            <div class="child4" >
            <div class="fa fa-user" ><br>  Graphic Designer</div>
            </div>

          </div>
      </div>
      <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


@endsection

@section('title' , 'Home')



    {{-- <div class="relative">
        <nav>
            <a href="{{route('Courses')}}" class="one">courses</a>
            <a href="{{route('Contact')}}" class="two">contact</a>
            <a href="{{route('Help')}}" class="three">help</a>
            <a href="{{route('About')}}" class="four">about</a>
        </nav>
    </div> --}}
