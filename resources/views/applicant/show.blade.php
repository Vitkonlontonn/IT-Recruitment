@extends('layout_frontpage.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="tab-content">
                <div class="card card-pricing">
                    <div class="card-content">
                        <ul>
                            <li>
                                <i class="material-icons text-success">
                                    @if($post->remoteable)
                                        check
                                    @else
                                        close
                                    @endif
                                </i>
                                Remote
                            </li>
                            <li>
                                <i class="material-icons text-success">
                                    @if($post->can_parttime)
                                        check
                                    @else
                                        close
                                    @endif
                                </i>
                                Part time
                            </li>
                            @isset($post->number_applicants)
                                <li>

                                    <b>{{$post->number_applicants}}</b> applicants
                                </li>
                            @endisset

                        </ul>
                        <a href="{{route('applicant.apply', $post->id)}}" class="btn btn-primary btn-round" id="btn-apply">
                            Apply
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <h2 class="title">
                {{ $post->job_title }}
            </h2>
            <h3 class="main-price">
                {{ $post->salary }}
            </h3>
            <h4>
                Location: {{ $post->location }}
                <br>
                Company: <a href="{{route('applicant.company', $post->company_id)}}">
                    {{ $post->company->name }}
                </a>
            </h4>
            @isset($post->requirement)
                <div id="acordeon">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                        Requirement
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body" >
                                    {{ $post->requirement }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            @isset($post->min_salary)
                <div id="acordeon">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                        Salary
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body" >
                                    {{ $post->min_salary }}$ - {{$post->max_salary}}$
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            @isset($post->end_date)
                <div id="acordeon">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                        Date
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body" >
                                    {{ $post->start_date }} - {{$post->end_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

            @isset($post->file)
                <div class="row text-right">
                    <a class="btn btn-rose btn-round" href="{{ $post->file->link }}" target="_blank">
                        Open File
                        <i class="fa fa-file"></i>
                    </a>
                </div>
            @endisset
        </div>
    </div>


@endsection


