<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function editComment(User $user , Comment $comment)
    {
        return $comment->user_id == $user->id;
    }

    public function deleteComment(User $user , Comment $comment)
    {
        return $comment->user_id == $user->id;
    }
}
