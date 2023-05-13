@extends('layout_frontpage.master')
@section('content')

    <div class="col-md-9">
        <div class="row">
{{--            component--}}
            @foreach($posts as $post)
                <x-post :post="$post"/>
            @endforeach
        </div>
        <ul class ="pagination pagination-info" style="float: right" >
            {{$posts->links()}}
        </ul>

    </div>

@endsection
