<?php

namespace App\Policies;

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
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function view($user, $profile)
    {

        return ($user->profile && $user->profile->id == $profile->id);
    }
}
