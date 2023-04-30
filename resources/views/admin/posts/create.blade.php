@extends('layout.master')
@push('css')
    <style>
        .error {
            color: red !important;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div id="div-error" class="alert alert-danger d-none"></div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.posts.store') }}" method="post"
                          id="form-create">
                        @csrf
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control" name="company" id='select-company'></select>
                        </div>
                        <div class="form-group">
                            <label>Language (*)</label>
                            <select class="form-control" multiple name="language[]" id='select-language'></select>
                        </div>
                        <div class="form-row select-location">
                            <div class="form-group col-6">
                                <label>City (*)</label>
                                <select class="form-control" name="city" id='select-city'></select>
                            </div>
                            <div class="form-group col-6">
                                <label>District</label>
                                <select class="form-control select-district" name="district"
                                        id='select-district'></select>
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
                                <label>Max Salary</label>
                                <select name="currency_salary" class="form-control">
                                    @foreach($currencies as $currency => $value)
                                        <option value="{{ $value }}">
                                            {{ $currency }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Requirement</label>
                                <textarea name="requirement" class="form-control" cols="40"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Number Applicants</label>
                                <input type="number" name="number_applicants" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="btn-submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-company" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Company</h4>
                    <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('admin.companies.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Company</label>
                            <input readonly name="company" id="company" class="form-control">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address2</label>
                                <input type="text" name="address2" class="form-control">
                            </div>
                        </div>
                        <div class="form-row select-location">
                            <div class="form-group col-6">
                                <label>City (*)</label>
                                <select class="form-control" name="city" id='city'></select>
                            </div>
                            <div class="form-group col-6">
                                <label>District</label>
                                <select class="form-control select-district" name="district" id='district'></select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Create</button>
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
            $("#select-language :selected").map(function (i, v) {
                languages.push($(v).text());
            });
            languages = languages.join(',');
            const city = $("#select-city").val();
            const company = $("#select-company").val();
            let title = `[${city}] [${languages}]`;
            if (company) {
                title += ' - ' +'['+ company +']';
            }
            $("#title").val(title);
        }

        //LOAD DISTRICT AFTER SELECT CITY
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

        //CHECK COMPANY
        function checkCompany() {
            $.ajax({
                url: '{{ route('api.companies.check') }}/' + $("#select-company").val(),
                type: 'GET',
                dataType: 'json',
                success: async function (response) {
                    if (response.data) {
                        submitForm();
                    } else {
                        $("#modal-company").modal("show");
                        $("#company").val($("#select-company").val());
                        $("#city").val($("#select-city").val()).trigger('change');
                    }
                }
            });
        }

        function submitForm() {
            $.ajax({
                url: $("#form-create").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $("#form-create").serialize(),
                success: function () {
                    $("#div-error").hide();
                },
                error: function (response) {
                    const errors = Object.values(response.responseJSON.errors);
                    let string = '<ul>';
                    errors.forEach(function (each) {
                        each.forEach(function (error) {
                            string += `<li>${error}</li>`;
                        });
                    });
                    string += '</ul>';
                    $("#div-error").html(string);
                    $("#div-error").removeClass("d-none").show();
                }
            });
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

            //Submit Form
            $("#form-create").validate({
                rules: {
                    company: {
                        required: true
                    }
                },
                submitHandler: function (form) {
                    checkCompany();
                }
            });
            });
    </script>
@endpush
