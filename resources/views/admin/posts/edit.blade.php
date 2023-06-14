@extends('layout.master')
@push('css')
    <link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .error {
            color: red !important;
        }
        input[data-switch]:checked + label:after {
            left: 180px;
        }
        input[data-switch] + label {
            width: 200px;
        }
    </style>
@endpush
@section('content')
    <h2>Edit</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div id="div-error" class="alert alert-danger d-none"></div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('admin.posts.update', $post)}}" method="post"
                          id="form-create-post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Company (*)</label>
                            <select class="form-control" name="company" id='select-company' required></select>
                        </div>
                        <div class="form-group">
                            <label>Language (*)</label>
                            <select class="form-control" multiple name="languages[]" id='select-language' required>
                            </select>
                        </div>
                        <div class="form-row select-location">
                            <div class="form-group col-6">
                                <label>City (*)</label>
                                <select class="form-control" name="city" id='select-city'></select>
                            </div>
                            <div class="form-group col-6">
                                <label>District (*)</label>
                                <select class="form-control select-district" name="district"
                                        id='select-district'></select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>Min Salary</label>
                                <input type="number" name="min_salary" class="form-control"
                                value="{{$post->min_salary}}">
                            </div>
                            <div class="form-group col-4">
                                <label>Max Salary</label>
                                <input type="number" name="max_salary" class="form-control"
                                       value="{{$post->max_salary}}">
                            </div>
                            <div class="form-group col-4">
                                <label>Currency Salary</label>
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
                            <div id="summernote-basic" class="form-group col-6">
                                <label>Requirement</label>
                                <textarea name="requirement" id="text-requirement" class="form-control"
                                          id="text-requirement" cols="40" >{{$post->requirement}}</textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Number Applicants</label>
                                <input type="number" name="number_applicants" class="form-control"
                                       value="{{$post->number_applicants}}">

                                Remote    Part time
                                <br>
                                <input type="checkbox" id="remote" name="remoteable" checked data-switch="success"     >
                                <label for="remote" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" name="part_time" id="can_parttime" checked data-switch="info">
                                <label for="can_parttime" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control"
                                   value=" {{$post->start_date}}">
                            </div>
                            <div class="form-group col-6">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control"
                                       value=" {{$post->end_date}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Title</label>
                                <input type="text" name="job_title" class="form-control" id="title"
                                       value=" {{$post->job_title}}">
                            </div>

                        </div>
                        <div class="form-group">
                            <button  class="btn btn-success" id="btn-submit" >Update</button>
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
                    <form id="form-create-company" class="form-horizontal" action="{{ route('admin.companies.store') }}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Company</label>
                            <input readonly name="name" id="company" class="form-control">
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
                        <div class="form-row ">
                            <div class="form-group col-6">
                                <label>Zipcode</label>
                                <input type="number" name="zipcode" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control"
                                       {{--  preview ảnh đã tải lên       --}}
                                       oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <img id="pic" height="100">
                            </div>
                            <input type="hidden" name="country" value="Việt Nam">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitForm('company')" class="btn btn-success">Create Company
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
    <script>

    </script>
    <script>

        function successNotification(message)
        {
            $.toast({
                heading: 'Success',
                text: message,
                showHideTransition: 'slide',
                position: 'bottom-right',
                icon: 'success'
            })
        }

        async function setValue() {
            var optionSelect = document.getElementById('select-company');

            var selectedOption = 'FPT'; // Giả sử option mặc định là 'value2'

            optionSelect.value = selectedOption;

        }

        //LOAD DISTRICT AFTER SELECT CITY
        async function loadDistrict(parent) {
            parent.find(".select-district").empty();
            const path = parent.find("option:selected").data('path');
            const response = await fetch('{{ asset('locations/') }}' + path);
            const districts = await response.json();
            let string = '';
            const selectedValue = $("#select-district").val();
            $.each(districts.district, function (index, each) {
                if (each.pre === 'Quận' || each.pre === 'Huyện') {
                    string += `<option`;
                    if (selectedValue === each.name) {
                        string += ` selected `;
                    }
                    string += `>${each.name}</option>`;
                }
            })
            parent.find(".select-district").append(string);
        }


        //CHECK COMPANY
        function checkCompany() {
            $.ajax({
                url: '{{ route('api.companies.check') }}/' + $("#select-company").val(),
                type: 'GET',
                dataType: 'json',
                success: async function (response) {
                    if (response.data) {
                        submitForm('post');
                    } else {
                        $("#modal-company").modal("show");
                        $("#company").val($("#select-company").val());
                        $("#city").val($("#select-city").val()).trigger('change');
                    }
                }
            });
        }

        function showError(errors) {
            let string = '<ul>';
            if (Array.isArray(errors)) {
                errors.forEach(function (each) {
                    each.forEach(function (error) {
                        string += `<li>${error}</li>`;
                    });
                });
            } else {
                string += `<li>${errors}</li>`;
            }
            string += '</ul>';
            $("#div-error").html(string);
            $("#div-error").removeClass("d-none").show();

        }

        function submitForm(type) {

            $("#modal-company").modal("hide");
            if(type=='company')
            {
                successNotification('Update successful');
            }
            if(type=='post')
            {
                successNotification('Update successful')
            }


            const obj = $("#form-create-" + type);
            const formData = new FormData(obj[0]);
            $.ajax({
                url: obj.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                async: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function (response) {

                    if (response.success) {
                        $("#div-error").hide();
                        {{--window.location.href = '{{ route('admin.posts.index') }}';--}}
                    } else {
                        // showError(response.message);
                    }
                },
                error: function (response) {
                    let errors;
                    if (response.responseJSON.errors) {
                        errors = Object.values(response.responseJSON.errors);
                        // showError(errors);
                    } else {
                        errors = response.responseJSON.message;
                        // showError(errors);
                    }
                }
            });
        }


        $(document).ready(async function () {

            $("#text-requirement").summernote();

            $("#select-city").select2();
            $("#city").select2();
            const response = await fetch('{{ asset('locations/index.json') }}');
            const cities = await response.json();
            $.each(cities, function (index, each) {
                $("#select-city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
                $("#city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
            })

            $("#select-city, #city").change(function () {
                loadDistrict($(this).parents('.select-location'));
            });


            $('#select-district').select2();
            $('#district').select2();
            await loadDistrict($('#select-city').parents('.select-location'));


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
            //Set value for edit form
            var newOption = new Option("{{$company->name}}", "{{$company->name}}", false, false);
            $('#select-company').append(newOption).trigger('change');
            var newOption1 = new Option("{{$post->city}}", "{{$post->city}}", false, false);
            $('#select-city').append(newOption1).trigger('change');
            var newOption2 = new Option("{{$post->district}}", "{{$post->district}}", false, false);
            $('#select-district').append(newOption2).trigger('change');

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
            var newOption3 = new Option("C++", "C++", false, false);
            $('#select-language').append(newOption3).trigger('change');



            // $(document).on('change', '#select-language, #select-company, #select-city', function () {
            //     setValue();
            // });

            //Submit Form

            $("#form-create-post").validate({
                rules: {
                    company: {
                        required: true
                    },

                },
                submitHandler: function () {
                    checkCompany();
                }
            });
        });
    </script>
@endpush
