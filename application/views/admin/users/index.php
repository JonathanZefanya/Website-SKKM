<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data User
        <small>kelola data user di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/users'); ?>"><i class="fa fa-users"></i>User</a></li>
        <li class="active">Data User</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data User</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/users/create'); ?>" class="btn btn-primary">Tambah User</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <strong style="margin-top: 4px;" id="message">
                            <strong><?php echo $this->session->userdata('message'); ?></strong>
                        </strong>
                    </div>
                </div>
                <div class="box-body">
                    <?php if (!empty($users)): ?>
                        <table id="userstable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Hak Akses</th>
                                <th>Jurusan</th>
                                <th>Prodi</th>
                                <th>Login Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $start = 0;
                            foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td>
                                        <?php if ($current_user->id != $user->id): ?>
                                            <a href="<?php echo site_url('admin/users/edit/' . $user->id); ?>"><?php echo $user->nama_lengkap; ?></a>
                                        <?php else: ?>
                                            <?php echo $user->nama_lengkap; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td>
                                        <?php if ($user->nama_jurusan == NULL): ?>
                                            <?php echo '-'; ?>
                                        <?php else: ?>
                                            <?php echo $user->nama_jurusan; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($user->nama_prodi == NULL): ?>
                                            <?php echo '-'; ?>
                                        <?php else: ?>
                                            <?php echo $user->nama_prodi; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo date('Y-m-d H:i:s', $user->last_login); ?></td>
                                    <td>
                                      <?php if ($user->active == 1): ?>
                                        <?php
                                        $deactive = array(
                                                  'class' => 'btn btn-sm btn-danger',
                                                  'onclick' => 'javascript: return confirm(\'Anda yakin menonaktifkan ' . $user->nama_lengkap. '?\')');
                                        echo anchor(site_url('admin/users/deactivate/' . $user->id), 'Non Aktifkan', $deactive);
                                        ?>
                                      <?php elseif($user->active == 0): ?>
                                        <?php
                                        $active = array(
                                                  'class' => 'btn btn-sm btn-success',
                                                  'onclick' => 'javascript: return confirm(\'Anda yakin mengaktifkan ' . $user->nama_lengkap. '?\')');
                                        echo anchor(site_url('admin/users/activate/' . $user->id), 'Aktifkan', $active);
                                        ?>
                                      <?php endif; ?>
                                        <?php if ($current_user->id != $user->id): ?>
                                            <?php
                                            $hapus = array(
                                                'class' => 'btn btn-sm btn-danger',
                                                'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $user->nama_lengkap. '?\')'
                                            );
                                            echo anchor(site_url('admin/users/delete/' . $user->id), 'Hapus', $hapus);
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
