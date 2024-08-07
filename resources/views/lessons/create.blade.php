@extends('layout')
@section('content')
<div class="parentOnCreate">

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
        @if ($message = Session::get('noUser'))
            {{$message}}
        @endif
    <div class="form-container">
        <form action="{{route('lessons.store')}}"  method="POST" style="{{url('public/css/Create_page_CSS.css')}}">
            @csrf

            <div class="form-group">
                <label for="">Lesson Name</label>
                <input type="text" name="LessonName" id="" placeholder="LessonName"><br><br>
            </div>

            <div class="form-group">
                <label for="">Teacher Name</label>
                <input type="text" name="TeacherName" id="" placeholder="TeacherName" readonly value="{{$userName}}" ><br><br>
            </div>

            <div class="form-group">
                <label for="">Duration</label>
                <input type="text" name="LessonDuration" id="" placeholder="Duration" ><br><br>
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category" id="" placeholder="category"><br><br>
            </div>

             {{-- <div class="form-group">
                <label for="">Teacher_id</label>
                <input type="text" name="Teacher_id" id="" placeholder="Teacher_id" readonly value="{{$userId}}"><br><br>
            </div> --}}

             <div class="form-group">
                <label for="">Link OF Lesson</label>
                <textarea name="LinkLesson" id="" cols="30" rows="10" placeholder="link of Lesson On YouTube" ></textarea><br><br>
            </div>

             <div class="form-group">
                <label for="">description Of Lessons</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Description The Lesson" ></textarea><br><br>
            </div>

            <button type="submit" id="ButtonInCreate"   >store</button>
        </form>
    </div>
</div>

@endsection
