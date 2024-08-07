<?php

namespace App\Http\Controllers;
use App\Models\Lesson ;
use App\Models\EndPosts ;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index' , compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if($user){
            if($user->role !== 'student'){
                $userName = auth()->user()->UserName;
                $userId = auth()->user()->id;
                return view('lessons.create', compact('userName' , 'userId'));
            }
            else{
                return redirect()->route('UserIsStudent');
            }
        }
        else{
            return redirect()->back()->with('noUser','some thing failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'LessonName' => 'required|string|max:255' ,
            'TeacherName' => 'required|string'  ,
            'LessonDuration' => 'nullable' ,
            'category' => 'required|string' ,
            'LinkLesson' => 'string|max:255',
            'description' => 'string|required',
        ]) ;
        Lesson::create($request->all());
        return redirect()->route('lessons.index')->with('success' , 'lesson created successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson , EndPosts $endPosts)
    {
        $lesson_id = $lesson->id ;
        // $comments = $lesson->EndPosts ;
        $comments = $lesson->EndPosts()->with('user')->get();
        // dd($comments);
        return view('lessons.show' , compact('lesson' , 'comments' , 'lesson_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        // $lesson = Lesson::findOrFail($id);
        $user = auth()->user();
        if($user->UserName === $lesson->TeacherName){
            $userName = auth()->user()->UserName;
            return view('lessons.edit', compact('userName' , 'lesson'));
        }
        else{
            // في حالة عدم التطابق عرض خطأ 403
            return redirect()->route('notSameTeacher');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $userName = auth()->user()->UserName;
        $request->validate([
            'LessonName' => ['required' , 'string' ,'max:255'] ,
            'TeacherName' => ['required' , 'string'] ,
            'LessonDuration' => ['nullable'] ,
            'category' => ['required' , 'string'] ,
            'LinkLesson' => ['string' , 'max:255'] ,
            'description' => ['string' , 'required'],
        ]);

        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success' , 'lesson updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $user = auth()->user();
        if($user->UserName === $lesson->TeacherName){
            $lesson->delete();
            return redirect()->route('lessons.index')->with('success' , 'lesson deleted successfuly');
        }
        else{
            return redirect()->route('notSameTeacher');
        }
    }
}
