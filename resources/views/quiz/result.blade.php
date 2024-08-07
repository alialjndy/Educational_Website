@extends('layout')
@section('content')
    <div class="container_result">
        <div class="child_result"><br>
            <h1 style="text-align: center">Test Result</h1><br>
            <div>The result of your test is : <strong>{{ $score }}%</strong></div>
        </div>
    </div>

    <div><br><br></div>
@endsection
