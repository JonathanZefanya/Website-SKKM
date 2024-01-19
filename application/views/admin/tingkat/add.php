<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tambah Tingkat
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
                <?php echo form_open('admin/tingkat/store'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Jenis', 'jenis'); ?>
                        <?php echo form_error('jenis'); ?>
                        <?php
                        $extra = array(
                            'class' => 'form-control',
                            'required' => 'required',
                            'autofocus' => 'autofocus'
                        );
                        echo form_dropdown('id_jenis_fk', $dd_jenis, $jenis_selected, $extra);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Tingkat', 'tingkat'); ?>
                        <?php echo form_error('tingkat'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'id' => 'tingkat',
                            'name' => 'tingkat',
                            'value' => set_value('tingkat'),
                            'class' => 'form-control',
                            'placeholder' => 'Tingkat',
                            'required' => 'required'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <?php echo anchor(site_url('admin/tingkat'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</section><!-- /.content -->
