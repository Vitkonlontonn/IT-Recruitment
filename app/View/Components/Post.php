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
    public string $postId;
    public string $part_time ='';
    public string $remote ='';
    public function __construct($post)
    {
        $this->post = $post;
        $this->title = $post->job_title;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
        $this->company=$post->company;
//        $this->logo= $this->company->logo;
//   dd(($a));
        $this->location=$post->location;
        $this->postId=$post->id;
        if($post->part_time==1)
        {
            $this->part_time ='Part time';
        }

        if($post->remoteable==1)
        {
            $this->remote ='Can Remote';
        }


    }

    public function render()
    {
        return view('components.post');
    }
}
