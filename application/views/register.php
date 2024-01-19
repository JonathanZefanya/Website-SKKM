<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url('login'); ?>"><b>SK</b>KM</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Register untuk mahasiswa</p>
        <?php echo form_open('register/create_mahasiswa'); ?>
        <div class="form-group has-feedback">
            <?php echo form_error('nama_lengkap'); ?>
            <?php
            $data = array(
                    'type' => 'text',
                    'name' => 'nama_lengkap',
                    'class' => 'form-control',
                    'placeholder' => 'Nama Lengkap',
                    'required' => 'required',
                    'autofocus' => 'autofocus');
            echo form_input($data); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('email'); ?>
            <?php
            $data = array(
                    'type' => 'email',
                    'name' => 'email',
                    'class' => 'form-control',
                    'placeholder' => 'Email',
                    'required' => 'required');
            echo form_input($data); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('nim'); ?>
            <?php
            $data = array(
                    'type' => 'text',
                    'name' => 'nim',
                    'class' => 'form-control',
                    'placeholder' => 'NIM',
                    'required' => 'required',
                    'maxlength' => 10);
            echo form_input($data); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('id_jurusan'); ?>
            <select class="form-control" name="id_jurusan" id="jurusan" onchange="getProdi(this.value)" required>
                <option value="">Pilih Jurusan</option>
                <?php foreach ($dd_jurusan as $row): ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_jurusan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('id_prodi'); ?>
            <select name="id_prodi" id="prodi" class="form-control" required>
                <option value="">Pilih Prodi</option>
            </select>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('id_semester'); ?>
            <?php
            $extra = array(
                'class' => 'form-control',
                'id' => 'semester',
                'required' => 'required');
            echo form_dropdown('id_semester', $dd_semester, $semester_selected, $extra);
            ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_error('id_kelas'); ?>
            <?php
            $extra = array(
                'class' => 'form-control',
                'id' => 'kelas',
                'required' => 'required');
            echo form_dropdown('id_kelas', $dd_kelas, $kelas_selected, $extra);
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo form_submit('submit', 'Register', 'class="btn btn-primary btn-block btn-flat"') ?>
            </div><!-- /.col -->
        </div>
        <?php echo form_close(); ?>
        <br>
        <a href="<?php echo site_url('login'); ?>">Log in?</a>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
