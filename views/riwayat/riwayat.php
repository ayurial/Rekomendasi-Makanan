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
                <!-- <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Invoice</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Invoice</li>
              </ol>
            </div>
          </div>
        </div>/.container-fluid -->
            </section>

            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <form method="post" action="<?php echo base_url() . 'C_pasien/riwayatMakanan'; ?>">

                                    <h3><i class="fas fa-info"></i> Riwayat Rekomendasi</h3>
                                    <!-- <h5 class="nama"><?php echo $pasien->nama ?></h5> -->

                                    <!-- <p class="jeniskelamin"><?php echo $pasien->jenis_kelamin ?></p> -->
                                    <div class="form-group">
                                        <label>Mulai</label>
                                        <input type="date" name="mulai" class="form-control">
                                        <?php echo form_error('mulai', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Selesai</label>
                                        <input type="date" name="selesai" class="form-control">
                                        <?php echo form_error('selesai', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><b>Tampilkan</b></button>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h1 class="card-title">Riwayat Rekomendasi</h1>

                                            <div class="card-tools">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url() . 'C_pasien/unduhRiwayatMakanan/?mulai=' . set_value('mulai') . '&selesai=' . set_value('selesai') ?>"><i class="fas fa-print"></i>Print</a>

                                                </div>
                                                <!-- <div class="input-group input-group-sm" style="width: 150px;"> -->
                                                <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                                                <!-- <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="tanggal_rekomendasi">Tanggal Rekomendasi</th>
                                                        <th scope="col" class="sort" data-sort="AMB">Kebutuhan Kalori</th>
                                                        <th scope="col" class="sort" data-sort="nama_makanan">Nama Makanan</th>
                                                        <th scope="col" class="sort" data-sort="jumlah_karbohidrat">Karbohidrat</th>
                                                        <th scope="col" class="sort" data-sort="jumlah_protein">Protein</th>
                                                        <th scope="col" class="sort" data-sort="jumlah_lemak">Lemak</th>
                                                        <th scope="col" class="sort" data-sort="harga">Harga</th>
                                                        <!-- <th scope="col" class="sort" data-sort="usia">Usia</th>
                              <th scope="col" class="sort" data-sort="alamat">Alamat</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php
                                                    $no = 0;
                                                    // $karbo=0;
                                                    // $karbo=0;
                                                    foreach ($riwayat as $data) :
                                                        // $karbo = $karbo+ $data['jumlah_karbohidrat'];
                                                        // $pro = $pro+ $data['jumlah_protein'];
                                                        // $lemak = $lemak+ $data['jumlah_lemak'];
                                                    ?>
                                                        <tr>
                                                            <?php
                                                            if ($no % 9 == 0) : ?>
                                                                <td rowspan="9"><?php echo $data['tanggal_rekomendasi'] ?></td>
                                                                <td rowspan="9"><?php echo $data['AMB'] ?></td>
                                                                <td><?php echo $data['nama_makanan'] ?></td>
                                                                <td><?php echo $data['jumlah_karbohidrat'] ?></td>
                                                                <td><?php echo $data['jumlah_protein'] ?></td>
                                                                <td><?php echo $data['jumlah_lemak'] ?></td>
                                                                <td><?php echo $data['harga'] ?></td>
                                                            <?php else : ?>
                                                                <!-- <td></td>
                                  <td></td> -->
                                                                <td><?php echo $data['nama_makanan'] ?></td>
                                                                <td><?php echo $data['jumlah_karbohidrat'] ?></td>
                                                                <td><?php echo $data['jumlah_protein'] ?></td>
                                                                <td><?php echo $data['jumlah_lemak'] ?></td>
                                                                <td><?php echo $data['harga'] ?></td>
                                                            <?php
                                                            endif;
                                                            $no++;
                                                            ?>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>



                            <!-- Main content -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> -->
            <!-- All rights reserved. -->
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.0.5 -->
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>
</body>

</html>