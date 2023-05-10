<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with('languages')
            ->latest()
            ->paginate();
//dd($posts->toArray());
        return view('applicant.index', [
            'posts' => $posts,
        ]);
    }
}
