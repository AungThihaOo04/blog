<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // blog brand
    // a blog  belongsto brand
    // a brand  hasmany blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
