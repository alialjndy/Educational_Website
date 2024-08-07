@extends('layout')
@section('content')
    @if ($errors->any())
        <div class="error-message">
            <p>
                @foreach ($errors->all() as $one_error)
                    <ul>
                        <li>{{$one_error}}</li>
                    </ul>
                @endforeach
            </p>
        </div>

@endif
<div class="parentOnCreate">
    <div class="form-container">
        <form action="{{route('lessons.update' , $lesson->id)}}"  method="post" style="{{url('public/css/Create_page_CSS.css')}}">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="">Lesson Name</label>
                <input type="text" name="LessonName" id="" placeholder="LessonName" value="{{$lesson->LessonName}}"><br><br>
            </div>

            <div class="form-group">
                <label for="">Teacher Name</label>
                <input type="text" name="TeacherName" id="" placeholder="TeacherName" readonly value="{{$userName}}" ><br><br>
            </div>

            <div class="form-group">
                <label for="">Duration</label>
                <input type="text" name="LessonDuration" id="" placeholder="Duration" value="{{$lesson->LessonDuration}}" ><br><br>
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category" id="" placeholder="category" value="{{$lesson->category}}"><br><br>
            </div>

             {{-- <div class="form-group">
                <label for="">Teacher_id</label>
                <input type="text" name="Teacher_id" id="" placeholder="Teacher_id" readonly value="{{$userId}}"><br><br>
            </div> --}}

             <div class="form-group">
                <label for="">Link OF Lesson</label>
                <textarea name="LinkLesson" id="" cols="30" rows="10" placeholder="link of Lesson On YouTube" value="{{$lesson->LinkLesson}}" ></textarea><br><br>
            </div>

             <div class="form-group">
                <label for="">description Of Lessons</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Description The Lesson" value="{{$lesson->description}}"></textarea><br><br>
            </div>

            <button type="submit" id="ButtonInCreate" class="btn btn-primary" style="text-decoration: none ; color :white ; font-size:22px; border:3px solid rgb(66, 58, 58); background-color:grey;">update</button>
        </form>
    </div>
</div>

@endsection
