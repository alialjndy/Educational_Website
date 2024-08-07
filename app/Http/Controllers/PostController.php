<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EndPosts ;
use App\Models\Lesson ;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function validate_Post(Request $request){
        $userId = auth()->user()->id;
        $userName = auth()->user()->UserName;
        $validator = Validator::make($request->all() ,[
            'comment' =>['required' , 'string'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            EndPosts::create([
              'user_id' =>  $userId ,
              'user_name'=>$userName ,
              'comment'=>$request->comment ,
              'lesson_id'=>$request->lesson_id ,
            ]);

        $lesson = Lesson::findOrFail($request->lesson_id);
        $lesson->comment = $request->comment;
        $lesson->save();
        }
        return redirect()->back();
    }
}
