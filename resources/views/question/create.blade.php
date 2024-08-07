@extends('layout')
@section('content')
    <h1 style="text-align: center ; color : #007bff; padding:20px;">create question related to quiz</h1>
    <div class="parentOnCreate" style="background-color: white !important ;">

        <div class="container_form_create_Question">
            <form action="{{route('question.store' , ['id' =>$quiz->id])}}" method="post"  id="form_In_Create_Question">
                @csrf
                <div class="form-group" style="display:none; width:300px !important;">
                    <label for="">Quiz id</label>
                    <input type="number" name="quiz_id" id="" placeholder="Quiz id " value="{{$quiz->id}}" readonly>
                </div>

                <div class="form-group" style="display:none;">
                    <label for="">Question id</label>
                    <input type="number" name="Ques_id" id="" value="{{$maxId+1}}" readonly>
                </div>

                <div class="form-group">
                    <label for="">TEXT OF QUESTION</label>
                    <input type="text" name="question" placeholder="TEXT OF QUESTION">
                </div>

                <div class="form-group">
                    <label for="">option_a</label>
                    <input type="text" name="option_a" id="" placeholder="radio1">
                </div>

                <div class="form-group">
                    <label for="">option_b</label>
                    <input type="text" name="option_b" id="" placeholder="radio2">
                </div>

                <div class="form-group">
                    <label for="">option_c</label>
                    <input type="text" name="option_c" id="" placeholder="radio3">
                </div>

                <div class="form-group">
                    <label for="">option_d</label>
                    <input type="text" name="option_d" id="" placeholder="radio4">
                </div>

                <div class="form-group">
                    <label for="">correct_Option</label>
                    <input type="text" name="correct_option" id="" placeholder="option_a or option_b or option_c or option_d">
                </div>

                <input type="submit" value="send" id="Create_Qestion_button">
            </form>
        </div>
    </div>
    <div>
        {{-- <br><br><br><br> --}}
    </div>
@endsection
