<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function subscribeUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function issSubscribeBy($user)
    {
        // dd('hit');
        // dd(auth()->id()); 
        // dd($this);
        // dd($this->subscribeUsers);
        // dd($this->subscribeUsers->contains('id' , $user->id));
        return $this->subscribeUsers->contains('id' , $user->id);
        
    }



}
