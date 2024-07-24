<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDetailController extends Controller
{
    //
    public function index()
    {
        return view('admin.detail.index',[
            'detail' => auth()->user()->detail()->first()
            // 'detail' => Detail::with('user')->get()
        ]);
    }

    public function create()
    {
        return view('admin.detail.create',[
            // 'users' => User::with('profile')->get()
            'user' => auth()->user()
        ]);
    }

    public function store()
    {
        // dd(request()->all());
        $cleanData = request()->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'bio' => ['required'],
            'job' => ['required'],
            'user_id' => ['required'],
        ]);

        Detail::create($cleanData);
        return redirect('/admin/detail');
    }

    public function edit(Detail $detail)
    {
        return view('admin.detail.edit',[
            'detail' => $detail,
            'user' => auth()->user()
        ]);
    }

    public function update(Detail $detail)
    {
        $cleanData = request()->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'bio' => ['required'],
            'job' => ['required'],
            'user_id' => ['required'],
        ]);

        $detail->update($cleanData);
        return redirect('admin/detail');
    }

    public function destroy(Detail $detail)
    {
        $detail->delete();
        return back();
    }
}
