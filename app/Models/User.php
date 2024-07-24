<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\InvalidCastException ;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'bio',
        'job',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
        // 'is_admin' => 'boolean',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']= bcrypt($value);
    }
    // a blog belongsto user

    // a user hasmany blogs

    // blog -> user_id

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    // comment user 

    // a comment belongsTo a user
    // a user hasmany comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // a user belongstomany subscribeblogs
    // a blog belongstomany subscribeusers
    // public function subscribeBlogs()
    // {
    //     return $this->belongsToMany(Blog::class , 'user_blog');
    // }
    public function subscribeBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    // a user hasone detail
    // a detail belongsto user

    // detail -> user_id
    public function detail()
    {
        return $this->hasOne(Detail::class);
    }

    // user profile
    // a user hasone profile
    // a profile belongsto a user

    // profile ->user_id
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function subscribeDetails()
    {
        return $this->belongsToMany(Detail::class);
    }

    

}
