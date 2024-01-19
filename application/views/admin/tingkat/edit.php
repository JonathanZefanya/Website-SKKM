<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubah Tingkat
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/tingkat'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Data Tingkat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('admin/tingkat/update/' . $id_tingkat); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Jenis', 'jenis'); ?>
                        <?php echo form_error('jenis'); ?>
                        <?php
                        $extra = array(
                            'class' => 'form-control',
                            'required' => 'required'
                        );
                        echo form_dropdown('id_jenis_fk', $dd_jenis, set_value('id_jenis_fk', $id_jenis_fk), $extra);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Tingkat', 'tingkat'); ?>
                        <?php echo form_error('tingkat'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'id' => 'tingkat',
                            'class' => 'form-control',
                            'name' => 'tingkat',
                            'value' => set_value('tingkat', $tingkat),
                            'placeholder' => 'Tingkat',
                            'required' => 'required',
                            'autofocus' => 'autofocus'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <?php echo form_hidden('id_tingkat', set_value('id_tingkat', $id_tingkat)); ?>
                    <?php echo anchor(site_url('admin/tingkat'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</section><!-- /.content -->
