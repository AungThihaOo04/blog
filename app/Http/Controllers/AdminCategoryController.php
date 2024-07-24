<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        return  view('admin.category.index' , [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('admin.category.create' ,);
    }

    public function store()
    {
         $cleandata = request()->validate([
            'name' => ['required'],
            'slug' => ['required'],
        ]);

        Category::create($cleandata);
        return redirect('/admin/categories');
    }

    public function edit(Category $category )
    {
        return view('admin.category.edit' , [
            "category" => $category
        ]);
    }

    public function update(Category $category)
    {
       $cleandata = request()->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        $category->update($cleandata);
        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
