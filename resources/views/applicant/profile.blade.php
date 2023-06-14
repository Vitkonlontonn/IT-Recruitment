<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>IT Recuiter</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>

<body class="profile-page">


<div class="page-header header-filter" data-parallax="true"
     style="background-image: url('https://blueskytravel.com.vn/UserFiles/Image/The-Alps-places-of-grace-and-mystery-Photograped-by-Roberto-Bertero-59c92ea706c3c__880.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            @extends('layout_frontpage.navbar')
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="profile">
                        <div class="avatar">
                            <img src="https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg" alt="Circle Image"
                                 class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">{{$user->name}}</h3>
                            <h6>Applicant</h6>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i
                                    class="fa fa-dribbble"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 follow">
                    <button class="btn btn-fab btn-primary" rel="tooltip" title="Follow this user">
                        <i class="material-icons">add</i>
                    </button>
                </div>
            </div>


            <div class="description text-center">
                <p>{{$user->bio}} </p>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-icons" role="tablist">
                                <li class="active">
                                    <a href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i>
                                        Job Apply
                                    </a>
                                </li>
                                <li>
                                    <a href="#connections" role="tab" data-toggle="tab">
                                        <i class="material-icons">people</i>
                                        Connections
                                    </a>
                                </li>

                            </ul>


                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active work" id="work">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <h4 class="title">Job Collections</h4>
                            <div class="row collections">
                                @foreach($posts as $post)
                                    <div class="col-md-6">
                                        <div class="card card-background"
                                             style="background-image: url('https://icons-for-free.com/iconfiles/png/512/case+job+work+icon-1320185594726714045.png')">
                                            <a href="#pablo"></a>
                                            <div class="card-content">
                                                <label class="label label-primary">IT 2023</label>
                                                <a href="#pablo">
                                                    <h3 class="card-title">{{$post->job_title}}</h3>
                                                </a>
                                                @if($post->getOriginal('pivot_status')==1)
                                                <h5 class="card-content" style="color:white;" >Approved</h5>
                                                @endif
                                                @if($post->getOriginal('pivot_status')==0)
                                                    <h5 class="card-content" style="color:white;" >Not Approved Yet</h5>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1 stats">

                            <hr/>
                            <h4 class="title">About Work</h4>
                            <p class="description">Information technology is building communications networks for a company, safeguarding data and information, creating and administering databases, helping employees troubleshoot problems with their computers or mobile devices, or doing a range of other work to ensure the efficiency and security of business information ...</p>
                            <hr/>
                            <h4 class="title">Focus</h4>
                            <span class="label label-primary">Footwear</span>
                            <span class="label label-rose">Luxury</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane connections" id="connections">
                    <div class="col-md-5">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
{{--                                        <a href="#pablo">--}}
{{--                                            <img class="img" src="../assets/img/faces/card-profile2-square.jpg"/>--}}
{{--                                        </a>--}}
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">Information</h4>
                                        <h6 class="category text-muted">{{$user->phone}}</h6>
                                        <h6 class="category text-muted">{{$user->email}}</h6>
                                        <h6 class="category text-muted">{{$user->city}}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@extends('layout_frontpage.footer')


</body>
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
<!--   Core JS Files   -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js"></script>

<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="../assets/js/moment.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="../assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
<script src="../assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
<script src="../assets/js/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>

<!--    Plugin For Google Maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="../assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
</html>
