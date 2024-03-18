<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    //SHOW SINGLE JOB
    public function show(Job $job)
    {
        return view('job-show')->with(['job' => $job]);
    }

    //SHOOW FORM TO CREATE NEW JOB
    public function create()
    {

        return  view('job-create-form');
    }
    public function store()
    {

        $validate = request()->validate([
            'title' => 'required|min:6|max:255',
            'description' => 'required|min:20|max:10000',
            'image' => 'image|nullable'
        ]);
        $validate['profiles_id'] = Auth::user()->profile->id;

        //CHECK IF REQUEST HAS IMAGE UPLOADED
        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $validate['image'] = $imagePath;
        };

        //CREATE A POST WITH THE DATA FROM THE VALIDATED DATA
        Job::create($validate);


        return  redirect()->route('feeds');
    }
}
