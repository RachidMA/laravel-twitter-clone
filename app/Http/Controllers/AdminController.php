<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    //SHOW ADMIN DASHBOARD
    public function  dashboard()
    {

        //GET STATISTICS FOR TOTAL USER, PROFILES, JOBS
        $totalUsers = User::where('status',  'member')->orwhere('status', null)->count();
        $totalProfiles = Profile::all()->count();
        $totalPosts = Post::all()->count();

        return view('admin.admin-dashboard')->with([
            'totalUsers' => $totalUsers,
            'totalProfiles' => $totalProfiles,
            'totalPosts' => $totalPosts
        ]);
    }
}
