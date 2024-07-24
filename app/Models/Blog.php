<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    use HasFactory;

    //(model event)
    public static function boot() {
        parent::boot();
        /**
        * Write code on Method
        *
        * @return response()
        */
        static::deleted(function($item)  {
            $item->comments()->delete(); //item = $blog
            $item->subscribeUsers()->detach();
            File::delete(public_path($item->photo));

        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query , $filters){
        if($filters['search'] ?? null){
            $query
                ->where(function($query) use($filters){
                $query
                    ->where('name' , 'Like', '%'. $filters['search'].'%')
                    ->orWhere('body' , 'Like' , '%' .$filters['search']. '%');
            });
        }

        if($filters['category'] ?? null){
            $query->whereHas('category' ,function($categoryQuery) use($filters) {
                $categoryQuery->where('slug' , $filters['category']);
            });
        }
        if($filters['user'] ?? null) {
            $query->whereHas('user' ,function($userQuery) use ($filters) {
                $userQuery->where('username' , $filters['user']);
            });
        }
        if($filters['brand'] ?? null) {
            $query->whereHas('brand' ,function($brandQuery) use ($filters) {
                $brandQuery->where('name' , $filters['brand']);
            });
        }
    }

    public function subscribeUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function isSubscribeBy($user)
    {
        // dd('hit');
        // dd(auth()->id());
        // dd($this) ;
        // dd($this->subscribeUsers) (1. 2. 3.61)
        // dd($this->subscribeUsers->contains('id' , $user->id));
        return $this->subscribeUsers->contains('id' , $user->id);
        
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }
    
}
