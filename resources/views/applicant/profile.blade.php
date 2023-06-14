<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Profile Page - Material Kit PRO by Creative Tim</title>

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
                            <img src="{{$user->avatar}}" alt="Circle Image"
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
                                        Work
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
                                                <label class="label label-primary">Spring 2016</label>
                                                <a href="#pablo">
                                                    <h3 class="card-title">{{$post->job_title}}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1 stats">
                            <h4 class="title">Stats</h4>
                            <ul class="list-unstyled">
                                <li><b>60</b> Products</li>
                                <li><b>4</b> Collections</li>
                                <li><b>331</b> Influencers</li>
                                <li><b>1.2K</b> Likes</li>
                            </ul>
                            <hr/>
                            <h4 class="title">About his Work</h4>
                            <p class="description">French luxury footwear and fashion. The footwear has incorporated
                                shiny, red-lacquered soles that have become his signature.</p>
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
                                        <a href="#pablo">
                                            <img class="img" src="../assets/img/faces/card-profile2-square.jpg"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">George West</h4>
                                        <h6 class="category text-muted">Model/DJ</h6>

                                        <p class="card-description">
                                            I love you like Kanye loves Kanye.
                                        </p>
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
