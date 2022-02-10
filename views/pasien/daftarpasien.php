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

      <div class="form-inline ml-10">
        <div class="row">
          <div class="input-group input-group-sm-right">
            <?php echo form_open('C_admin/cariPasien') ?>
            <input type="text" name="keyword" class="form-control form-control-navbar" placeholder="Search">
          </div>
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
              <?php echo form_close() ?>
          </div>
        </div>
      </div>




      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() . 'C_admin/logout'; ?>" class="dropdown-item">
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
              <h1>Daftar Pasien</h1>
            </div>
          </div>
        </div>
        <div class="btn-group">
          <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url() . 'C_admin/unduhDaftarPasien' ?>"><i class="fas fa-print"></i>Print</a>
        </div>
        <!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- <div class="invoice p-3 mb-3"> -->
              <!-- title row -->
              <!-- <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="col-6">
                  </div>
                </div> -->

              <div class="row">
                <div class="col-12">
                </div>
              </div>
              <!-- Table row -->
              <div class="row">
                <?= $this->session->flashdata('success'); ?>
                <?= $this->session->flashdata('hapus'); ?>
                <?= $this->session->flashdata('update'); ?>
                <div class="col-12 table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="nomor">Nomor</th>
                        <th scope="col" class="sort" data-sort="nama">Nama</th>
                        <th scope="col" class="sort" data-sort="jenis_kelamin">Jenis Kelamin</th>
                        <th scope="col" class="sort" data-sort="usia">Usia</th>
                        <th scope="col" class="sort" data-sort="alamat">Alamat</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <?php
                      $No = 1;
                      foreach ($pasien as $data_pasien) : ?>
                        <tr>
                          <td><?php echo $No++ ?></td>
                          <td><?php echo $data_pasien->nama ?></td>
                          <td><?php echo $data_pasien->jenis_kelamin ?></td>
                          <td><?php echo $data_pasien->usia ?></td>
                          <td><?php echo $data_pasien->alamat ?></td>
                          <td class="project-actions text-right">
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                <i class="fas fa-bars"></i></button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?php echo base_url() . 'C_pasien/lihatData/' . $data_pasien->id_pasien ?>">
                                  Lihat
                                </a>
                                <a class="dropdown-item" data-toggle="modal" href="#modal_ubah<?php echo $data_pasien->id_pasien; ?>">
                                  Ubah
                                </a>
                                <a class="dropdown-item" data-toggle="modal" href="#modal_hapus<?php echo $data_pasien->id_pasien; ?>"> Hapus
                                </a>
                              </div>
                            </div>
                            <div class="modal fade bd-example-modal-sm" id="modal_hapus<?php echo $data_pasien->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role=document>
                                <div class="modal-content">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_admin/hapusPasien/' . $data_pasien->id_pasien ?>">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="modal_hapus<?php echo $data_pasien->id_pasien; ?>"></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Apakah anda yakin ingin menghapus data ini? </p>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                                      <button class="btn btn-danger">Hapus</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- modal ubah -->
                            <div class="modal fade" id="modal_ubah<?php echo $data_pasien->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="modal_ubah<?php echo $data_pasien->id_pasien; ?>">Form Ubah Data Pasien</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="<?php echo base_url() . 'C_admin/perbaruiPasien' ?>">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Nama</label>
                                        <input type="hidden" name="id_pasien" class="form-control" value="<?php echo $data_pasien->id_pasien ?>">
                                        <input type="text" name="nama" class="form-control" value="<?php echo $data_pasien->nama ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?php echo $data_pasien->alamat ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $data_pasien->username ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Password</label>
                                        <input type="text" name="password" class="form-control" value="<?php echo $data_pasien->password ?>" required>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label class="form-control-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                              <option value="<?php echo $data_pasien->jenis_kelamin ?>"><?php echo $data_pasien->jenis_kelamin ?></option>
                                              <option value="1">Laki-laki</option>
                                              <option value="2">Perempuan</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-nama">Usia</label>
                                            <input type="number" name="usia" class="form-control" value="<?php echo $data_pasien->usia ?>" required>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-karbo">Tinggi Badan</label>
                                            <input type="number" name="tinggi_badan" class="form-control" value="<?php echo $data_pasien->tinggi_badan ?>" required>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-protein">Berat Badan</label>
                                            <input type="number" name="berat_badan" class="form-control" value="<?php echo $data_pasien->berat_badan ?>" required>
                                          </div>
                                        </div>
                                      </div>
                                      <div>
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                </div>
                </td>
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