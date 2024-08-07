<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndPosts extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'user_name', 'comment' , 'lesson_id'];
    public function user(){
        return $this->belongsTo(User::class) ;
    }
    public function lessons(){
        return $this->belongsTo(Lesson::class);
    }
}
