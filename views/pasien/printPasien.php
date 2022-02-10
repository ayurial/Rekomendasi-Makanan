<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Riwayat Rekomendasi Makanan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> Daftar Pasien Aplikasi Rekomendasi Makanan
                        <small class="float-right"></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                    </address>
                </div>
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                </div> -->
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="nomor">Nomor</th>
                                <th scope="col" class="sort" data-sort="nama">Nama</th>
                                <th scope="col" class="sort" data-sort="jenis_kelamin">Jenis Kelamin</th>
                                <th scope="col" class="sort" data-sort="usia">Usia</th>
                                <th scope="col" class="sort" data-sort="alamat">Alamat</th>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>