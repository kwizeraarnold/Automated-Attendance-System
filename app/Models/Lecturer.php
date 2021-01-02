<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'lecturer';

    protected $fillable = [
        'first_name', 'last_name', 'phone_number' , 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
