<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $editing = false;
        return  view('job-create-form')->with([
            'editing' => $editing
        ]);
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
        return  redirect()->route('feeds')->with('message', 'Your job has been posted!');
    }

    //GET JOB AND SEND IT FOR UPDATE
    public function edit(Job $job)
    {
        $editing = true;
        // CHECK IF USER IS AUTHORIZED TO EDIT THIS PROFILE
        // $this->authorize("update", $job->profiles);
        return view('job-create-form', ['job' => $job, 'editing' => $editing]);
    }

    //STORE UPDATED DATA
    public function update(Job $job)
    {
        if (!(Auth::check() && Auth::user()->profile->id == $job->profiles_id)) {

            dd('YOU ARE NOT ALLOWD');
        }
        // CHECK IF USER IS AUTHORIZED TO EDIT THIS PROfile
        // $this->authorize("update", $job->profiles);
        //VALIDATE INPUTS   
        $data = request()->validate([
            "title" => "required|string",
            "description" => "required|string",
            "image" => "image|nullable|max:1999"
        ]);
        //IF NEW IMG WAS ADDED
        if ($img = request('image')) {
            // DELETE OLD IMAGE BEFORE ADDING A NEW ONE
            Storage::delete(['public/' . $job->image]);
            $imagePath = $img->store("uploads", "public");
            $data["image"] = $imagePath;
        }
        //UPDATE THE MODEL WITH THE REQUEST DATA
        $job->update($data);
        // REDIRECT BACK TO  THE FEED PAGE AFTER UPDATING
        return redirect()->route('feeds')->with('message', 'JOB UPDATED SUCCEFULLY !');
    }
}
