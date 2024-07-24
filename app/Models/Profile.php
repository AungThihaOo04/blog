<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // user profile
    // a user hasone profile
    // a profile belongsto a user

    // profile ->user_id
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
