<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tambah SKKM
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mahasiswa/skkm'); ?>"><i class="fa fa-archive"></i>SKKM</a></li>
        <li class="active">Data SKKM</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open_multipart('mahasiswa/skkm/store'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Nama Kegiatan', 'nama_kegiatan'); ?>
                        <?php echo form_error('nama_kegiatan'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'id' => 'nama_kegiatan',
                            'name' => 'nama_kegiatan',
                            'value' => set_value('nama_kegiatan'),
                            'class' => 'form-control',
                            'placeholder' => 'Nama Kegiatan',
                            'required' => 'required',
                            'autofocus' => 'autofocus');
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="filefoto">Bukti Kegiatan</label> <span class="label label-success">Ukuran maksimal 5MB. Format file: jpeg, jpg, dan png.</span>
                        <?php echo form_error('filefoto'); ?>
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="filefoto" id="image-upload" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Jenis Kegiatan', 'id_jenis'); ?>
                        <?php echo form_error('id_jenis'); ?>
                        <select class="form-control" name="id_jenis" id="jenis" onchange="getTingkat(this.value)"
                                required="">
                            <option value="">Silahkan Pilih</option>
                            <?php foreach ($dd_jenis as $row): ?>
                                <option value="<?php echo $row->id_jenis ?>"><?php echo $row->jenis; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
                        <?php echo form_error('id_tingkat'); ?>
                        <select name="id_tingkat" id="tingkat" class="form-control" onchange="getPrestasi(this.value)"
                                required="">
                            <option value="">Silahkan Pilih</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Prestasi', 'id_prestasi'); ?>
                        <?php echo form_error('id_prestasi'); ?>
                        <select name="id_prestasi" id="prestasi" class="form-control" onchange="getNilai(this.value)"
                                required="">
                            <option value="">Silahkan Pilih</option>
                        </select>
                    </div>
                    <?php echo form_hidden('id_user', set_value('id_user', $current_user->id)); ?>
                    <?php echo anchor(site_url('mahasiswa/skkm'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->
