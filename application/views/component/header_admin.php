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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>img/logo_header.png">
    <title>PT. AZZAHRA TRANS UTAMA</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>vendors/admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo base_url() ?>vendors/admin/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>vendors/admin/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>vendors/admin/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/admin/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/admin/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>vendors/admin/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        p.profile{
            font-family:"Comic Sans MS", cursive, sans-serif;
            color:white;
        }

        p.top-profile{
            font-family:"Comic Sans MS", cursive, sans-serif;
            border-bottom: 3px solid white;
            color:white;
        }
    </style>
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
            <nav class="navbar top-navbar navbar-expand-md navbar-light" style="background-color: #028ee1;">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand">
                        <!-- Logo icon -->
                        <b><img src="<?php echo base_url() ?>img/logo_header.png" alt="homepage" class="dark-logo" style="width: 70px; padding-left: 10px;"/></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       <!--  <span>PT. AZZAHRA TRANS UTAMA</span> -->
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
                        <li>
                        <br>
                             <p style="color:white;">Hi, <?php if(!empty($this->session->userdata('nama'))) : echo $this->session->userdata('nama'); else : echo $this->session->userdata('emp_id'); endif; ?></p>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url() ?>vendors/admin/images/bookingSystem/3.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <?php if($this->session->userdata('nik')) : ?>
                                        <li><a href="<?php echo site_url('user/ubahPassword') ?>"><i class="fa fa-exchange"></i> Ubah Password</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
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
                        	<li> <a class="has-arrow  " href="<?php echo base_url('admin') ?>" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Home </span></a></li>
                        <?php if($this->session->userdata('emp_id')) : ?>
                        	<li> <a class="has-arrow  " href="<?php echo base_url('user') ?>" aria-expanded="false"><i class="fa fa-group"></i><span class="hide-menu">Kelola Data User </span></a></li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('akses') != 4 && $this->session->userdata('akses')) : ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Pengajuan </span></a>
                            <ul aria-expanded="false" class="collapse">

                                <?php if($this->session->userdata('akses') != 4 && $this->session->userdata('akses')) : ?>
                                <li><a href="<?php echo base_url('pengajuan/index') ?>"><i class="fa fa-file-o"></i> Pengajuan Kas Kecil </a></li> 
                                <?php endif; ?>

                                <?php if(($this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2) && $this->session->userdata('akses')) : ?>
                                <li> <a href="<?php echo base_url('verifikasi') ?>"><i class="fa fa-check-square-o"></i> Verifikasi </a></li>
                                <?php endif; ?>

                                <?php if($this->session->userdata('akses') != 4 && $this->session->userdata('akses')) : ?>
                                <li> <a href="<?php echo base_url('pengajuan/proses_pengajuan') ?>"><i class="fa fa-tasks"></i> Proses Pengajuan </a></li>
                                <?php endif; ?>

                                <?php if($this->session->userdata('akses') == 2 && $this->session->userdata('akses')) : ?>
                                <li> <a href="<?php echo base_url('pengajuan/pending') ?>"><i class="fa fa-ellipsis-h"></i> Pending Pengajuan </a></li>
                                <?php endif; ?>

                            </ul>
                        </li>     
                        <?php endif; ?>   

                        <?php if(/*$this->session->userdata('akses') == 5 || */$this->session->userdata('akses') == 3) : ?>
                        <li> <a class="has-arrow  " href="<?php echo base_url('verifikasi/bukti_dana_keluar') ?>" aria-expanded="false"><i class="fa fa-file-text-o"></i><span class="hide-menu">Bukti Dana Keluar </span></a></li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('akses') != 5 && $this->session->userdata('akses')) : ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-pie-chart"></i><span class="hide-menu">Laporan </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('laporan/perbagian') ?>"><i class="fa fa-street-view"></i> Laporan Perbagian</a></li>
                                <li><a href="<?php echo base_url('laporan/bulanan') ?>"><i class="fa fa-calendar-check-o"></i> Laporan Bulanan</a></li>
                                <li><a href="<?php echo base_url('laporan/jurnal') ?>"><i class="fa fa-line-chart"></i>       Laporan Jurnal</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('akses') == 2) : ?>
                        <li> <a class="has-arrow  " href="<?php echo base_url('saldo') ?>" aria-expanded="false"><i class="fa fa-balance-scale"></i><span class="hide-menu">Saldo </span></a></li>
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