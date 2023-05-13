<?php

namespace App\View\Components;

use App\Models\ObjectLanguage;
use Illuminate\View\Component;

class Post extends Component
{
    public string $title;
    public string $languages;
    //kiểu dữ liệu object
    public object $company;
    public string $location;



    public function __construct($post)
    {
        $this->post = $post;
        $this->title = $post->job_title;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
        $this->company=$post->company;
        $this->location=$post->location;


    }

    public function render()
    {
        return view('components.post');
    }
}
