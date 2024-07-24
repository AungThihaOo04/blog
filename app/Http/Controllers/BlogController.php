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
        $filters = request(['category' , 'search' , 'user', 'brand']);

        return view('blogs.index' , [
            'blogs' => Blog::with('category' ,'user','brand')
                    ->filter($filters)
                    ->latest()
                    ->paginate(6)
                    ->withQueryString(),
                    'users' => User::all()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }
}
