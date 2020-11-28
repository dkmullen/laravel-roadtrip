<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Return all articles by this user
    public function articles() 
    {
      //Eloquent for: select * from articles where user_id = <this user's id>
      return $this->hasMany(Article::class); 
    }
}
// Get the user's articles like this
// $user = User::find(1);
// $user->articles

// Common relationship expressions: hasOne, hasMany, belongsTo
// a user hasOne profile, hasMany artcles, comments
// a comment belongs to a User
