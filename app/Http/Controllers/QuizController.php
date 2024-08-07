<?php

namespace App\Http\Controllers;
use App\Models\Quiz ;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('quiz.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        if(!Auth::check()){
            return redirect('loginMe')->with('failed' , 'you must log in to web site');
        }
        $errors =[];
        $correctAnswers = 0;
        $userId = auth()->user()->id;
        foreach ($quiz->questions as $question) {
            $selectedOption = $request->input('question_' . $question->id);


            // if (is_null($selectedOption)) {
            //     $errors[] = 'No answer selected for question ' . $question->id;
            //     continue; // Skip this question
            // }

            // if (!in_array($selectedOption, $question->options)) {
            //     $errors[] = 'Invalid option selected for question ' . $question->id;
            //     continue;
            // }
            $isCorrect = $question->correct_option === $selectedOption;

            if ($isCorrect) {
                $correctAnswers++;
            }


            Answer::create([
                'quiz_id' => $quiz->id,
                'user_id' => $userId,
                'question_id' => $question->id,
                'selected_option' => $selectedOption,
            ]);
        }
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $score = ($correctAnswers / $quiz->questions->count()) * 100;

        return view('quiz.result', compact('score'));
    }
    public function createQuiz(){
        $user_Role = auth()->user()->role;
        $maxId = Quiz::max('id');
        if(Auth::check()){
            if($user_Role=== 'teacher'){
                return view('quiz.create' , compact('maxId'));
            }
            else{
                return redirect()->route('UserIsStudent');
            }
        }
        else{
            return redirect()->route('loginME')->withErrors(['failed' => 'You have to login']);
        }
    }
    public function store(Request $request){
        $message = [
            'title.required' => 'The quiz title is required.' ,
            'title.string' => 'The quiz title must be string.' ,
            'title.max' => 'The quiz title may not be greater than 255 characters.'
        ];
        $request->validate(['title' => 'String|required|max:255',] , $message);
        Quiz::create($request->all());
        return redirect()->route('quiz.index')->with(['success' => 'Quiz append successfuly']);
    }
    public function getIndex(){
        $quizzes = Quiz::all();
        return view('quiz.index' , compact('quizzes'));
    }

}
