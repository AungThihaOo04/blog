<?php

namespace App\Policies;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetailPolicy
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

    public function editDetail(User $user , Detail $detail)
    {
        return $user->id == $detail->user_id ;
    }

    public function deleteDetail(User $user , Detail $detail)
    {
        return $user->id == $detail->user_id ;
    }
}
