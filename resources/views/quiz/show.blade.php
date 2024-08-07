@extends('layout')
@section('content')
<div class="parent_show">

    <div class="quiz-container">
        <div class="quiz-header">
            <h1 style="color: white;">{{ $quiz->title }}</h1>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div style="color: red;">{{$error}}</div>

                @endforeach
            @endif
        </div>
        {{-- <h1>{{ $quiz->title }}</h1> --}}
        <form action="{{ route('quiz.submit', ['quiz' => $quiz->id]) }}" method="POST">
            @csrf
            @foreach ($quiz->questions as $question)
                <div class="question-card">
                    <p style="color:white;">{{ $question->question }}</p>
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="option_a">
                        <span style="color: white;">{{ $question->option_a }}</span>

                        <br>
                    </label>
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="option_b">
                        <span style="color: white;">{{ $question->option_b }}</span>

                        <br>
                    </label>
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="option_c">
                       <span style="color: white;">{{ $question->option_c }}</span>

                        <br>
                    </label>
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="option_d">
                        <span style="color: white;">{{ $question->option_d }}</span>

                        <br>
                    </label>
                </div>
            @endforeach
            <button type="submit" class="submit-button">submit</button>
        </form>
        <a href="{{route('question.create', ['id' => $quiz->id])}}">are you want to append a new question ?</a>
    </div>
</div>
@endsection
