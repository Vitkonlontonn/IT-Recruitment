@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add Post</a>
                </div>
                <h4 class="page-title">Posts</h4>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control" name="company"></select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

