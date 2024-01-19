<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Prestasi
        <small>kelola data prestasi di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/prestasi'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Data Prestasi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data Prestasi</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/prestasi/create'); ?>" class="btn btn-primary">Tambah
                            Prestasi</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <strong><?php echo $this->session->userdata('message'); ?></strong>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="prestasitable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tingkat</th>
                            <th>Prestasi</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($prestasi as $row): ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $row->tingkat; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/prestasi/edit/' . $row->id_prestasi); ?>"><?php echo $row->prestasi; ?></a>
                                </td>
                                <td><?php echo $row->bobot; ?></td>
                                <td><?php
                                    $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $row->prestasi . '?\')'
                                    );
                                    echo anchor(site_url('admin/prestasi/delete/' . $row->id_prestasi), 'Hapus', $hapus); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
