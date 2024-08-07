<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

        protected $fillable = [ 'UserName', 'Email', 'Password', 'role', 'Birthday', ];

}

