<?php

use App\Http\Controllers\Auth\AuthenticationMeController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Http\Controllers\QuestionController ;
use App\Http\Controllers\QuizController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registerMe', [userController::class,'RegisterMe']);
Route::post('/registerMe', [userController::class,'validate_register']);
Route::get('/loginMe', [userController::class,'login'])->name('loginME');
Route::post('/loginMe', [userController::class,'validate_log']);
Route::get('/Home' ,[userController::class,'PageHome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    Route::get('/Quiz' , [userController::class  ,'getQuiz'])->name('Quizes');
    Route::resource('lessons', LessonController::class);
    Route::get('/Quiz/{title}' , [QuizController::class , 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/contact', [userController::class , 'getContact'])->name('contact');
    Route::post('/contact' , [userController::class , 'validateContactUs'])->name('contact_submit');
    Route::get('/quiz/create' ,[QuizController::class , 'createQuiz'])->name('quiz.create');
    Route::post('/quiz/create', [QuizController::class , 'store'])->name('quiz.store');
    Route::get('/quiz/index' , [QuizController::class , 'getIndex'])->name('quiz.index');
    Route::get('/question/{id}/create', [QuestionController::class , 'getCreateQuestion'])->name('question.create');
    Route::post('/question/{id}/create', [QuestionController::class , 'storeQuestion'])->name('question.store');
    Route::get('/service', [userController::class , 'getService'])->name('service');
    Route::get('/Error/notTheSameTeacher' , [ErrorController::class , 'Error_NotTheSameTeacher'])->name('notSameTeacher');
    Route::get('/Error/TheUserIsStudent' , [ErrorController::class , 'TheUserIsStudent'])->name('UserIsStudent');
    Route::post('/post' , [PostController::class , 'validate_Post'])->name('Post_Name');
    Route::post('logout' , [AuthenticationMeController::class , 'destroy'])->name('newLogOut') ;
});

require __DIR__.'/auth.php';


