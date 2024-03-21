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

    public function view($user, $profile)
    {

        return ($user->profile && $user->profile->id == $profile->id);
    }
}
