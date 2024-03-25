<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    //SHOW SINGLE Post
    public function show(Post $job)
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
        $validate['profile_id'] = Auth::user()->profile->id;

        //CHECK IF REQUEST HAS IMAGE UPLOADED
        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $validate['image'] = $imagePath;
        };



        //CREATE A POST WITH THE DATA FROM THE VALIDATED DATA
        Post::create($validate);
        return  redirect()->route('feeds')->with('message', 'Your Post has been posted!');
    }

    //GET Post AND SEND IT FOR UPDATE
    public function edit(Post $job)
    {
        //QUICK CHECK IF PROFILE IS ALLOWED TO EDIT
        // if (Auth::user()->profile->id !== $job->profiles_id) {
        //     dd('YOU ARE NOT ALLOWED');
        //     abort(403, 'Unauthorized Action');
        // }
        //USING GATES
        $this->authorize('update-job', $job);


        $editing = true;
        // CHECK IF USER IS AUTHORIZED TO EDIT THIS PROFILE
        // $this->authorize("update", $job->profiles);
        return view('job-create-form', ['job' => $job, 'editing' => $editing]);
    }

    //STORE UPDATED DATA
    public function update(Post $job)
    {
        // if (!(Auth::check() || Auth::user()->profile->id !== $job->profiles_id)) {

        //     abort(403, 'Unauthorized Action');
        // }
        $this->authorize('update-job', $job);
        //VALIDATIONS
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

    //DELETE SPECIFIC JOB
    public function delete(Post $job)
    {

        //CHECK IF USER HAVE THE RIGHT TO DELETE THIS POST
        // if (!Auth::check() || $job->profiles_id !== Auth::user()->profile->id) {
        //     abort(403, 'Unauthorized Action');
        // }
        //with GATES
        $this->authorize('job-delete', $job);
        dd('YOU CAN DELETE');
        //DELETING AN ELOQUENT MODEL
        $job->delete();
        //REDIRECTING BACK TO THE FEED PAGE AND SHOWING MESSAGE
        return redirect('/feeds')->with('message', 'THE JOB HAS BEEN DELETED!');
    }
}
