<!--
=========================================================
* Argon Design System - v1.2.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Best Network Marketing
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
</head>

<body class="landing-page">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="../index.html">
                <img src="../assets/img/brand/white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../../../index.html">
                                <img src="../assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#pricing" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    @if(session('user'))
                    <li class="nav-item d-none d-lg-block">
                        <a href="/auth/register" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="ni ni-settings"></i>
                            </span>
                            <span class="nav-link-inner--text">DASHBOARD</span>
                        </a>
                    </li>

                    @else
                    <li class="nav-item d-none d-lg-block">
                        <a href="/auth/register" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="ni ni-circle-08"></i>
                            </span>
                            <span class="nav-link-inner--text">Register NOW</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="section section-hero section-shaped">
            <div class="shape shape-style-3 shape-default">
                <span class="span-150"></span>
                <span class="span-50"></span>
                <span class="span-50"></span>
                <span class="span-75"></span>
                <span class="span-100"></span>
                <span class="span-75"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
            </div>
            <div class="page-header">
                <div class="container shape-container d-flex align-items-center py-lg">
                    <div class="col px-0">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 text-center">
                                <h1 class="text-white display-1">Best Network Marketing Team</h1>
                                <h2 class="display-4 font-weight-normal text-white">The time is right now!</h2>
                                <div class="btn-wrapper mt-4">
                                    <a href="#" class="btn btn-warning btn-icon mt-3 mb-sm-0 join-now">
                                        <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                        <span class="btn-inner--text">Join now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="section features-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="info info-horizontal info-hover-primary">
                            <div class="description pl-4">
                                <h5 class="title">For Developers</h5>
                                <p>The time is now for it to be okay to be great. People in this world shun people for
                                    being great. For being a bright color. For standing out. But the time is now.</p>
                                <a href="#" class="text-info">Learn more</a>
                            </div>
                        </div>
                        <div class="info info-horizontal info-hover-primary mt-5">
                            <div class="description pl-4">
                                <h5 class="title">For Designers</h5>
                                <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.
                                    That’s my skill. I’m not really specifically talented at anything except for the
                                    ability to learn.</p>
                                <a href="#" class="text-info">Learn more</a>
                            </div>
                        </div>
                        <div class="info info-horizontal info-hover-primary mt-5">
                            <div class="description pl-4">
                                <h5 class="title">For Beginners</h5>
                                <p>That’s what I do. That’s what I’m here for. Don’t be afraid to be wrong because you
                                    can’t learn anything from a compliment. If everything I did failed - which it
                                    doesn't.</p>
                                <a href="#" class="text-info">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-10 mx-md-auto">
                        <img class="ml-lg-5" src="../assets/img/ill/ill.png" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <div id="pricing" class="section features-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="badge badge-primary badge-pill mb-3">Our services</span>
                        <h3 class="display-3">Getting RICH FAST with our services!</h3>
                        <p class="lead">The time is now for it to be okay to be great. For being a bright color. For
                            standing out.</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($data as $plan)
                    <div class="col-md-4">
                        <div class="info">
                            <h6 class="info-title text-uppercase text-primary">{{$plan->title}}</h6>
                            <p class="description opacity-8">{{$plan->description}}</p>
                            <a href="/plan/{{$plan->id}}" class="text-primary">More about {{$plan->title}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br /><br />
        <footer class="footer">
            <div class="container">
                <div class="row row-grid align-items-center mb-5">
                    <div class="col-lg-6">
                        <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
                        <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
                    </div>
                    <div class="col-lg-6 text-lg-center btn-wrapper">
                        <button target="_blank" href="https://twitter.com/creativetim" rel="nofollow"
                            class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip"
                            data-original-title="Follow us">
                            <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                        </button>
                        <button target="_blank" href="https://www.facebook.com/CreativeTim/" rel="nofollow"
                            class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip"
                            data-original-title="Like us">
                            <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                        </button>
                        <button target="_blank" href="https://dribbble.com/creativetim" rel="nofollow"
                            class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip"
                            data-original-title="Follow us">
                            <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
                        </button>
                        <button target="_blank" href="https://github.com/creativetimofficial" rel="nofollow"
                            class="btn btn-icon-only btn-github rounded-circle" data-toggle="tooltip"
                            data-original-title="Star on Github">
                            <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; 2020 <a href="" target="_blank">Creative Tim</a>.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-footer justify-content-end">
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>