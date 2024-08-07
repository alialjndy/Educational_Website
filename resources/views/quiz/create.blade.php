@extends('layout')
@section('content')
    <h1 style="color: #06bbcc; text-align:center;">create quiz</h1><br><br>
    <div >
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p style="color: red;">{{$err}}</p>
            @endforeach
        @endif
    </div>
    <div class="container_create_quiz">

        <form action="{{route('quiz.store')}}" method="post">
            @csrf
            <div class="form-group" >

                <p for="" style="width: 500px;">id</p>
                <input type="text" name="id" id="" value="{{$maxId + 1}}" readonly><br><br>
            </div>
            <div class="form-group">
                <p>title of the Quiz</p>
                <input type="text" name="title" id=""><br>
            </div>

            <input  id="Create_Quiz_button" type="submit" value="Send">
        </form>
    </div>
    <div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
@endsection
