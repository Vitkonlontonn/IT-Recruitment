@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <label>
                        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add Post</a>
                    </label>
                    <label for="csv" class="btn btn-info mb-0">Import CSV</label>
                    <input type="file" name="csv" id="csv" class="d-none"
                           accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

                </div>
                <h4 class="page-title"> Posts</h4>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Remote-able</th>
                            <th>Is Part-time</th>
                            <th>Data Range</th>
                            <th>Status</th>
                            <th>Is Pinned</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            {{--$.ajax({--}}
            {{--    url: "{{route('api.posts.index')}}",--}}
            {{--    data: "data",--}}
            {{--    dataType: "json",--}}
            {{--})--}}
            {{--    .success(function (response) {--}}
            {{--        // $('#table-data').--}}
            {{--    })--}}
            {{--    .error(function (response) {--}}

            {{--    });--}}
            $("#csv").change(function (event) {
                var formData= new FormData();
                formData.append('file',$(this)[0].files[0]);
                $.ajax({
                    url: "{{route('admin.posts.import_csv')}}",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    enctype:"multipart/form-data",
                    async: false,
                    cache:false,
                    contentType: false,
                    processData:false,
                    success: function (response) {
                        $.toast({
                            heading: 'Import Success',
                            text: 'Your data have been imported',
                            showHideTransition: 'slide',
                            position: 'bottom-right',
                            icon: 'success'
                        })
                    },
                    error: function (response) {

                    }
                });
            })
        });

    </script>
@endpush
