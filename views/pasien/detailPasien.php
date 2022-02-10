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
    <div class="content-wrapper">
      <section class="content-header">

        <!-- Content Header (Page header) -->
        <div class="container-fluid mt--2">
          <div class="row">
            <div class="col">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-2">
                  <h3 class="mb-0">Detail Pasien</h3>
                </div>
                <!-- Card footer -->
                <div class="card-footer">
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <tbody class="list">
                        <tr>
                          <th scope="row">
                            <div class="media align-items-center">
                              <!-- <div class="avatar rounded-circle mr-3">
                            </div> -->
                              <div class="media-body">
                                <h4 class="heading-small text-muted mb-4">Biodata</h4>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Nama Lengkap</label>
                                      <input type="hidden" name="id_pasien" class="form-control" value="<?php echo $biodatapasien->id_pasien ?>">
                                      <input type="text" name="nama" class="form-control" disabled value="<?php echo $biodatapasien->nama ?>">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group text-rigt">
                                      <label class="form-control-label" for="input-nik">Jenis Kelamin</label>
                                      <input type="text" name="jenis_kelamin" class="form-control" disabled value="<?php echo $biodatapasien->jenis_kelamin  ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Alamat</label>
                                      <input type="text" name="alamat" class="form-control" disabled value="<?php echo $biodatapasien->alamat ?>">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Usia</label>
                                      <input type="number" name="usia" class="form-control" disabled value="<?php echo $biodatapasien->usia ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Username</label>
                                      <input type="text" name="username" class="form-control" disabled value="<?php echo $biodatapasien->username ?>">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Tinggi Badan</label>
                                      <input type="number" name="tinggi_badan" class="form-control" disabled value="<?php echo $biodatapasien->tinggi_badan ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Password</label>
                                      <input type="text" name="password" class="form-control" disabled value="<?php echo $biodatapasien->password ?>">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-nik">Berat Badan</label>
                                      <input type="number" name="berat_badan" class="form-control" disabled value="<?php echo $biodatapasien->berat_badan ?>">
                                    </div>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <!-- </div> -->
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h1 class="card-title">Riwayat Rekomendasi</h1>

                          <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                              </div>
                            </div>
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
                              foreach ($pasien as $data) :
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
                  <!-- /.content -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
              All rights reserved. -->
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
      $("#example2").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>