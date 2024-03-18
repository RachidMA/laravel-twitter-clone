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


        $comment = new Comment();
        $comment->comment = $validate['comment'];
        $comment->job_id = $job->id;
        $comment->profile_id = Auth::user()->profile->id;
        $comment->save();
        return redirect()->back();
    }
}
