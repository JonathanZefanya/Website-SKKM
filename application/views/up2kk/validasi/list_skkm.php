<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Validasi SKKM
        <small>validasi data skkm di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('up2kk/validasi'); ?>"><i class="fa fa-check-square-o"></i> Validasi SKKM</a>
        </li>
        <li class="active">Data SKKM</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Validasi SKKM</h3>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 text-center">
                        <strong style="margin-top: 4px;" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </strong>
                    </div>
                </div>
                <div class="box-body">
                    <table id="mahasiswatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>File</th>
                            <th>Jenis</th>
                            <th>Tingkat</th>
                            <th>Prestasi</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($list_skkm as $row): ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $row->nama_kegiatan; ?></td>
                                <td><img src="<?php echo base_url('fileskkm/'.$row->filefoto); ?>" alt="<?php echo $row->nama_kegiatan; ?>" width="100" height="100"/></td>
                                <td><?php echo $row->jenis; ?></td>
                                <td><?php echo $row->tingkat; ?></td>
                                <td><?php echo $row->prestasi; ?></td>
                                <td><?php echo $row->nilai; ?></td>
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
                                    <?php echo $row->keterangan; ?>
                                </td>
                                <td>
                                    <?php
                                    $extra = array('class' => 'btn btn-sm btn-success');
                                    echo anchor(site_url('up2kk/validasi/skkm/' . $row->id), 'Validasi', $extra);
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p>
                        <strong>
                            Total poin belum divalidasi:
                            <?php
                            $num = 0;
                            $str = "poin";
                            if ($sum_belum_divalidasi == NULL): ?>
                                <?php echo $num . ' ' . $str; ?>
                            <?php else: ?>
                                <?php echo $sum_belum_divalidasi . ' ' . $str; ?>
                            <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <strong>
                            Total poin tidak valid:
                            <?php
                            $num = 0;
                            $str = "poin";
                            if ($sum_tidak_valid == NULL): ?>
                                <?php echo $num . ' ' . $str; ?>
                            <?php else: ?>
                                <?php echo $sum_tidak_valid . ' ' . $str; ?>
                            <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <strong>
                            Total poin valid:
                            <?php
                            $num = 0;
                            $str = "poin";
                            if ($sum_valid == NULL): ?>
                                <?php echo $num . ' ' . $str; ?>
                            <?php else: ?>
                                <?php echo $sum_valid . ' ' . $str; ?>
                            <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <strong>
                            Status Kelulusan SKKM:
                            <?php if ($sum_valid >= $status_skkm): ?>
                                <strong style="color:#00a65a;"><?php echo "LULUS"; ?></strong>
                            <?php else: ?>
                                <strong style="color:#dd4b39;"><?php echo "TIDAK LULUS"; ?></strong>
                            <?php endif; ?>
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
