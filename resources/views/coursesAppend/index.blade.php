@extends('layout')
@section('content')
<div class="container">

        <h2 class="one">Courses append</h2>
            <div class="one_one">
                @if (count($course)> 0)

                    @foreach ($course as $item)

                        <ul>
                            <a href="{{route('coursesAppend.show' ,$item['Course_Name'])}}">
                            <article style="font-size: 20px">Course Name is <h1 style="display: inline-block">{{$item['Course_Name']}}</h1>  and the Teacher is
                            <strong>{{$item['Teacher_Name']}}</strong></article>
                         </ul>
                    </a>
                    @endforeach


                @else
                <article>There are no course appended</article>
                @endif

            </div>
</div>
@endsection

@section('title' , 'courses append')
