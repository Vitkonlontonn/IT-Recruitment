@extends('layout.master')
@push('cdn')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@push('css')
    <style>
        .error {
            color: red
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h4 class="page-title">Posts</h4>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('admin.posts.store')}}" method="post"
                          id="form-create">
                        @csrf
                        <div class="form-group">
                            <label>Company(*)</label>
                            <select class="form-control" name="company" id="select-company">

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Language(*)</label>
                            <select class="form-control" multiple name="language[]" id="select-language">

                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>City(*)</label>
                                <select class="form-control" name="city" id="select-city">

                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>District</label>
                                <select class="form-control" name="district" id="select-district">

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>Min Salary</label>
                                <input type="number" name="min_salary" class="form-control">
                            </div>

                            <div class="form-group col-4">
                                <label>Max Salary</label>
                                <input type="number" name="max_salary" class="form-control">
                            </div>

                            <div class="form-group col-4">
                                <label>Currency Salary</label>
                                <select class="form-control" name="currency_salary" id="currency_salary">
                                    @foreach($currencies as $currency=>$value)
                                        <option value="{{$value}}">
                                            {{$currency}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Requirement</label>
                                <textarea name="requirement" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-4">
                                <label>Number Applicants</label>
                                <input type="number" name="number_applicants" class="form-control">

                            </div>

                            <div class="form-row col-4">
                                <div class="form-group col-6 ">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                                <div class="form-group col-6">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label>Job Title</label>
                                <input type="text" name="job_title" class="form-control" id="job_title">

                            </div>
                            <div class="form-group col-12">
                                <div class="form-group col-6 ">
                                    <button class='btn btn-success' id="btn-submit">Create</button>
                                </div>
                            </div>


                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

    <script>
        async function generateJobTitle() {
            let languages = [];
            const selectedLanguages = $("#select-language :selected").map(function (i, v) {
                languages.push($(v).text());
            });
            languages = languages.join(', ')
            const city = $("#select-city").val();
            const company = $("#select-company :selected").val().trim();


            $("#job_title").val(`[${city}] [${languages}] [${company}]`);
        }


        async function loadDistrict() {
            $('#select-district').empty();
            const path = $("#select-city option:selected").data('path');
            const response = await fetch('{{ asset('locations/') }}' + path);
            const districts = await response.json();
            $.each(districts.district, function (index, each) {
                if (each.pre === 'Quận' || each.pre === 'Huyện' || each.pre === 'Thị xã') {
                    $("#select-district").append(`
                    <option>
                        ${each.name}
                    </option>`);
                }
            })
        }



        $(document).ready(async function () {
            $("#select-city").select2();
            const response = await fetch('{{ asset('locations/index.json') }}');
            const cities = await response.json();
            $.each(cities, function (index, each) {
                $("#select-city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
            })

            $("#select-city").change(function () {
                loadDistrict();
            });
            $('#select-district').select2();
            loadDistrict();

            $("#select-company").select2({
                tags: true,
                ajax: {
                    url: '{{ route('api.companies') }}',
                    data: function (params) {
                        const queryParameters = {
                            q: params.term
                        };
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            })
                        };
                    }
                }
            });
            $("#select-language").select2({
                ajax: {
                    url: '{{ route('api.languages') }}',
                    data: function (params) {
                        const queryParameters = {
                            q: params.term
                        };
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            $(document).on('change', '#select-language, #select-company, #select-city', function () {
                generateJobTitle();
            });



        });


    </script>
@endpush
