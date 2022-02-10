<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<h1></h1>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <?php if (isset($validation)) : ?>
          <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form action="<?php echo base_url() . 'C_autentikasi/registerUser'; ?>" method="post">
          <div class="input-group mb-3">
            <input type="hidden" class="form-control" name="id_pasien">
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('nama'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select class="form-control custom-label" name="jenis_kelamin">
              <option value="" selected disabled>Jenis Kelamin</option>
              <option value="Laki-laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <div class="headline text-red"> <?php echo form_error('jenis_kelamin'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <!-- <span class="fas fa-lock"></span> -->
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="berat_badan" placeholder="Berat Badan" value="<?php echo set_value('berat_badan'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('berat_badan'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo set_value('tinggi_badan'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('tinggi_badan'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="usia" placeholder="Usia" value="<?php echo set_value('usia'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('usia'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('alamat'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('username'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
            <div class="headline text-red"> <?php echo form_error('password'); ?>
            </div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </form>
      </div>

      <a href="<?= base_url() . 'C_autentikasi/login/'; ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>