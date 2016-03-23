<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('back/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('back/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('back/css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{asset('back/css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{asset('back/css/floatexamples.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('back/js/jquery.min.js')}}"></script>
    <script src="{{asset('back/js/nprogress.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('back/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{asset('back/https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

    @yield('head')

</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Laravel Admin</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                            <li><a href="/admin/users"><i class="fa fa-user"></i> Users </a></li>
                            <li><a href="/admin/roles"><i class="fa fa-sitemap"></i> Roles </a></li>
                            <li><a href="/admin/pages"><i class="fa fa-newspaper-o"></i> Pages </a></li>
                            <li><a href="/admin/menu"><i class="fa fa-reorder"></i> Menu </a></li>
                            <li><a href="/admin/posts"><i class="fa fa-edit"></i> Posts </a></li>
                            <li><a href="/admin/tags"><i class="fa fa-tags"></i> Tags </a></li>
                            <li><a href="/admin/categories"><i class="fa fa-puzzle-piece"></i> Categories </a></li>
                            <li><a href="/admin/comments"><i class="fa fa-comments"></i> Comments </a></li>
                            <li><a href="/admin/messages"><i class="fa fa-envelope-o"></i> Messages </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('back/images/user.png')}}" alt="">{{auth()->user()->username}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="{!! url('/') !!}">Back on site</a></li>
                                <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            @yield('content')

        </div>
        <!-- /page content -->

    </div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{asset('back/js/bootstrap.min.js')}}"></script>

<!-- bootstrap progress js -->
<script src="{{asset('back/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('back/js/nicescroll/jquery.nicescroll.min.js')}}"></script>

<!-- icheck -->
<script src="{{asset('back/js/icheck/icheck.min.js')}}"></script>
<script src="{{asset('back/js/custom.js')}}"></script>

@yield('scripts')

</body>
</html>
