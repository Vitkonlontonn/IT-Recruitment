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

                    <nav>
                        <ul class="pagination pagination-rounded mb-0" id="pagination">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">

                                </a>
                            </li>
                        </ul>

                    </nav>

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
                            <th>Salary</th>
                            <th>Date Range</th>
                            <th>Status</th>
                            <th>Is Pinned</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
{{--                    <ul class ="pagination pagination-info" >--}}
{{--                        {{$posts->links()}}--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            //ajax này để lấy data
            $.ajax({
                url: "{{route('api.posts')}}",
                // data: "data",
                dataType: "json",
                success: function (response) {
                    response.data.forEach(function (each, index) {
                        $('#table-data').append(($('<tr>'))
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.job_title))
                            .append($('<td>').append(each.district + " - " + each.city))
                            .append($('<td>').append(each.remoteable ? 'x':' '))
                            .append($('<td>').append(each.part_time ? 'x':' '))
                            .append($('<td>').append(each.min_salary + " - " +each.max_salary))
                            .append($('<td>').append(each.start_date + " - " +each.end_date))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(each.is_pinned ? 'x':' '))
                            .append($('<td>').append(each.created_at))
                        );
                        //renderPagination
                        // response.pagination.forEach(function (each) {
                        //     $('#pagination').append($('<li>'))
                        //         .append(`<a className="page-link ${each.active?'active':''}" href="${each.url}">
                        //     ${each.label}
                        //     </a>`);
                        // })


                    });





                },
                error: function (response) {

                }
            })
            $("#csv").change(function (event) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: "{{route('admin.posts.import_csv')}}",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    enctype: "multipart/form-data",
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
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
