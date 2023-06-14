@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="page-title"> Approved apply</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Post Information</h4>

                                <h5><b>{{$post->job_title}}</b></h5>

                                <address class="mb-0 font-14 address-lg">
                                    {{$post->requirement}}<br>
                                    {{$post->number_applicants}} Applicants<br>
                                    <abbr >Up to </abbr> {{$post->max_salary}} $ <br>
                                    <abbr >Date: </abbr> {{$post->end_date}}
                                </address>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">User Information</h4>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <p class="mb-2"><span class="font-weight-bold mr-2">Name: </span> {{$user->name}}</p>
                                        <p class="mb-2"><span class="font-weight-bold mr-2">Email: </span> {{$user->email}}</p>
                                        <p class="mb-2"><span class="font-weight-bold mr-2">CV: </span><a href="{{$user->link}}">CV</a> </p>
                                        <p class="mb-0"><span class="font-weight-bold mr-2">Position:</span>{{$user->position}}</p>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Company Infomation</h4>

                                <div class="text-center">
                                    <i class="mdi mdi-office-building h2 text-muted"></i>
                                    <h5><b>{{$company->name}}</b></h5>
                                    <p class="mb-1"><b>Phone :</b> {{$company->phone}}</p>
                                    <p class="mb-0"><b>Location :</b> {{$company->city}}</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <br>
                    <div class="col-9">
                        <button type="submit" class="btn btn-info  "><a href="approve?id={{$report->id}}">Approved</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
