
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Signup Page - Material Kit PRO by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>

<body class="signup-page">
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../presentation.html">Nhóm 6</a>
        </div>


    </div>
    </div>
</nav>


<div class="page-header header-filter" filter-color="purple" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="card card-signup">
                    <h2 class="card-title text-center">Register</h2>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="info info-horizontal">
                                <div class="icon icon-rose">
                                    <i class="material-icons">timeline</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Acceptance</h4>
                                    <p class="description">
                                        We have created this Privacy Policy (the “Policy”) because we value users’ privacy. The Policy describes the types of information we may collect from you, or that you may provide, when you access jooble.org (the “Site”).
                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">code</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">What information we collect</h4>
                                    <p class="description">
                                       Personal Information: First Name, Last Name, Email, Phone number, University, Resume, Payment Details, login, password. Voluntary Data: Information you voluntarily provide when you contact us for any reason, upload or otherwise send us.

                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Data security</h4>
                                    <p class="description">
                                        Personal information you provide to us is stored on a password protectedserver accessible only by administrator.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="social text-center">
                                <button class="btn btn-just-icon btn-round btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button class="btn btn-just-icon btn-round btn-git">
                                    <i class="fa fa-dribbble"></i>
                                </button>
                                <button class="btn btn-just-icon btn-round btn-facebook">
                                    <i class="fa fa-facebook"> </i>
                                </button>
                                <h4> or be classical </h4>
                            </div>

                            <form class="form" action="{{route('registering')}}" method="post">
                                @csrf
                                <div class="card-content">
                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
                                        <input name="name" type="text" class="form-control" placeholder="Full Name...">
                                    </div>

                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
                                        <input name="email" type="text" class="form-control" placeholder="Email...">
                                    </div>

                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                        <input name="password" type="password" placeholder="Password..." class="form-control" />
                                    </div>
                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">phone</i>
											</span>
                                        <input name="phone" type="text" placeholder="Phone..." class="form-control" />
                                    </div>
                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">      </i>
											</span>
                                        <input name="city" type="text" placeholder="City..." class="form-control" />
                                    </div>
                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">      </i>
											</span>
                                        <textarea name="bio" placeholder="Bio..." class="form-control" ></textarea>
                                    </div>

                                    <!-- If you want to add a checkbox to this form, uncomment this code -->

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                            Have a account?  <a href="{{route('login')}}">Login</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button class="btn btn-primary" type="submit"> Get Started</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @extends('layout_frontpage.footer')

</div>


</body>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}"></script>

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
<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script>
</html>

