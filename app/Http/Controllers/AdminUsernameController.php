<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsernameController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.setting.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(User $user)
    {
        $cleandata = request()->validate([
            "name" => ['required'],
            "username" => ['required'],
            "email"=> ['required'],
            "password"=>['required'],
        ]);

        $user->update($cleandata);
        return redirect('/admin');

    }
}
