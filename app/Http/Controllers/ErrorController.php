<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function Error_NotTheSameTeacher(){
        return view('Error.notTheSameTeacher');
    }
    public function TheUserIsStudent(){
        return view('Error.TheUserIsStudent');
    }
}
