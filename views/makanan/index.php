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
            <?php echo form_open('C_makanan/cariMakanan') ?>
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
        <!-- Notifications Dropdown Menu -->
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

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
      </li>
      </ul> -->
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar Makanan</h1>
            </div>
          </div>
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data Makanan</button>

        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- <div class="row">
                <div class="col-6">
                  <div class="navbar-form navbar-right">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mb-0">
                          <?php echo form_open('C_makanan/cariMakanan') ?>
                          <input type="text" name="keyword" class="form-control" placeholder="Search">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group mb-0">
                          <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                            <?php echo form_close() ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
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
                        <th scope="col" class="sort" data-sort="jenis">Jenis</th>
                        <th scope="col" class="sort" data-sort="nama">Nama</th>
                        <th scope="col" class="sort" data-sort="karbo">Kandungan Karbohidrat</th>
                        <th scope="col" class="sort" data-sort="protein">Kandungan Protein</th>
                        <th scope="col" class="sort" data-sort="lemak">Kandungan Lemak</th>
                        <th scope="col" class="sort" data-sort="harga">Harga</th>
                        <th scope="col"></th>
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
                          <td class="project-actions text-right">
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                <i class="fas fa-bars"></i></button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" data-toggle="modal" href="#modal_ubah<?php echo $data_makanan->id_makanan; ?>">Edit</a>
                                <a class="dropdown-item" data-toggle="modal" href="#modal_hapus<?php echo $data_makanan->id_makanan; ?>">Hapus</a>
                              </div>
                            </div>

                            <!-- <a class="btn btn-info btn-sm" data-toggle="modal" href="#modal_ubah<?php echo $data_makanan->id_makanan; ?>"> <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                            </a>
                            <a class="btn btn-danger btn-sm" data-toggle="modal" href="#modal_hapus<?php echo $data_makanan->id_makanan; ?>"> <i class="fas fa-trash">
                              </i>
                              Delete
                            </a> -->
                            <div class="modal fade bd-example-modal-sm" id="modal_hapus<?php echo $data_makanan->id_makanan; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role=document>
                                <div class="modal-content">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_makanan/hapusMakanan/' . $data_makanan->id_makanan ?>">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="modal_hapus<?php echo $data_makanan->id_makanan; ?>"></h4>
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
                            <!-- </div> -->
                            <!-- modal ubah -->
                            <div class="modal fade" id="modal_ubah<?php echo $data_makanan->id_makanan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="modal_ubah<?php echo $data_makanan->id_makanan; ?>">Form Ubah Makanan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="<?php echo base_url() . 'C_makanan/perbaruiMakanan' ?>">
                                      <div class="form-group">
                                        <input type="hidden" name="id_makanan" class="form-control" value="<?php echo $data_makanan->id_makanan ?>">
                                        <label class="form-control-label">Jenis Makanan</label>
                                        <select name="jenis_makanan" class="form-control">
                                          <option value disabled="<?php echo $data_makanan->nama_jenis ?>"><?php echo $data_makanan->nama_jenis ?></option>
                                          <option value="1">Serealia</option>
                                          <option value="2">Umbi-umbia</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Nama Makanan</label>
                                        <input type="text" name="nama_makanan" class="form-control" value="<?php echo $data_makanan->nama_makanan ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-nama">Deskripsi</label>
                                        <!-- <input type="text" name="deskripsi" class="form-control" value="<?php echo $data_makanan->deskripsi ?>"> -->
                                        <textarea name="deskripsi" class="form-control" rows="4" value="<?php echo $data_makanan->deskripsi ?>"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-karbo">Jumlah Karbohidrat</label>
                                        <input type="text" name="jumlah_karbohidrat" class="form-control" value="<?php echo $data_makanan->jumlah_karbohidrat ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-protein">Jumlah Protein</label>
                                        <input type="text" name="jumlah_protein" class="form-control" value="<?php echo $data_makanan->jumlah_protein ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-lemak">Jumlah Lemak</label>
                                        <input type="text" name="jumlah_lemak" class="form-control" value="<?php echo $data_makanan->jumlah_lemak ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga</label>
                                        <input type="text" name="harga" class="form-control" value="<?php echo $data_makanan->harga ?>" required>
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
            </div>
          </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </section>

  <!-- Modal Tambah -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Tambah Makanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url() . 'C_makanan/tambahMakanan' ?>">
            <?= $this->session->flashdata('pesan_error'); ?>
            <div class="form-group">
              <label>Jenis Makanan</label>
              <select class="form-control custom-label" name="jenis_makanan">
                <option value="" selected disabled>- pilih -</option>
                <option value="1">Serealia</option>
                <option value="2">Umbi-umbian</option>
                <option value="3">Kacang, biji, bean</option>
                <option value="4">Sayur-sayuran</option>
                <option value="5">Buah-buahan</option>
                <option value="6">Daging, Unggas</option>
                <option value="7">Ikan, Kerang, Udang</option>
                <option value="8">Telur</option>
                <option value="9">Susu</option>
                <option value="10">Lemak dan Minyak</option>
                <option value="11">Gula, Sirup dan Konfeksioneri</option>
                <option value="12">Bumbu</option>
              </select>
              <?php echo form_error('jenis_makanan', '<span class="text-small text-danger">', '</span>') ?>
            </div>
            <div class="form-group">
              <label>Nama Makanan</label>
              <input type="text" name="nama_makanan" class="form-control" value="<?php echo set_value('nama_makanan'); ?>" required>
              <div class="headline text-red"> <?php echo form_error('nama_makanan'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <label class="form-control-label" for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="4" value="<?php echo set_value('deksripsi'); ?>"></textarea>
            </div>
            <div class="form-group">
              <label>Jumlah Karbohidrat</label>
              <input type="float" name="jumlah_karbohidrat" class="form-control" value="<?php echo set_value('jumlah_karbohidrat'); ?>" required>
              <div class="headline text-red"> <?php echo form_error('jumlah_karbohidrat'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Jumlah Protein</label>
              <input type="float" name="jumlah_protein" class="form-control" value="<?php echo set_value('jumlah_protein'); ?>" required>
              <div class="headline text-red"> <?php echo form_error('jumlah_protein'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Jumlah Lemak</label>
              <input type="float" name="jumlah_lemak" class="form-control" value="<?php echo set_value('jumlah_lemak'); ?>" required>
              <div class="headline text-red"> <?php echo form_error('jumlah_lemak'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="harga" class="form-control" value="<?php echo set_value('harga'); ?>" required>
              <div class="headline text-red"> <?php echo form_error('harga'); ?>
              </div>
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div> -->
  </footer>
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