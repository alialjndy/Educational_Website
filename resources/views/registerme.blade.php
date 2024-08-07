<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/Register_CSS.css?v=113232')}}">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <title>register</title>

    <link rel="stylesheet" href="" />
  </head>
  <body>
    <div class="parent">
        <div class="Info">
            <div class="text"><h1 style="color: #06bbcc">Sign Up</h1></div>
        <form action="{{url('registerMe')}}" method="post">
            @csrf
          <aside>
            @if ($errors->has('UserName'))
                <p style="color:red">
                    {{$errors->first("UserName")}}
                </p>

            @endif
          </aside>
          <input type="text" name="UserName" id="Fname" placeholder="UserName" value="{{old('UserName')}}"/>
          <br />
          <aside>
            @if ($errors->has('Email'))
                <p style="color:red">
                    {{$errors->first("Email")}}
                </p>

            @endif
          </aside>
          <input type="email" name="Email" id="email" placeholder="Email" value="{{old('Email')}}" />
          <br />
          <!--  -->
          <aside>
            @if ($errors->has('Password'))
                <p style="color:red">
                    {{$errors->first("Password")}}
                </p>

            @endif
          </aside>
          <input
            type="password"
            name="Password"
            id="password"
            placeholder="Password"
          />
          <br />
          {{--  --}}
          <div class="ContentOfRoleAndBirthday">

              <aside>
                @if ($errors->has('Role'))
                    <p style="color:red">
                        {{$errors->first("Role")}}
                    </p>

                @endif
              </aside>
              <div class="StudentOrTeach" style="display: inline-block;">
                <p id="role" style="color: white;">Your Role</p>
                <select name="Role" id="StudentOrTeacher">
                  <option value="ty" selected disabled>Type</option>
                  <option value="student">Student</option>
                  <option value="teacher">Teacher</option>
                </select>
              </div>
              <br />

              <aside>
                @if ($errors->has('Birthday'))
                    <p style="color:red">
                        {{$errors->first("Birthday")}}
                    </p>

                @endif
              </aside>
              <div class="birthday" style="color: black">
                         <label for="birthday" style="color: white;">Birthday:</label>
                    <input type="date" id="birthday" name="Birthday" style="color: black">
              </div>
          </div>
          {{--  --}}
          <br />

            <input type="submit" value="Register" id="sendREG" name ="submit"/>
          <!--

         -->
          <div class="loginNot_reg">
            <a href="{{url('loginMe')}}" class = "btn-btn-primary">
              <input type="button" id="sendLOGIN" value = "Do you have an account?" class = "send" title = "Go To Login Page">
            </a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
