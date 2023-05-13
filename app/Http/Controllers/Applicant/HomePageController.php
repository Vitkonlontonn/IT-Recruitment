<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
//        \DB::enableQueryLog();
//            $post = Post::with('languages')->find(34);
//            dd($post->languages->toArray());
//        dd(\DB::getQueryLog());
        $posts = Post::query()
            ->with(['languages',
                'company' => function ($q) {
                    return $q->select([
                        'id',
                        'name',
                        'logo'
                    ]);
                }
                ])
            ->latest()
            ->paginate();

//        dd($posts->toArray());
        return view('applicant.index', [
            'posts' => $posts,
        ]);
    }
}
