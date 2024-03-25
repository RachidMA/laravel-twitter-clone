<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Notifications\newUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index(Request $request)
    {
        // Redirect unauthenticated users to login page
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        //INICIALIZE THE QUERY
        $query = Post::query();
        // Apply search filters if provided
        if ($request->has('cities')) {
            $query->where('city', 'like', '%' . $request->input('cities') . '%');
        }
        if ($request->has('search')) {
            $search = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search)
                    ->orWhere('description', 'like', $search);
            });
        }

        // Order the query by created_at in descending order
        $query->orderBy('created_at', 'desc');

        // Paginate the results
        $jobs = $query->paginate(1);

        return view('feeds', compact('jobs'));
    }
}

// $jobs = $jobs
//     ->orderBy('created_at', 'desc')
//     ->paginate(1);
