<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Westham</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/toast-master/css/jquery.toast.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/dist/summernote.css">

    <!-- DataTables -->
    
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- ------------------------------------------- -->

    <link rel="shortcut icon" href="<?= base_url("assets/images/wh.png") ?>">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/morris/morris.css") ?>">

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">


</head>

<body>
<style>
@media print {
   #no-print {
      visibility: hidden;
   }
}
</style>
    <!-- Navigation Bar-->
    <div class="wrapper">
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Image Logo -->
                    <a href="" class="logo">
                        <!-- <img src="<?= base_url('assets/images/wh.png') ?>" alt="" height="32" class="logo-small"> -->
                        <img src="<?= base_url('assets/images/wh.png') ?>" alt="" height="30" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">

                    
                    <ul class="list-inline float-right mb-0">
                        <!-- Search -->
                        <!-- <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0"> 
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form> 
                        </li> -->
                      
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a id="no-print" class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('assets/images/users/admin.jpg') ?>" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                <a class="dropdown-item" href="#"><span class="badge badge-success mt-1 float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a> -->
                                
                                <a class="dropdown-item" href="<?= site_url('controllerLogin/logout') ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            </div>

                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul> 
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="<?= site_url('controllerHome') ?>"><i class="dripicons-home"></i>Beranda</a>
                        </li>

                        <li class="has-submenu">
                            <a href="<?= site_url('ControllerPemain') ?>"><i class="dripicons-article"></i>Data Pemain</a>
                            <ul class="submenu">
                                <li><a href="<?= site_url('ControllerMusim') ?>"><i class="dripicons"></i>Data Musim</a></li>
                                <li> <a href="<?= site_url('ControllerPertandingan') ?>"><i class="dripicons"></i>Data Pertandingan</a></li>
                            </ul>
                        </li>

                        <!-- <li class="has-submenu">
                            <a href="<?= site_url('ControllerMusim') ?>"><i class="dripicons-copy"></i>Data Musim</a>
                        </li> -->

                        <li class="has-submenu">
                            <a href="<?= site_url('ControllerBobot') ?>"><i class="dripicons-broadcast"></i>Data Bobot</a>
                        </li>

                        <li class="has-submenu">
                            <a href="<?= site_url('ControllerKriteria') ?>"><i class="dripicons-view-thumb"></i>Data Kriteria</a>
                        </li>

                        <!-- <li class="has-submenu">
                            <a href="<?= site_url('ControllerAlternatif') ?>"><i class="dripicons-graph-bar"></i>Data Jurusan</a>
                        </li>

                        <li class="has-submenu">
                            <a href="<?= site_url('ControllerSubKriteria') ?>"><i class="dripicons-copy"></i>Sub Kriteria</a>
                        </li> -->

                        <li class="has-submenu">
                            <a href="<?= site_url('controllerHasil') ?>"><i class="dripicons-graph-bar"></i>Analisis Hasil</a>
                        </li>

                        <li class="has-submenu">
                            <a href="<?= site_url('controllerLaporan') ?>"><i class="dripicons-meter"></i>Laporan</a>
                        </li>
                        <?php if($this->session->userdata['level'] == 'superadmin'): ?>
                        <li class="has-submenu float-right">
                            <a href="<?= site_url('controllerAdmin') ?>"><i class="dripicons-user"></i>Admin</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    </div>
    <!-- End Navigation Bar-->