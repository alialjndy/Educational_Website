@extends('layout')
@section('content')
    <h1 style="text-align: center ; color: #333 ; ">All Lessons</h1><br>
    <div style="width: 100% ; text-align:center;" class="button-container">
    <a href="{{route('lessons.create')}}"  style="" id="Create_Lesson_button">Create</a>

    </div><br><br>
            <div class="parentSquareBox">
                @foreach ($lessons as $item)
                <div class="square-box">
                    <p>{{$item->LessonName}}</p>
                    <a href="{{route('lessons.show' , $item->id)}}" >show</a>
                </div>
                @endforeach
            </div>
            <div><br><br><br><br><br><br></div>
@endsection
