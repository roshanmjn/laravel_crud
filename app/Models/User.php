<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_picture',
        'password'
    ];

    protected $hidden = ['password'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {
    //         if (empty($user->profile_picture)) {
    //             $user->profile_picture = "https://random.imagecdn.app/500/150";
    //         }
    //     });
    // }

    
}
