<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function editBlog(User $user , Blog $blog)
    {
        return $user->id == $blog->user_id ;
    }

    public function delete(User $user , Blog $blog)
    {
        return $user->id == $blog->user_id ;
    }

}
