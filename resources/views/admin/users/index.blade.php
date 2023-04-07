@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline" id="form-filter">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <div class="col-3">
                                <select class="form-control select-filter" name="role" id="role">
                                    <option selected>All</option>
                                    @foreach($roles as $role=>$value)
                                        <option value="{{$value}}"
                                                @if((string)$value===$selectedRole) selected @endif
                                        >
                                            {{$role}}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role">Position</label>
                            <div class="col-3">
                                <select class="form-control select-filter" name="city" id="city">
                                    <option selected>All</option>
                                    @foreach($cities as $city)
                                        <option
                                            @if($city===$selectedCity) selected @endif
                                        >
                                            {{$city}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role">Company</label>
                            <div class="col-3">
                                <select class="form-control select-filter" name="company" id="company">
                                    <option selected>All</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}"
                                                @if($company->id==$selectedCompany) selected @endif
                                        >
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Info</th>
                            <th>Role</th>
                            <th>Position</th>
                            <th>City</th>
                            <th>Company</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $each)
                            <tr>
                                <td>
                                    <a href="{{route("admin.$table.show", $each)}}">
                                        {{$each->id}}
                                    </a>

                                </td>
                                <td>
                                    <img src="{{$each->avatar}}" height="50" width="50">
                                </td>
                                <td>
                                    {{$each->name}} - {{$each->getGenderNameAttribute()}}
                                    <br>
                                    <a href="mailto:{{ $each->email }} ">
                                        {{$each->email}}
                                    </a>
                                    <br>
                                    <a href="tel:{{ $each->tel }}">
                                        {{$each->phone}}
                                    </a>
                                </td>
                                <td>
                                    {{$each->getRoleNameAttribute()}}
                                </td>
                                <td>
                                    {{$each->position}}
                                </td>
                                <td>
                                    {{$each->city}}
                                </td>
                                <td>
                                    {{optional($each->company)->name}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination pagination-rounded mb-0">
                {{$data->links()}}
            </ul>
        </nav>

    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $(".select-filter").change(function () {
                $("#form-filter").submit();
            });
        });
    </script>
@endpush
