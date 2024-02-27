<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>marimoCashier | CNA</title>
    <meta name="description" content="marimoCashier">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('elaadmin-master') ?>/images/logo_c.png">
    <link rel="shortcut icon" href="<?= base_url('elaadmin-master') ?>/images/logo_c.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/assets/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('elaadmin-master') ?>/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script src="<?= base_url('elaadmin-master') ?>/assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/init/chartjs-init.js"></script>

    <script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Data Tables -->
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?= base_url('elaadmin-master') ?>/assets/js/init/datatables-init.js"></script>

    <!-- Auto Numeric -->
    <script src="<?= base_url('autoNumeric') ?>/src/AutoNumeric.js"></script>

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="user-menu">
                        <a style="font-weight:bold; color:DarkTurquoise;"><?= session()->get('nama') ?>.</a>
                    </li>

                    <li class="<?= $menu == 'dashboard' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin') ?>"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li class="menu-title">Master Data</li><!-- /.menu-title -->
                    <li class="<?= $submenu == 'kategori' ? 'active' : '' ?>">
                        <a href="<?= base_url('Kategori') ?>"><i class="menu-icon ti ti-layout-grid2"></i>Kategori </a>
                    </li>
                    <li class="<?= $submenu == 'produk' ? 'active' : '' ?>">
                        <a href="<?= base_url('Produk') ?>"><i class="menu-icon ti ti-package"></i>Produk </a>
                    </li>
                    <li class="<?= $submenu == 'satuan' ? 'active' : '' ?>">
                        <a href="<?= base_url('Satuan') ?>"><i class="menu-icon ti ti-anchor"></i>Satuan </a>
                    </li>
                    <li class="<?= $submenu == 'user' ? 'active' : '' ?>">
                        <a href="<?= base_url('User') ?>"><i class="menu-icon ti ti-user"></i>User </a>
                    </li>

                    <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                    <li class="<?= $submenu == 'penjualan' ? 'active' : '' ?>">
                        <a href="<?= base_url('Penjualan') ?>"><i class="menu-icon ti ti-receipt"></i>Penjualan </a>
                    </li>

                    <li class="menu-title">Laporan</li><!-- /.menu-title -->
                    <li class="<?= $submenu == 'laporan-harian' ? 'active' : '' ?>">
                        <a href="<?= base_url('Laporan/LaporanHarian') ?>"><i class="menu-icon fa fa-files-o"></i>Harian </a>
                    </li>
                    <li class="<?= $submenu == 'laporan-bulanan' ? 'active' : '' ?>">
                        <a href="<?= base_url('Laporan/LaporanBulanan') ?>"><i class="menu-icon fa fa-files-o"></i>Bulanan </a>
                    </li>
                    <li class="<?= $submenu == 'laporan-tahunan' ? 'active' : '' ?>">
                        <a href="<?= base_url('Laporan/LaporanTahunan') ?>"><i class="menu-icon fa fa-files-o"></i>Tahunan </a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a id="menuToggle" class="menutoggle-center"><i class="fa fa-bars"></i></a>
                    <a class="navbar-brand"><img src="<?= base_url('elaadmin-master') ?>/images/panellog-removebg-preview.png" alt="Logo"></a>
                    <a class="navbar-brand hidden"><img src="<?= base_url('elaadmin-master') ?>/images/panellog-removebg-preview.png" alt="Logo"></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <!--<div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                            </div>
                        </div>


                    </div>-->
                    <!--<a class="nav-link" href="./">-->
                    <a class="nav-link" href="<?= base_url('Home/Logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </header>
        <!-- /#header -->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?= $judul ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><?= $judul ?></li>
                                    <li><?= $subjudul ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <!-- isi konten -->
                    <?php
                    if ($page) {
                        echo view($page);
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        TOKO &copy; <b>MARIMOCNA19
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

</body>

</html>