<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // blog comment
    // a blog hasmany  comments
    // a comment belongsTo blog


    public function blog(){
       return  $this->belongsTo(Blog::class);
    }

    // comment user 

    // a comment belongsTo a user
    // a user hasmany comments

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
