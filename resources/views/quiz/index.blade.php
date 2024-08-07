@extends('layout')
@section('content')
    <div class="All_Quizes">
        <h1 style="text-align: center; color:#06bbcc">All Quizes</h1><br><br>
        <a href="{{route('quiz.create')}}" id="Create_Quiz_link">Create Quiz</a><br><br>
    </div>
    <div class="container_Quizes">

        @foreach ($quizzes as $item)
            <a href="{{route('quiz.show' ,$item)}}" class="Quiz_sub">{{$item->title}}</a>
         @endforeach
    </div>
     <div><br><br><br><br><br><br><br><br><br><br></div>
@endsection
