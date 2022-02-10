<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<h1></h1>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a><b>Aplikasi Rekomendasi Makanan</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <!-- <div class= "col-md-9 register-right"> -->
        <ul class="nav nav-tabs nav-justified mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="tab" href="#pills-home" role="tablist" aria-controls="pills-home" aria-selected="true">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="tab" href="#pills-profile" role="tablist" aria-controls="pills-profile" aria-selected="false">Admin</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
          </li> -->
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?php echo base_url() . 'C_autentikasi/loginAsUser'; ?>" method="post">
              <?= $this->session->flashdata('pesan_error'); ?>

              <div class="input-group mb-3">
                <input type="hidden" name="id_pasien" class="form-control">
                <!-- <label class="form-control-label" for="input-username">Username</label> <br> -->
                <input type="text" name="username" class="form-control" id="input-username" placeholder="username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <!-- <label class="form-control-label" for="input-pass">Password</label> <br> -->
                <input type="password" name="password" class="form-control" id="input-pass" placeholder="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                  </div>
                </div>

                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
              </div>
            </form>


            <!-- <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p> -->
            <p class="mb-0">
              <a href="<?= base_url() . 'C_autentikasi/register/'; ?>" class="text-center">Register a new membership</a>
            </p>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?php echo base_url() . 'C_autentikasi/loginAsAdmin'; ?>" method="post">
              <?= $this->session->flashdata('pesan_error'); ?>

              <div class="input-group mb-3">
                <input type="hidden" name="id_pasien" class="form-control">
                <!-- <label class="form-control-label" for="input-uname">Username</label> -->
                <input type="text" name="username" class="form-control" id="input-uname" placeholder="username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <!-- <label class="form-control-label" for="input-password">Password</label> -->
                <input type="password" name="password" class="form-control" id="input-password" placeholder="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


          </div>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>