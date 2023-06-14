@extends('layout_frontpage.master')
@section('content')
    <div class="media media-post">
        <div class="media-body">
            <form class="form" action="{{route('applicant.appling')}}" enctype="multipart/form-data" method="post">
                @csrf
                    <input type="hidden" name="post_id" value="{{$postId}}">
                    <div class="form-group is-empty">
                        <input type="text" value="{{$user->link}}" placeholder="Your link (CV, Resume or Portfolio) " class="form-control">
                        <span class="material-input"></span>
                    </div>

                <br>

                <div class="media-footer">

                    <button class="btn btn-primary pull-right" type="submit">Done</button>
                </div>
            </form>

        </div><!-- end media-body -->

    </div>
@endsection
