<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFormRequest;
use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // 'blogs' => auth()->user()->blogs()->latest()->paginate(6)
    public function index()
    {
        return view('admin.blog.index' , [
            'blogs' => auth()->user()->blogs()->latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.blog.create' , [
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    public function store(BlogFormRequest $request , User $user)
    {
       $cleandata = $request->validated();
       $cleandata['user_id'] =auth()->id();
       $cleandata['detail_id'] =auth()->id();
       $cleandata['photo']='/storage/'.request('photo')->store('/blogs');
       $blog = Blog::create($cleandata);
        //dd($blog->detail()->get());
        //dd($blog->detail->subscribeUsers());
       $subscriber =  $blog->detail->subscribeUsers->filter(function($user) {
        return $user->id != auth()->id();
        })->each(function($subscriber) {
            Mail::to($subscriber->email)->queue(new SubscriberMail( $subscriber ));
        });
    return redirect('/admin');
    }

    public function edit(Blog $blog)
    {
        // if(!Gate::allows('edit', $blog)) {
        //     abort('403');
        // }
        if(Gate::denies('editBlog', $blog)){
            abort('403');
        }
        return view('admin.blog.edit' , [
            'categories' => Category::all(),
            'blog' => $blog,
            'brands' => Brand::all()
        ]);
    }

    public function update(Blog $blog , BlogFormRequest $request)
    {
        $cleandata = $request->validated();
        if(request('photo')){
            $cleandata ['photo']='/storage/'.request('photo')->store('/blogs');
            File::delete(public_path($blog->photo));
        }
        $blog->update($cleandata);
        return redirect('/admin');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        // $blog->comments()->delete();
        return back();
    }
}
