<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featuredPosts' => Post::featured()->published()->take(3)->latest('published_at')->get(),
            'latestPosts' => Post::published()->take(6)->latest('published_at')->get(),
        ]);
    }
}
