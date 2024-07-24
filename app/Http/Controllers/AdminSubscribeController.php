<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSubscribeController extends Controller
{
    //
    public function index(User $user)
    {
        // dd($user->detail->subscribeUsers);
        return view('admin.subscribe.index',[
            'users' => $user->detail->subscribeUsers->filter()
        ]);
    }
}
