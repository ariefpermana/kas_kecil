<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php base_url() ?>img/logo_header.png">
    <title>PT. ATU</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php base_url() ?>vendors/admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php base_url() ?>vendors/admin/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php base_url() ?>vendors/admin/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php base_url() ?>vendors/admin/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php base_url() ?>vendors/admin/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php base_url() ?>vendors/admin/css/helper.css" rel="stylesheet">
    <link href="<?php base_url() ?>vendors/admin/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <!-- Main wrapper  -->
    <div id="main-wrapper">
            <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand">
                        <!-- Logo icon -->
                        <b><img src="<?php base_url() ?>img/logo_header.png" alt="homepage" class="dark-logo" style="width: 40px; padding-left: 10px;"/></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>PT. AZZAHRA TRANS UTAMA</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <!-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li> -->
                        <!-- <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php base_url() ?>vendors/admin/images/bookingSystem/3.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <!-- <li class="nav-label">Controll User</li> -->
                        <?php if($this->session->userdata('emp_id')) : ?>
                        	<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Controll User </span></a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            
        </div>