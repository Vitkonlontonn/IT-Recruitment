
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login Page - Material Kit PRO by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>

<body class="login-page">
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
            <a class="navbar-brand" href="../presentation.html">Material Kit PRO</a>
        </div>

        <div class="collpase navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../index.html">
                        <i class="material-icons">apps</i> Components
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">view_day</i> Sections
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="../sections.html#headers">
                                <i class="material-icons">dns</i> Headers
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#features">
                                <i class="material-icons">build</i> Features
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#blogs">
                                <i class="material-icons">list</i> Blogs
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#teams">
                                <i class="material-icons">people</i> Teams
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#projects">
                                <i class="material-icons">assignment</i> Projects
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#pricing">
                                <i class="material-icons">monetization_on</i> Pricing
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#testimonials">
                                <i class="material-icons">chat</i> Testimonials
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#contactus">
                                <i class="material-icons">call</i> Contacts
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">view_carousel</i> Examples
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="../examples/about-us.html">
                                <i class="material-icons">account_balance</i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="../examples/blog-post.html">
                                <i class="material-icons">art_track</i> Blog Post
                            </a>
                        </li>
                        <li>
                            <a href="../examples/blog-posts.html">
                                <i class="material-icons">view_quilt</i> Blog Posts
                            </a>
                        </li>
                        <li>
                            <a href="../examples/contact-us.html">
                                <i class="material-icons">location_on</i> Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="../examples/landing-page.html">
                                <i class="material-icons">view_day</i> Landing Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/login-page.html">
                                <i class="material-icons">fingerprint</i> Login Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/pricing.html">
                                <i class="material-icons">attach_money</i> Pricing Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/ecommerce.html">
                                <i class="material-icons">shop</i> Ecommerce Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/product-page.html">
                                <i class="material-icons">beach_access</i> Product Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/profile-page.html">
                                <i class="material-icons">account_circle</i> Profile Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/signup-page.html">
                                <i class="material-icons">person_add</i> Signup Page
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="http://www.creative-tim.com/buy/material-kit-pro?ref=presentation" target="_blank" class="btn btn-white btn-simple">
                        <i class="material-icons">shopping_cart</i> Buy Now
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" style="background-image: url('https://thuthuatnhanh.com/wp-content/uploads/2020/03/hinh-anh-bang-tuyet-tren-nui-va-bau-troi-sao.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" action="{{route('loginning')}}" method="post" >
                        @csrf
                        <div class="header header-primary text-center">
                            <h4 class="card-title">Log in</h4>
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="description text-center">Or Be Classical</p>
                        <div class="card-content">


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
                        </div>
                        <div class="footer text-center">
                            <button class="btn btn-primary btn-simple btn-wd btn-lg" type="submit">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br>  <br> <br> <br> <br>


</div>

</body>
<!--   Core JS Files   -->

<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>

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
<script src="{{asset('js/material-kit.js?v=1.2.1')}}" type="text/javascript"></script>
</html>
