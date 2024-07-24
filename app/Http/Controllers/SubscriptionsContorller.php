<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Detail;
use Illuminate\Http\Request;

class SubscriptionsContorller extends Controller
{
    
    // public function toggle(Blog $blog)
    // {
    //     if ($blog->isSubscribeBy(auth()->user())) {
    //         //subscribe -> unsubscribe -> delete the date
    //         $blog->subscribeUsers()->detach(auth()->id());
    //         // return back();
    //     } else {
    //         //unsubscribe -> subscribe -> store the data
    //         $blog->subscribeUsers()->attach(auth()->id());
    //         // return back();
    //     }
    //     return back();
    // }
    public function toggle(Detail $detail)
    {
        // dd($detail);
        if ($detail->issSubscribeBy(auth()->user())) {
            //subscribe -> unsubscribe -> delete the date
            $detail->subscribeUsers()->detach(auth()->id());
            // return back();
        } else {
            //unsubscribe -> subscribe -> store the data
            $detail->subscribeUsers()->attach(auth()->id());
            // return back();
        }
        return back();
    }
}
