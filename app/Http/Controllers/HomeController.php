<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $now = Carbon::now();

        $perMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, $perMonth) {
            $posts = Post::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();

            $perMonth[] = $posts;
        })->toArray();

        dd($perMonth);
        return view('welcome');
    }
}
