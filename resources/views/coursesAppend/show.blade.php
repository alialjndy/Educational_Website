@extends('layout')
@section('content')
<div class="container">

        <h2 class="one">show</h2>

                <article>
                    Course Name is <h3 style="display: inline-block">{{$Variable_for_Show['Course_Name']}}</h3>
                    and The Teacher Name is <h3 style="display: inline-block">{{$Variable_for_Show['Teacher_Name']}}</h3>
                </article>


</div>
@endsection
