<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pengumuman
        <small>kelola data pengumuman di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/pengumuman'); ?>"><i class="fa fa-newspaper-o"></i>Pengumuman</a></li>
        <li class="active">Data Pengumuman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data Pengumuman</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/pengumuman/create'); ?>" class="btn btn-primary">Tambah
                            Pengumuman</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <strong><?php echo $this->session->userdata('message'); ?></strong>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="pengumumantable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pengumuman</th>
                            <th>Tanggal</th>
                            <th>Pembuat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($pengumuman as $row): ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/pengumuman/edit/' . $row->id); ?>"><?php echo $row->judul; ?></a>
                                </td>
                                <td><?php echo $row->tanggal; ?></td>
                                <td><?php echo $row->nama_lengkap; ?></td>
                                <td><?php
                                    $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $row->judul . '?\')'
                                    );
                                    echo anchor(site_url('admin/pengumuman/delete/' . $row->id), 'Hapus', $hapus); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
