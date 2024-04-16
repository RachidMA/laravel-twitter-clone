<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource as PostResource;

class PostController extends Controller
{
    //RETURN  ALL POSTS AS JSON
    public function index(Request $request)
    {

        return new PostCollection(Post::all());
    }

    //RETURN SIGNLE POST
    public function show(Request $request)
    {

        return new PostResource(Post::findOrFail($request->post));
    }
}
