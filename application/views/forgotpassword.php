<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url('login'); ?>"><b>SK</b>KM</a>
    </div><!-- /.forgotpassword-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Masukan email anda</p>
        <?php echo $this->session->flashdata('message'); ?>
        <?php echo form_open(); ?>
        <div class="form-group has-feedback">
            <label for="identity"><?php echo(($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label>
            <br/>
            <?php
            $data = array(
                'type' => 'email',
                'name' => 'identity',
                'id' => 'identity',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => 'required',
                'autofocus' => 'autofocus'
            );
            echo form_input($data); ?>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo form_submit('submit', 'Kirim', 'class="btn btn-primary btn-block btn-flat"') ?>
				<a href="<?php echo site_url('/login'); ?>" style="text-align: left !important; padding-left: 0px; width: min-content !important;" class="btn btn-block btn-flat">Kembali</a>
            </div><!-- /.col -->
        </div>
        <?php echo form_close(); ?>
    </div><!-- /.forgotpassword-box-body -->
</div><!-- /.forgotpassword-box -->
