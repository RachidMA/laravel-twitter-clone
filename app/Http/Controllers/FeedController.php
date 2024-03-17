<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index(Request $request)
    {

        //ONLY LOGED IN USERS CAN SEE FEEDS OF AVAILABLE JOBS
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('feeds');

        //IF THERE IS NO SEARCH QUERY, RETURN  ALL THE POSTS FROM THE DATABASE

        //CHECK IF THERE  IS A SEARCH QUERY AND SEND IT TO THE SERVICE FOR PROCESSING
        //RETURN VIEW
    }
}
