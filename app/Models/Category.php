<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // blog category
    // a blog  belongs to category
    // a category hasmany blogs

    public function blogs(){
        return $this->hasMany(Blog::class); //category_id
    }
}
