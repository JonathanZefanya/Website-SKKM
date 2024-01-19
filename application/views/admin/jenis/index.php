<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Jenis
        <small>kelola data jenis di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/jenis'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Data Jenis</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data Jenis</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/jenis/create'); ?>" class="btn btn-primary">Tambah Jenis</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <strong><?php echo $this->session->userdata('message'); ?></strong>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="jenistable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($jenis as $row): ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/jenis/edit/' . $row->id_jenis); ?>"><?php echo $row->jenis; ?></a>
                                </td>
                                <td><?php
                                    $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $row->jenis . '?\')'
                                    );
                                    echo anchor(site_url('admin/jenis/delete/' . $row->id_jenis), 'Hapus', $hapus); ?></td>
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
