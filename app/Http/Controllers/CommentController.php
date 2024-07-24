<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Detail;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        $cleanData = request()->validate([
            'body' => ['required']
        ]);

        // comment create
        // Comment::create([
        //     'body' => $cleanData['body'],
        //     'user_id' => auth()->id(),
        //     'blog_id' => $blog->id,
        // ]);

       $comment =  $blog->comments()->create([
            'body' => $cleanData['body'],
            'user_id' => auth()->id(),
        ]);
        // dd($detail->subscribeUsers);
        // dd($detail);
        // dd($blog);
        // dd(auth()->id());
        // dd($blog->subscribeUsers->filter(function($user) {
        //     return $user->id != auth()->id() ;
        // }));

       $subscriber =  $blog->subscribeUsers->filter(function($user) {
            return $user->id != auth()->id();
        })->each(function($subscriber) {
            logger($subscriber->name);
        });

        //  $subscriber = $blog->subscribeUsers->filter(function($user) {
        //     return $user->id != auth()->id();
        // })-> each(function($subscriber) use($comment){
        //     Mail::to($subscriber->email)->queue(new SubscriberMail($subscriber, $comment));
        // });

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit' , [
            'comment' => $comment
        ]);
    }

    public function update(Comment $comment)
    {
        // dd(request()->all());
        request()->validate([
            'body' => ['required']
        ]);

        $comment->body = request('body');
        $comment->update();

        return redirect('/blogs/'.$comment->blog->slug.'/detail'); 
        // return redirect()->route('blog.show' , $comment->blog->slug);
        // return redirect('/blogs/'.$blog->slug/'detail');
    }
}
