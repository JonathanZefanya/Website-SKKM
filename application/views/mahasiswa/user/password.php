<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Ubah Password</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mahasiswa/user'); ?>"><i class="fa fa-user"></i>Profil</a></li>
        <li class="active">Ubah Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('mahasiswa/user/update_password'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Password Baru', 'password_baru'); ?>
                        <?php echo form_error('password_baru'); ?>
                        <?php
                        $data = array(
                            'type' => 'password',
                            'name' => 'password_baru',
                            'id' => 'password_baru',
                            'class' => 'form-control',
                            'placeholder' => 'Password Baru',
                            'required' => 'required',
                            'autofocus' => 'autofocus',
                            'maxlength' => 20);
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Konfirmasi Password', 'konfirmasi_password'); ?>
                        <?php echo form_error('konfirmasi_password'); ?>
                        <?php
                        $data = array(
                            'type' => 'password',
                            'name' => 'konfirmasi_password',
                            'id' => 'konfirmasi_password',
                            'class' => 'form-control',
                            'placeholder' => 'Konfirmasi Password',
                            'required' => 'required',
                            'maxlength' => 20);
                        echo form_input($data);
                        ?>
                    </div>
                    <?php echo form_hidden('user_id', $current_user->id); ?>
                    <?php echo anchor(site_url('mahasiswa/user'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Ubah Password', 'class="btn btn-warning"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->
