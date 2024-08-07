<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/CSS_Login.css')}}">
    <title>pageForlogin</title>
</head>
<body>
    <div class="parent">
        <div class="contentForm" style="margin: 5% auto ; text-align:center;">
            <div class="text" style="text-align:center;margin-bottom:40px; color:#06bbcc;"><h1>Elearning</h1></div>

            <div class="contentForm2">

                <div class="error_message">
                    @if ($errors->has('NoLogin'))
                        <p style="font-size: 20px;">{{$errors->first('NoLogin')}}</p>
                    @endif
                    @if ($message = Session::get('failed'))
                        <p>{{$message}}</p>
                    @endif
                </div>
                <form action="{{ url('loginMe')}}" method="POST">
                    @csrf
                <h1 class = "text" style="text-align: center ; color: #06bbcc;">Login</h1>

                    <div>
                        @if ($errors->has('UserName'))
                            <p style="color:red">Something wrong in this field</p>
                        @endif
                        <input type="text" name="UserName" id="Fname" placeholder="UserName" value="{{ old('UserName') }}" />
                    </div>
                    {{--  --}}
                    <div>
                        @if ($errors->has('Email'))
                            <p style="color:red">{{$errors->first("Email")}}</p>
                        @endif
                        <input type="email" name="Email" id="email" placeholder="Email" value="{{ old('Email') }}" />
                    </div>
                    {{--  --}}
                    <div>
                        @if ($kk = $errors->has('Password'))
                            <p style="color:red">{{$errors->first("Password")}}</p>
                        @endif
                        <input type="password" name="Password" id="password" placeholder="Password" />
                    </div>
                    {{--  --}}
                    <div>
                        <input type="submit" value="LogIn" id="reg" name="submit">
                    </div>
                      {{-- <p id= "Or" style="color:white ; font-size : 20px ;">or</p> --}}

                      <a href="{{url('registerMe')}}">
                        <input type="button" value="Create an account instead"  id="send" name ="submit" title="If you are dont have acount create it now" />
                      </a>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
