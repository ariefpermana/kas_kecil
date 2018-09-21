<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url(); ?>img/logo_perbanas.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href="<?php echo base_url(); ?>vendor/mdb/css/addons/datatables.min.css" rel="stylesheet">

    <style>
      body{
        background-color: white;
        color:black;
        font-family: sans-serif;
      }
      .left_col{
        background: #616766;
      }
      .nav.side-menu>li.active>a{
        background:linear-gradient(#498fe6, #48946a),#131313;
      }
      .nav.side-menu>li.current-page,
      .nav.side-menu>li.active{
        border-right:5px solid #06d6b9;
      }
      /*.nav-md ul.nav.child_menu li:before{
        background:#8f4894;
      }*/
      .nav_title{
        background:#2e2f2f;
      }
      .nav_menu{
        background:#616766;
      }
      .fa-navicon:before, 
      .fa-reorder:before, 
      .fa-bars:before{
        color:black;
      }
      .nav-sm ul.nav.child_menu{
        background:#2e2f2f;
      }
      .site_title i{
        border: none;
      }
      .nav.navbar-nav>li>a{
        color:white !important;
      }
      .top_nav .nav>li>a:focus, 
      .top_nav .nav>li>a:hover, 
      .top_nav .nav .open>a, 
      .top_nav .nav .open>a:focus, 
      .top_nav .nav .open>a:hover{
        background: #2e2f2f;
      }
      #left_menu{
        height: 1000px;
      }
      .nav li.current-page{
        background: rgba(23, 18, 18, 0.47);
      }

      /*tambahan untuk border list barang*/

      .thumbnail
      {
        border-radius: 0px;
        border-style: solid;
        border-color: rgba(182, 22, 22, 1);
        border-width: 3px;
      }

      .btn
      {
        border-radius: 0px;
        border:none;
      }
      
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view" id="left_menu">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"><i class=""></i> <span>BMAP Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
           <!--  <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />
            <?php $privilege = $this->session->userdata('privilege'); ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               <!--  <h3>General</h3> -->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                      <?php if($privilege == 0 || $privilege == 2 || $privilege == 5): ?>
                        <li><a href="<?php echo site_url('peminjaman/pengajaun') ?>">Status Pengajuan</a></li>
                      <?php endif; ?>
                      <?php if($privilege == 0 || $privilege == 1 || $privilege == 5): ?>
                        <li><a href="<?php echo site_url('peminjaman/status')  ?>">Status Peminjaman</a></li>
                      <?php endif; ?>
                      <!-- <?php if($privilege == 4 || $privilege == 1 || $privilege == 5): ?>
                        <li><a href="<?php echo site_url('')  ?>">Data Peminjam</a></li>
                      <?php endif; ?> -->
                      <?php if($privilege == 4 || $privilege == 1 || $privilege == 5): ?>
                        <li><a href="<?php echo site_url('barang/dataBarang')  ?>">Data Barang</a></li>
                      <?php endif; ?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if($privilege == 4 || $privilege == 5): ?>
                      <li><a href="<?php echo site_url('peminjaman/laporan'); ?>">Laporan Peminjaman</a></li>
                    <?php endif; ?>
                    <?php if($privilege == 1 || $privilege == 0 || $privilege == 5): ?>
                      <li><a href="<?php echo site_url('barang'); ?>">List Barang</a></li>
                    <?php endif; ?>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="background:#2e2f2f;color:white;padding-left:20px;padding-top:10px;">
             <p>&copy Copyright 2018</p>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>img/logo_perbanas.jpeg" alt=""><?php echo $this->session->userdata('nama');?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <?php if($privilege == 0) : ?>
                      <li><a href="<?php echo site_url('peminjam/waitingList') ?>"><i class="fa fa-calendar pull-right"></i> Waiting List</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
      <!-- page content -->
    <div class="right_col" role="main" style="background:white;">
      <!-- top tiles -->
      
      <!-- /top tiles -->
      <br />