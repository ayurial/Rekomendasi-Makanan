<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Rekomendasi Makanan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <!-- <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Aplikasi Rekomendasi Makanan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Profil</a>
          </div>
        </div> -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'Home/dashboard_pasien'; ?>">
              <!-- <a href="pages/widgets.html" class="nav-link"> -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <p>
                Profil
              </p>
            </a>
          </li>
        </ul>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() . 'C_makanan/lihatDaftarMakanan'; ?>">
                <!-- <a href="pages/widgets.html" class="nav-link"> -->
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link active" href="<?= base_url() . 'C_rekomendasi/hitungKalori'; ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Rekomendasi Makanan
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link" href="<?= base_url() . 'C_pasien/riwayatMakanan'; ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Riwayat Rekomendasi
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- </div> -->