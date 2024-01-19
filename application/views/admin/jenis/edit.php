<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubah Jenis
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/jenis'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Data Jenis</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('admin/jenis/update/' . $id_jenis); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Jenis', 'jenis'); ?>
                        <?php echo form_error('jenis'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'id' => 'judul',
                            'name' => 'jenis',
                            'value' => set_value('jenis', $jenis),
                            'class' => 'form-control',
                            'placeholder' => 'Jenis',
                            'required' => 'required',
                            'autofocus' => 'autofocus'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <?php echo form_hidden('id_jenis', set_value('id_jenis', $id_jenis)) ?>
                    <?php echo anchor(site_url('admin/jenis'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->
