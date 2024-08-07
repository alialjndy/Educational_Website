@extends('layout')
@section('content')
    <div class="lesson-container">
        <h1>{{$lesson->TeacherName}}</h1>
        <h2>{{$lesson->LessonName}}</h2>
        <a href="{{$lesson->LinkLesson}}" class="view-course-button" class="delete-form">view Lesson</a>
        <a href="{{route('lessons.edit' , $lesson)}}" class="btn_Edit">Edit Lesson</a>
        <h3>{{$lesson->description}}</h3>
        <form action="{{route('lessons.destroy' , $lesson->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="delete-button">DELETE</button>
        </form>
    </div>
    <form action="{{route('Post_Name')}}" method="post" style="text-align: center">
        @csrf
        <input type="text" name="lesson_id" id="" value="{{$lesson_id}}" style="display: none; ">
        <input type="text" name="comment" id="comment" placeholder="Your Comment..." style="width: 500px ; height:40px ; padding : 10px ; margin:10px">
        <button class="btn_Edit">post</button>
    </form>

    @if ($comments === null)
        <p>no comment available for this lesson</p>

    @else
        <ul>
            @foreach($comments as $content)
                <div class="contentComment" style="background-color: grey; width: 400px ; color:black ;padding : 10px ;margin: 10px; ">

                    <strong>{{ $content->user->UserName }}:</strong>
                    <li>{{ $content->comment }} - <small>{{ $content->created_at }}</small></li>
                </div>
            @endforeach
        </ul>
    @endif
    <div><br><br><br><br><br><br><br></div>
@endsection
