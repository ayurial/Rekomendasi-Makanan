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
                        <i class="fas fa-globe"></i> Riwayat Rekomendasi Makanan
                        <small class="float-right"></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong><?php echo $biodata->nama ?></strong><br>
                        <?php echo $biodata->jenis_kelamin ?><br>
                        <?php echo $biodata->usia ?><br>
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
                    <table class="table table-striped">
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