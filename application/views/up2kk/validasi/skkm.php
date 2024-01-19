<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Validasi SKKM
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('up2kk/validasi'); ?>"><i class="fa fa-check-square-o"></i>Validasi SKKM</a>
        </li>
        <li class="active">Data SKKM</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('up2kk/validasi/update_skkm/' . $id); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Status', 'status'); ?>
                        <?php echo form_error('status'); ?>
                        <div class="radio">
                            <label for="">
                                <input type="radio" name="status"
                                       value="0" <?php if ($status == 0) echo "checked"; ?> /> Belum Divalidasi
                            </label>
                            <br>
                            <label for="">
                                <input type="radio" name="status"
                                       value="1" <?php if ($status == 1) echo "checked"; ?> /> Valid
                            </label>
                            <br>
                            <label for="">
                                <input type="radio" name="status"
                                       value="2" <?php if ($status == 2) echo "checked"; ?> /> Tidak Valid
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Keterangan', 'keterangan'); ?>
                        <?php echo form_error('keterangan'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'keterangan',
                            'value' => set_value('keterangan', $keterangan),
                            'id' => 'keterangan',
                            'class' => 'form-control',
                            'required' => 'required');
                        echo form_textarea($data);
                        ?>
                    </div>
                    <?php echo form_hidden('id', set_value('id', $id)); ?>
                    <?php echo form_hidden('id_user', set_value('id_user', $id_user)); ?>
                    <?php echo anchor(site_url('up2kk/validasi/list_skkm/' . $id_user), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Validasi', 'class="btn btn-success"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->
