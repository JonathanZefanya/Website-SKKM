<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data SKKM
        <small>kelola data SKKM di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mahasiswa/daftar-skkm'); ?>"><i class="fa fa-archive"></i>SKKM</a></li>
        <li class="active">Data SKKM</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data SKKM</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('mahasiswa/skkm/create'); ?>" class="btn btn-primary">Tambah
                            SKKM</a>
                        <a href="<?php echo site_url('mahasiswa/skkm/cetak-laporan'); ?>" class="btn btn-primary">Cetak
                            Laporan</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <strong style="margin-top: 4px;" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </strong>
                    </div>
                </div>
                <div class="box-body">
                    <table id="skkmtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
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
                                <td>
                                    <?php if ($row->status == 0 OR $row->status == 2): ?>
                                        <a href="<?php echo site_url('mahasiswa/skkm/edit/' . $row->id); ?>"><?php echo $row->nama_kegiatan; ?></a>
                                    <?php else: ?>
                                        <?php echo $row->nama_kegiatan; ?>
                                    <?php endif; ?>
                                </td>
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
                                    <?php if ($row->status == 0 OR $row->status == 2): ?>
                                        <?php
                                        $hapus = array(
                                            'class' => 'btn btn-sm btn-danger',
                                            'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $row->nama_kegiatan . '?\')'
                                        );
                                        echo anchor(site_url('mahasiswa/skkm/delete/' . $row->id), 'Hapus', $hapus);
                                        ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
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
                            Total Poin tidak valid:
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
                            Total Poin valid:
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
                        <strong>Status Kelulusan SKKM:
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
