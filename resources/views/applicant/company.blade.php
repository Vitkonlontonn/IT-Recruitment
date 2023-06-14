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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>
<body>
{{--About us--}}
<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(https://images.pexels.com/photos/3389618/pexels-photo-3389618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1); transform: translate3d(0px, 0px, 0px);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="title">{{$company->name}}</h1>
                <h4>{{$company->description}}</h4>
            </div>
        </div>
    </div>
</div>

<div class="projects-3 section-dark" id="projects-3">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h6 class="category text-muted"></h6>
                <h2 class="title">Our jobs</h2>
            </div>
        </div>

        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card card-plain">
                    <a href="#pablo">
                        <div class="card-image">
                            <img src="https://png.pngtree.com/png-vector/20190826/ourlarge/pngtree-job-png-image_1699611.jpg">
                        </div>
                    </a>
                    <div class="card-content">
                        <h6 class="category"></h6>
                        <a href="#pablo">
                            <h4 class="card-title">{{$post->job_title}}</h4>
                        </a>
                        <p class="card-description">
                            {{$post->location}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</div>
<div class="contactus-1 section-image" style="background-image: url('assets/img/examples/city.jpg')">

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="title">Get in Touch</h2>
                <h5 class="description">You need more information? Check what other persons are saying about our
                    product. They are very happy with their purchase.</h5>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="material-icons">pin_drop</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Find us at the office</h4>
                        <p> {{$company->address}}<br>
                            {{$company->address2}}<br>
                            Viet Nam
                        </p>
                    </div>
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="material-icons">phone</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Give us a ring</h4>
                        <p>
                            {{$company->phone}}<br>
                            Mon - Fri, 8:00-22:00
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-5 col-md-offset-2">
                <div class="card card-contact">
                    <form role="form" id="contact-form" method="post">
                        <div class="header header-raised header-primary text-center">
                            <h4 class="card-title">Contact Us</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">First name</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Last name</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Email address</label>
                                <input type="email" name="email" class="form-control">
                                <span class="material-input"></span></div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Your message</label>
                                <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                                <span class="material-input"></span></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span
                                                class="checkbox-material"><span class="check"></span></span>
                                            I'm not a robot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
