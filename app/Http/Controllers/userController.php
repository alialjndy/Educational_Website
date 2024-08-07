<?php

//namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserLogin;
use App\Models\User;
use App\models\Quiz ;
use App\models\Question ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;

class userController extends Controller
{
    protected function registered(Request $request, $user)
    {

        session()->flash('success', 'You have Successfully Registered');
    }
    public function RegisterMe()
    {
        return view("registerme");
    }
    public function validate_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => ['required', 'unique:users'],
            'Email' => 'required|unique:users',
            'Password' => 'required',
            'Role' => ['required', 'in:student,teacher'],
            'Birthday' => 'required',


        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $user = ([
            'UserName' => $request->UserName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'role' => $request->Role,
            'Birthday' => $request->Birthday,
        ]);
        User::create($user);

        session()->flash('success', 'You have Successfully Registered');
        return redirect('loginMe');
    }
    public function login()
    {
        return view("loginme");
    }
    // جديد شات
    public function validate_log(Request $request)
    {
        // التحقق من صحة المدخلات
        $credentials = $request->validate([
            'Email' => ['required', 'email'],
            'Password' => ['required']
        ]);

        // محاولة تسجيل الدخول باستخدام البريد الإلكتروني وكلمة المرور
        if (Auth::attempt(['email' => $credentials['Email'], 'password' => $credentials['Password']])) {
            $request->session()->regenerate();
            return redirect()->intended('Home');
        }

        // فشل محاولة تسجيل الدخول
            return redirect()->route('loginME')
        ->withErrors(['NoLogin' => 'The provided credentials do not match our records.'])
        ->withInput($request->only('Email'));
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }


    // this function for redirect user for home page
    public function PageHome()
    {
        return view("Home");
    }
    public function getQuiz(){
        $question = Question::all();
        $quizzes = Quiz::all();
        return view('quiz.index' , compact(['quizzes' , 'question']));
    }
    public function getContact(){
        return view('Contact_us');
    }
    public function getService(){
        return view('service');
    }
    public function validateContactUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'required|max:255',
            'Email' => 'required|email',
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            session()->flash('success', 'Message send successfully');
            return redirect()->route('contact');
        }
    }
}
