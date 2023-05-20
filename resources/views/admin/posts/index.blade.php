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

{{--                    <nav>--}}
{{--                        <ul class="pagination pagination-rounded mb-0" id="pagination">--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">--}}

{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                    </nav>--}}

                </div>
                <h4 class="page-title"> Posts</h4>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Remote</th>
                            <th>Part time</th>
                            <th>Salary</th>
                            <th>Date Range</th>
{{--                            <th>Status</th> xem xét--}}
                            <th>Pinned</th>
                            <th>Created At</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                    <ul id="#pagination" class="pagination pagination-info">
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function formatDate(dateString) {
            var date = new Date(dateString);

            var day = date.getUTCDate().toString().padStart(2, '0');
            var month = (date.getUTCMonth() + 1).toString().padStart(2, '0');
            var year = date.getUTCFullYear().toString();
            var formattedDate = day + '/' + month + '/' + year;
            return formattedDate;
        }

        $(document).ready(function () {
            //ajax này để lấy data
            $.ajax({
                url: "{{route('api.posts')}}",
                // data: "data",
                dataType: "json",
                data: {page: {{ request()->get('page') ?? 1 }} },
                success: function (response) {
                    response.data.forEach(function (each, index) {
                        $('#table-data').append(($('<tr>'))
                                .append($('<td>').append(each.id))
                                .append($('<td>').append(each.job_title))
                                .append($('<td>').append(each.district + " - " + each.city))
                                .append($('<td>').append(each.remoteable ? 'x' : ' '))
                                .append($('<td>').append(each.part_time ? 'x' : ' '))
                                .append($('<td>').append((each.min_salary && each.max_salary) ? each.min_salary + '-' + each.max_salary : ''))
                                .append($('<td>').append((each.start_date && each.end_date) ? each.start_date + '-' + each.end_date : ''))
                                // .append($('<td>').append(each.status)) //xem xét
                                .append($('<td>').append(each.is_pinned ? 'x' : ' '))
                                .append($('<td>').append(formatDate(each.created_at)))
                            {{--.append($('<td>').append(<a href="{{route('admin.posts.edit')}}"><i class="mdi mdi-pencil"></i></a>))--}}
                            {{--.append($('<td>').append(<form action="{{route('admin.posts.destroy')}}" method="post">--}}
                            {{--    @csrf--}}
                            {{--    @method('DELETE')--}}
                            {{--    <button class="btn btn-danger">Delete--}}
                            {{--    </button>--}}
                            {{--</form>))--}}
                        );
                    })
                        renderPagination(response.pagination);

                        $(document).on('click', '#pagination > li > a', function (event) {
                            event.preventDefault();
                            let page = $(this).text();
                            let urlParams = new URLSearchParams(window.location.search);
                            urlParams.set('page', page);
                            window.location.search = urlParams;
                        });

                },
                error: function (response) {

                }
            })
            $("#csv").change(function (event) {
                var formData = new FormData(); //interface
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
