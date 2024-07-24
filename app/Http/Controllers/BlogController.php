<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // middleware
        // if(!auth()->check()){
        //     return redirect('/login')->with('message','Please Login');
        // }

        // $blogquery = Blog::with('user','category')->latest();
        // if(request('search')){
        //     $blogquery->where('title','Like' , '%'. request('search') .'%');
        // }
        // dd(request('category'));
        // dd(['search' => request('search') , 'category' => request('category')]);
        // dd(request(['search', 'category']));
        
        $filters = request(['category' , 'search' , 'user', 'brand']);

        return view('blogs.index' , [
            'blogs' => Blog::with('category' ,'user','brand')
                    ->filter($filters)
                    ->latest()
                    ->paginate(6)
                    ->withQueryString(),
                    
            // 'categories' =>Category::all(),
            'users' => User::all()
        ]);
    }

    public function show(Blog $blog)
    {
        // middleware
        // if(!auth()->check()){
        //     return redirect('/login')->with('message' , 'please you can see to login');
        // }

        return view('blogs.show', [
            'blog' => $blog
        ]);
                // return redirect()->route('blog.show' , $comment->blog->slug);

    }
}
