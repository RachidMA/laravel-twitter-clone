<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;


class ProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    //ADMIN ISTRATOR POLICIES WHICH WILL OVERWRITE  THE DEFAULT ONES IF NEEDED
    public function before($user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function   view(User $user, Profile $profile)
    {
        return ($user->profile && $user->profile->id == $profile->id);
    }

    public function edit(User $user, Profile $profile)
    {
        /* @var User $user */
        /* @var User $profile */
        return $user->id === $profile->user_id || $user->isAdmin();
    }

    public function update(User $user, Profile $profile)
    {
        return $this->edit($user, $profile);
    }
}
