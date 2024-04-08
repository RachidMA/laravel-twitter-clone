<?php

namespace App\Http\Controllers;

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
        return view('admin.admin-dashboard');
    }
}
