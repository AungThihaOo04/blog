<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Blog;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUsernameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSubscribeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriptionsContorller;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGuestUser;
use App\Mail\SubscriberMail;
use App\Models\Category;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


// Route::get('/send-email', function()
// {
//     $subscriberName = "aung aung";
//     $commentBody = "This is comment body.";
//     Mail::to('aungthihaoo123@gmail.com')
//         ->queue(new SubscriberMail($subscriberName, $commentBody));
//     Mail::to('johndoe@gmail.com')
//         ->queue(new SubscriberMail($subscriberName, $commentBody));
//     Mail::to('jimmy@gmail.com')
//         ->queue(new SubscriberMail($subscriberName, $commentBody));

//     echo 'hello world';
// });

Route::middleware(MustBeAdminUser::class)->group(function() {
    // Route::get('/admin/info', [AdminProfileController::class,'show']);
    // Route::get('/users/{user:id}/myprofile',[ProfileController::class, 'index']);
    // Route::get('/users/{user:id}/myprofile/show',[ProfileController::class, 'show']);

    Route::get('/admin/detail' , [AdminDetailController::class, 'index']);
    Route::get('/admin/detail/create' , [AdminDetailController::class, 'create']);
    Route::post('/admin/detail/store' , [AdminDetailController::class, 'store']);
    Route::get('/admin/detail/{detail:id}/edit' , [AdminDetailController::class, 'edit']);
    Route::put('/admin/detail/{detail:id}/update' , [AdminDetailController::class, 'update']);
    Route::delete('/admin/detail/{detail:id}/destroy' , [AdminDetailController::class, 'destroy']);

    Route::get('/admin',[AdminController::class, 'index']);
    Route::get('/admin/blogs/create',[AdminController::class, 'create']);
    Route::delete('/admin/blogs/{blog:slug}/destroy' , [AdminController::class, 'destroy']);
    Route::post('/admin/blogs/store' ,[AdminController::class, 'store']);
    Route::get('/admin/blogs/{blog:id}/edit', [AdminController::class, 'edit']);
    // ->middleware('can:edit,blog');
    Route::put('/admin/blogs/{blog:id}/update', [AdminController::class, 'update']);

    Route::get('/admin/{user:id}/subscribe',[AdminSubscribeController::class, 'index']);

    Route::get('/admin/brands',[AdminBrandController::class, 'index']);
    Route::get('/admin/brands/create',[AdminBrandController::class, 'create']);
    Route::post('/admin/brands/store',[AdminBrandController::class, 'store']);
    Route::get('/admin/brands/{brand:id}/edit',[AdminBrandController::class, 'edit']);
    Route::put('/admin/brands/{brand:id}/update',[AdminBrandController::class, 'update']);
    Route::delete('/admin/brands/{brand:slug}/destroy',[AdminBrandController::class, 'destroy']);


    Route::get('/admin/categories' , [AdminCategoryController::class, 'index']);
    Route::get('/admin/categories/create' , [AdminCategoryController::class, 'create']);
    Route::post('/admin/categories/store' , [AdminCategoryController::class, 'store']);
    Route::get('/admin/categories/{category:id}/edit' , [AdminCategoryController::class, 'edit']);
    Route::put('/admin/categories/{category:id}/update' , [AdminCategoryController::class, 'update']);
    Route::delete('/admin/categories/{category:id}/delete',[AdminCategoryController::class, 'destroy']);
});

Route::middleware(MustBeAuthUser::class)->group(function() {
    Route::get('/',[BlogController::class, 'index']);
    Route::get('/blogs/{blog:id}/detail', [BlogController::class , 'show'])->name('blog.show');
    Route::post('/logout' , [LogoutController::class, 'destroy']);
    Route::post('/blogs/{blog:id}/comments', [CommentController::class , 'store']);
    Route::delete('/comments/{comment:id}/delete',[CommentController::class, 'destroy']);
    Route::get('/comments/{comment:id}/edit',[CommentController::class, 'edit']);
    Route::patch('/comments/{comment:id}/update',[CommentController::class, 'update']);
    // Route::post('/blogs/{blog:id}/handle-subscriptions' , [SubscriptionsContorller::class, 'toggle']);
    Route::post('/details/{detail:id}/handle-subscriptions',[SubscriptionsContorller::class,'toggle']);

    Route::get('/users/{user:id}/detail',[DetailController::class, 'index']);

    // Route::get('/details/{user:id}/detail' ,[DetailController::class, 'index']);


    Route::get('/profiles',[ProfileController::class,'index']);
});


Route::middleware(MustBeGuestUser::class)->group(function() {
    Route::get('/register' , [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login' ,[LoginController::class, 'create']);
    Route::post('login', [LoginController::class , 'store']);
});



// Route::get('/categories/{category:slug}' , function(Category $category){
//     return view('blogs.index' , [
//         'blogs' =>$category->blogs()->with('user' , 'category')->paginate(3),
//         // 'categories' =>Category::all(),
//         // 'users' => User::all()
//     ]);
// });

// Route::get('users', [UserController::class , 'index']);
// Route::get('users/{user:username}', [UserController::class, 'index']);


// Route::get('categories' , function(){
//     return view('categories' , [
//         'categories' => Category::all()
//     ]);
// });

// Route::get('users/{user:username}', function(User $user){
//     return view('blogs.index', [
//         'blogs' =>$user->blogs()->with('user', 'category')->paginate(),
//         // 'categories' => Category::all(),
//         // 'users' => User::all()
//     ]);
// });

// Route::get('categories/{category:slug}' , function(Category $category){
//     return view('blogs.index', [
//         'blogs' => $category->blogs()->with('user' , 'category')->paginate(),
//         'categories' =>Category::all()
//     ]);
// });

// Route::get('users/{user:username}', function(User $user){
//     return view('blogs' , [
//         'blogs' => $user->blogs->load('user' , 'category')
//     ]);
// });

Route::get('a' , function(){
    return view('a');
});








