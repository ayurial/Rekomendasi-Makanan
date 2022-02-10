<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() . 'C_pasien/logout'; ?>" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> logout
              <span class="float-right text-muted text-sm"></span>
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar Rekomendasi Makanan</h1>
            </div>
            <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Rekomendasi Makanan</li>
              </ol>
            </div> -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="col-6">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <!-- SEARCH FORM -->
                    <!-- <form class="form-inline ml-10">
                      <div class="input-group input-group-sm-right">
                        <?php echo form_open('C_makanan/cariMakanan') ?>
                        <input class="form-control form-control-navbar" type="text" name="keyword" placeholder="Search" aria-label="Search">
                      </div>
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <?php echo form_close() ?>
                      </div>
                  </div>
                  </form> -->
                    <!-- <div class="navbar-form navbar-right">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group mb-0">
                            <?php echo form_open('C_makanan/cariMakanan') ?>
                            <input type="text" name="keyword" class="form-control" placeholder="Search">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group mb-0">
                            <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                              <?php echo form_close() ?>
                          </div>
                        </div>
                      </div>
                    </div> -->

                  </div>
                </div>
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="nomor">Nomor</th>
                          <th scope="col" class="sort" data-sort="jenis">Jenis</th>
                          <th scope="col" class="sort" data-sort="nama">Nama</th>
                          <th scope="col" class="sort" data-sort="karbo">Kandungan Karbohidrat</th>
                          <th scope="col" class="sort" data-sort="protein">Kandungan Protein</th>
                          <th scope="col" class="sort" data-sort="lemak">Kandungan Lemak</th>
                          <th scope="col" class="sort" data-sort="harga">Harga</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php
                        $No = 1;
                        foreach ($makanan as $data_makanan) : ?>
                          <tr>
                            <td><?php echo $No++ ?></td>
                            <td><?php echo $data_makanan->nama_jenis ?></td>
                            <td><?php echo $data_makanan->nama_makanan ?></td>
                            <td><?php echo $data_makanan->jumlah_karbohidrat ?></td>
                            <td><?php echo $data_makanan->jumlah_protein ?></td>
                            <td><?php echo $data_makanan->jumlah_lemak ?></td>
                            <td><?php echo $data_makanan->harga ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->


              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
      </div>
    </footer> -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>
  <script>
    $(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>

</body>

</html>