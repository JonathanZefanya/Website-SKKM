<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SKKM - LAPORAN SKKM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/AdminLTE.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> PKA INSTITUT TEKNOLOGI INDONESIA
                    <small class="pull-right">Date: <?php echo date('d/m/Y'); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong><?php echo $profil->nama_lengkap; ?></strong><br>
                    Jurusan: <?php echo $profil->nama_jurusan; ?><br>
                    Prodi: <?php echo $profil->nama_prodi; ?><br>
                    NIM: <?php echo $profil->nim; ?><br>
                    Kelas: <?php echo $profil->semester . ' ' . $profil->kelas; ?><br>
                </address>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis</th>
                        <th>Tingkat</th>
                        <th>Prestasi</th>
                        <th>Status</th>
                        <th>Nilai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($skkm as $row): ?>
                        <tr>
                            <td>
                                <?php echo ++$no; ?>
                            </td>
                            <td>
                                <?php echo $row->nama_kegiatan; ?>
                            </td>
                            <td>
                                <?php echo $row->jenis; ?>
                            </td>
                            <td>
                                <?php echo $row->tingkat; ?>
                            </td>
                            <td>
                                <?php echo $row->prestasi; ?>
                            </td>
                            <td>
                                <?php if ($row->status == 0): ?>
                                    <span class="label label-warning"><?php echo "Belum Divalidasi"; ?></span>
                                <?php elseif ($row->status == 2): ?>
                                    <span class="label label-danger"><?php echo "Tidak Valid"; ?></span>
                                <?php elseif ($row->status == 1): ?>
                                    <span class="label label-success"><?php echo "Valid"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $row->nilai; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Rekapitulasi Poin SKKM</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Total Poin SKKM valid:</th>
                            <td>
                                <?php if ($sum_valid == 0): ?>
                                    <?php echo "0"; ?>
                                <?php else: ?>
                                    <?php echo $sum_valid; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Poin SKKM tidak valid:</th>
                            <td>
                                <?php if ($sum_tidak_valid == 0): ?>
                                    <?php echo "0"; ?>
                                <?php else: ?>
                                    <?php echo $sum_tidak_valid; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Poin SKKM belum divalidasi:</th>
                            <td><?php echo $sum_belum_divalidasi; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
