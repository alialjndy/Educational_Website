@extends('layout')
@section('content')
        <div class="photo-and-text">
        <head>
            <link rel="stylesheet" href="{{url('css/contact_CSS.css')}}">
        </head>
        <h1>Contact Us</h1>
    </div>

    <div class="messege">
        <!--<p>WELCOM of your ideas.</p>-->
        <p>Tell Us</p>
        <br>
        <p>any idea you think its good to update </p>
        <P> our site to be good for you</P>
        <br>
        <p>OR :</p>
        <br>
        <p>if you need more information you can contuct with us </p>

        <form action="{{route('contact_submit')}}"  method="POST" >
            @csrf
            <ul>
                @if ($errors->has('UserName'))
                    <p style="color:red;">User Name is required to complete</p>
                @endif
                <li> <input class="one" name="UserName" type="text" placeholder="user name" ></li>
                {{--  --}}
                @if ($errors->has('Email'))
                    <p style="color:red; ">Email is required</p>
                @endif
                <li><input class="one" name="Email" type="text" placeholder="email"></li>
                {{--  --}}
                <li class="three">
                    <label for="message">what you want to tell us ?</label>
                    <select name="message" id="tell us">
                        <option value="1">a quastion</option>
                        <option value="2">an idea</option>
                    </select>
                </li>
                @if ($errors->has('message'))
                    <p style="color: red;">message is required or length of message bigger than 255 character</p>


                @endif
                <li><input class="one" name="message" type="text" placeholder="your messege"></li>
            </ul>
            <input type="submit" value="submit" id="sendCotact">
        </form>

    </div>
    <div class="hhh">
        <div class="address">
            <div> <img src="photo/٢٠٢٤٠٥٠٥_١٥٥٥١٠.jpg" alt="No Photo" width="50px" height="50px"> </div>
            <div class="this_address">
                <h3>Address</h3>
                <h5>street3/lattakia/syria</h5>
            </div>

        </div>
        <div class="phone">
            <div> <img src="photo/٢٠٢٤٠٥٠٥_١٥٥٤٥٨.jpg" width="50px" height="50px"> </div>
            <div class="this_phone">
                <h3>phone</h3>
                <h5>+048 654948</h5>
            </div>

        </div>
    </div>
@endsection
