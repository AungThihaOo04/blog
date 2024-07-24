<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index(User $user)
    {
        return view('detail.index',[
            // 'detail' => auth()->user()->detail()->first()
            'detail' => $user->detail()->first(),
            'blogs' =>$user->blogs()->latest()->paginate(6),
            'user' =>$user

        ]);
    }
}
