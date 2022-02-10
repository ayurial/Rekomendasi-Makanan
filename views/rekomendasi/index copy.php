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
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
                <form method="post" action="<?php echo base_url() . 'C_rekomendasi/lihatHasilRekomendasi'; ?>">

                  <h3><i class="fas fa-info"></i> Kebutuhan Kalori</h3>
                  <h5 class="nama"><?php echo $pasien->nama ?></h5>

                  <p class="jeniskelamin"><?php echo $pasien->jenis_kelamin ?></p>
                  <?php
                  switch ($pasien->jenis_kelamin) {
                    case 'Perempuan':
                      $pasien->AMB = 655 + (9.6 * $pasien->berat_badan) + (1.8 * $pasien->tinggi_badan) - (4.7 * $pasien->usia);
                      $pasien->kebutuhan_karbohidrat = ($pasien->AMB * 0.65) / 4;
                      $pasien->kebutuhan_protein = ($pasien->AMB * 0.25) / 4;
                      $pasien->kebutuhan_lemak = ($pasien->AMB * 0.1) / 9; ?>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <!-- <input type="hidden" name="id_riwayat" class="form-control" value="9"> -->
                          <input type="hidden" name="panjang_gen" class="form-control" value="9">
                          <input type="hidden" name="jumlah_generasi" class="form-control" value="90">
                          <input type="hidden" name="jumlah_populasi" class="form-control" value="100">
                          <input type="hidden" name="cr" class="form-control" value="0.7">
                          <input type="hidden" name="mr" class="form-control" value="0.3">
                          <input type="hidden" name="AMB" class="form-control" value="<?php echo $pasien->AMB ?>">
                          <b>AMB</b> <a class="float"><?php echo $pasien->AMB ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_karbohidrat" class="form-control" value="<?php echo $pasien->kebutuhan_karbohidrat ?>">
                          <b>Kebutuhan karbohidrat</b> <a class="float"><?php echo $pasien->kebutuhan_karbohidrat ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_protein" class="form-control" value="<?php echo $pasien->kebutuhan_protein ?>">
                          <b>Kebutuhan Protein</b> <a class="float"><?php echo $pasien->kebutuhan_protein ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_lemak" class="form-control" value="<?php echo $pasien->kebutuhan_lemak ?>">
                          <b>Kebutuhan Lemak</b> <a class="float"><?php echo $pasien->kebutuhan_lemak ?></a>
                        </li>
                      </ul>
                    <?php
                      break;
                    case 'Laki-laki':
                      $pasien->AMB = 665 + (13.7 * $pasien->berat_badan) + (5 * $pasien->tinggi_badan) - (6.8 * $pasien->usia);
                      $pasien->kebutuhan_karbohidrat = ($pasien->AMB * 0.65) / 4;
                      $pasien->kebutuhan_protein = ($pasien->AMB * 0.25) / 4;
                      $pasien->kebutuhan_lemak = ($pasien->AMB * 0.1) / 9;
                    ?>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <input type="hidden" name="panjang_gen" class="form-control" value="9">
                          <input type="hidden" name="jumlah_generasi" class="form-control" value="90">
                          <input type="hidden" name="jumlah_populasi" class="form-control" value="100">
                          <input type="hidden" name="cr" class="form-control" value="0.7">
                          <input type="hidden" name="mr" class="form-control" value="0.3">
                          <input type="hidden" name="AMB" class="form-control" value="<?php echo $pasien->AMB ?>">
                          <input type="hidden" name="AMB" class="form-control" value="<?php echo $pasien->AMB ?>">
                          <b>AMB</b> <a class="float"><?php echo $pasien->AMB ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_karbohidrat" class="form-control" value="<?php echo $pasien->kebutuhan_karbohidrat ?>">
                          <b>Kebutuhan karbohidrat</b> <a class="float"><?php echo $pasien->kebutuhan_karbohidrat ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_protein" class="form-control" value="<?php echo $pasien->kebutuhan_protein ?>">
                          <b>Kebutuhan Protein</b> <a class="float"><?php echo $pasien->kebutuhan_protein ?></a>
                        </li>
                        <li class="list-group-item">
                          <input type="hidden" name="kebutuhan_lemak" class="form-control" value="<?php echo $pasien->kebutuhan_lemak ?>">
                          <b>Kebutuhan Lemak</b> <a class="float"><?php echo $pasien->kebutuhan_lemak ?></a>
                        </li>
                      </ul>
                  <?php                }
                  ?>

                  <button type="submit" class="btn btn-primary"><b>Proses</b></button>
                </form>
              </div>


              <!-- Main content -->

              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Hasil Rekomendasi
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <?php
                if ($rekomendasi == NULL) { ?>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Nama Makanan</th>
                            <th>Kalori</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  <?php
                } else {
                  ?>
                    <form method="post" action="<?php echo base_url() . 'C_rekomendasi/simpanHasilRekomendasi'; ?>">

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Nomor</th>
                                <th>Nama Makanan</th>
                                <th>Kalori</th>
                                <th></th>
                                <!-- <th>Karbohidrat</th>
                                <th>Protein</th>
                                <th>Lemak</th>
                                <th>Harga</th>
                              </tr> -->
                            </thead>
                            <tbody class="list">
                              <!-- <?php
                                    $id_riwayat_curr = $pasien->id_riwayat + 1 ?> -->
                              <input type="hidden" name="kebutuhan_karbohidrat" class="form-control" value="<?php echo $pasien->kebutuhan_karbohidrat ?>">
                              <input type="hidden" name="AMB" class="form-control" value="<?php echo $pasien->AMB ?>">
                              <input type="hidden" name="kebutuhan_protein" class="form-control" value="<?php echo $pasien->kebutuhan_protein ?>">
                              <input type="hidden" name="kebutuhan_lemak" class="form-control" value="<?php echo $pasien->kebutuhan_lemak ?>">
                              <?php foreach ($idRiwayat as $id) : ?>
                                <input type="hidden" name="id_riwayat" class="form-control" value="<?php echo $id->id_riwayat ?>">
                              <?php endforeach ?>

                              <!-- <?php echo $id_riwayat_curr ?> -->
                              <?php
                              $No = 1;
                              foreach ($rekomendasi as $hasil) : ?>
                                <input type="hidden" name="id_makanan[]" class="form-control" value="<?php echo $hasil->id_makanan ?>">

                                <tr>
                                  <td><?php echo $No++ ?></td>
                                  <td><?php echo $hasil->nama_makanan ?></td>
                                  <td><?php echo $hasil->jumlah_kalori ?></td>
                                  <!-- <td><?php echo $hasil->jumlah_karbohidrat ?></td>
                                  <td><?php echo $hasil->jumlah_protein ?></td>
                                  <td><?php echo $hasil->jumlah_lemak ?></td>
                                  <td><?php echo $hasil->harga ?></td> -->
                                  <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" data-toggle="modal" href="#modal_ubah<?php echo $hasil->id_makanan; ?>"> <i class="fas fa-pencil-alt">
                                      </i>
                                      Detail
                                    </a>
                                    <!-- modal ubah -->
                                    <div class="modal fade" id="modal_ubah<?php echo $hasil->id_makanan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="modal_ubah<?php echo $hasil->id_makanan; ?>">Detail Makanan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div align="left">
                                              <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                  <b>Tipe Makanan : </b> <a class="text"><?php echo $hasil->nama_jenis ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Nama Makanan : </b> <a class="text"><?php echo $hasil->nama_makanan ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Deskripsi : </b> <a class="text"><?php echo $hasil->deskripsi ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Total Kalori : </b> <a class="float"><?php echo $hasil->jumlah_kalori ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Jumlah Karbohidrat : </b> <a class="float"><?php echo $hasil->jumlah_karbohidrat ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Jumlah Protein : </b> <a class="float"><?php echo $hasil->jumlah_protein ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Jumlah Lemak : </b> <a class="float"><?php echo $hasil->jumlah_lemak ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                  <b>Harga : </b> <a class="float"><?php echo $hasil->harga ?></a>
                                                </li>
                                            </div>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>

                      </div>
                      </td>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                  </div>
              </div>
              <div class="text-right">
                <input type="button" class="btn btn-secondary" value="Batal" onclick="history.back(-1)" />
                <button type="submit" class="btn btn-primary"><b>Simpan</b></button>
              </div>
              </form>

            <?php
                } ?>
            <!-- /.col -->
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