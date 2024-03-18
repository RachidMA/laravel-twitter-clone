<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index(Request $request)
    {

        $jobs = Job::orderBy('created_at', 'desc')->paginate(2);

        //ONLY LOGED IN USERS CAN SEE FEEDS OF AVAILABLE JOBS
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('feeds')->with([
            'jobs' => $jobs
        ]);

        //IF THERE IS NO SEARCH QUERY, RETURN  ALL THE POSTS FROM THE DATABASE

        //CHECK IF THERE  IS A SEARCH QUERY AND SEND IT TO THE SERVICE FOR PROCESSING
        //RETURN VIEW

    }
}
