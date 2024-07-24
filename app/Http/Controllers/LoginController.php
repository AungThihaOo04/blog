<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function create(){

        // if(!auth()->check()){
        //     return redirect('/login');
        // }
        return view('login.create');
    }

    public function store()
    {
        // dd(request()->all());
        // dd($user = User::where('email', $cleandata['email'])->first());
        // dd(User::find(21)->password); 
        // validate
        $cleanData = request()->validate([
            'email' => ['required' , 'email' , Rule::exists('users', 'email') ],
            'password' => ['required']
        ] ,[
            'email.exists' => "Your email does not exists.",
            'password.required' =>"Your password is required."
        ]);

        // login
        if(auth()->attempt($cleanData)){
            return redirect('/')->with('message', 'Wellcome'.auth()->user()->name);
        } else {
            return back()->withErrors([
                'password' => 'Your password is something wrong'
            ]);
        }

        // $user = User::where('email' , $cleanData['email'])->first();
        //     if ((Hash::check($cleanData['password'] , $user->password))) {
        //             auth()->login($user);
        //             return redirect('/')->with('message' , 'Wellcome '. $user->name);
        //         } else {
        //             return back()->withErrors([
        //                 'password' => 'Your password is incorrect.'
        //             ]);
        //         }
        //     } else {
        //         return back()->withErrors([
        //             'email' => 'Your email does not exist.'
        //         ]);
        //     }
    }
}
