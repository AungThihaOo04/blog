<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        
        return view('register.create');
    }

    public function store(){
        // $cleandate = request()->validate([
        //     'name'=> ['required'],
        //     'username' => ['required'],
        //     'email' => ['required'],
        //     'password' => ['password']
        // ]);

        // dd($cleandate);

        // dd(request()->all());
       $cleanData= request()->validate([
            'name' => ['required' , 'max:20'],
            'username'=> ['required' , 'max:20'],
            'email' => ['required' , 'email'],
            'password' => ['required' , 'max:20']
        ]);

        // $cleanData['password'] = bcrypt($cleanData['password']);
        // dd($cleanData);

        $user = new User();
        $user->name = $cleanData['name'];
        $user->username = $cleanData['username'];
        $user->email = $cleanData['email'];
        $user->password = $cleanData['password'];
        $user->save();

        // login
        auth()->login($user);
        
        return redirect('/')->with('message' , 'Wellcome- '.$user->name);
        
    }
}
