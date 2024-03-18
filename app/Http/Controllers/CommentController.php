<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function store(Job $job)
    {

        $validate = request()->validate([
            'comment' => 'required|min:3|max:255',
        ]);
        $validate['job_id'] = $job->id;
        $validate['profile_id'] = Auth::user()->profile->id;

        //FIRST METHOD TO STORE DATA
        // $comment = new Comment();
        // $comment->comment = $validate['comment'];
        // $comment->job_id = $job->id;
        // $comment->profile_id = Auth::user()->profile->id;
        // $comment->save();

        //SECOND METHOD TO STORE DATA
        //MAKE SURE ALL FILLABLES HAS SAME NAME AS INPUTS
        Comment::create($validate);
        return redirect()->back();
    }
}
