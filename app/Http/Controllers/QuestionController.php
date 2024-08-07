<?php

namespace App\Http\Controllers;
use App\Models\Quiz ;
use App\Models\Question ;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getCreateQuestion($id){
        $maxId = Question::max('id');
        $quiz = Quiz::findOrFail($id);
        return view('question.create' , compact('quiz' , 'maxId'));
    }
    public function storeQuestion(Request $request){
        $request->validate([
            'quiz_id' => 'required',
            'Ques_id' => 'required'  ,
            'question' => 'required|String|max:255' ,
            'option_a' => 'required|String|max:255' ,
            'option_b' => 'required|String|max:255' ,
            'option_c' => 'required|String|max:255' ,
            'option_d' => 'required|String|max:255' ,
            'correct_option'=> 'required|String|max:255' ,
        ]);
       Question::create($request->all());
       return redirect()->route('quiz.index')->with(['success' => 'question added successfuly.']);
    }
}
