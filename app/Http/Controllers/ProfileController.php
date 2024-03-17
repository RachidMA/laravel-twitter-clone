<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProfileController extends Controller
{

    //RETURN  VIEW PROFILE 
    public function index(User $user)
    {
        return  view('profile.show');
    }

    //RETURN FORM TO CREATE PROFILE
    public function create()
    {
        return view('profile.form');
    }

    //RETURN USER TO PROFILE VIEW AFTER STORING PROFILE DATA
    public function store()
    {
        return $this->index(auth()->user());
    }
}
