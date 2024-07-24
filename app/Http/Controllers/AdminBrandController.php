<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index', [
            'brands' => Brand::all()
        ]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store()
    {
        $cleandata = request()->validate([
            'name'=>['required'],
            'slug'=>['required']
        ]);

        Brand::create($cleandata);
        return redirect('admin/brands');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',[
            'brand'=>$brand
        ]);
    }

    public function update(Brand $brand)
    {
        $cleandata =request()->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        $brand->update($cleandata);
        return redirect('admin/brands');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back();
    }
}
