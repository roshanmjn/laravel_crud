<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject
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
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
        ];
    }

    
}
