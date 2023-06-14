@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h4 class="page-title"> Approved apply</h4>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Post ID</th>
                            <th>Detail</th>
                            <th>Approved</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            @if($item->status==0)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->reported_id}}</td>
                                    <td><a href="applies/view?id={{$item->id}}" type="button" class="btn btn-primary">View</a></td>
                                    <td><a href="applies/approve?id={{$item->id}}" type="button" class="btn badge-info">Approved</a></td>

                                </tr>
                            @endif
                        @endforeach
                        </tbody>

                    </table>
                    <ul id="#pagination" class="pagination pagination-info">

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
