<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'LessonName',
        'TeacherName',
        'LessonDuration',
        'category',
        'LinkLesson',
        'description',
        'comment',
    ];
    public function EndPosts(){
        return $this->hasMany(EndPosts::class);
    }
}
