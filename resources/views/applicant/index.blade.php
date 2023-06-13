@extends('layout_frontpage.master')

@section('content')
    <h1> </h1>
    <h2 class="section-title">Find what you need</h2>
    <div class="row">
    </div>
    @include('layout_frontpage.sidebar')

    <div class="col-md-9">
        <div class="row">
            @foreach($posts as $post)
                <x-post :post="$post"/>
            @endforeach
        </div>
        <ul class="pagination pagination-info" style="float: right">
            {{$posts->links()}}
        </ul>

    </div>

@endsection
