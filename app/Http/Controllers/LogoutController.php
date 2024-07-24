<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy(){

        if(!auth()->check()){
            return redirect('/login')->with('message' , 'Please login');
        }
        
        auth()->logout();
        return redirect('/')->with('message' , 'Good Bye'. Auth::user());
    }
}
