<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        Paginator::useBootstrap();

        // FacadesGate::define('edit', function(User $user , Blog $blog)
        // {
        //     return $blog->user_id == $user->id;
        // });
        // auth()->user()->can('edit',$blog)
    }
}
