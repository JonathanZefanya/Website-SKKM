<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url('login'); ?>"><b>SK</b>KM</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan log in</p>
        <?php echo $this->session->flashdata('message'); ?>
        <?php echo form_open(); ?>
        <div class="form-group has-feedback">
            <?php
            $data = array(
                'type' => 'email',
                'name' => 'identity',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => 'required',
                'autofocus' => 'autofocus'
            );
            echo form_input($data); ?>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php
            $data = array(
                'type' => 'password',
                'name' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required'
            );
            echo form_input($data); ?>
            <span class="fa fa-unlock-alt form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-block btn-flat"') ?>
                <a href="<?php echo site_url('register'); ?>" class="btn btn-primary btn-block btn-flat">Register</a>
            </div><!-- /.col -->
        </div>
        <?php echo form_close(); ?>
        <br>
        <div style="display: flex;">
            <a href="<?php echo site_url('forgotpassword'); ?>">Lupa Password?</a>
            <a href="<?php echo site_url('beranda'); ?>" style="text-align:right; flex-grow:1;">Beranda</a>
        </div>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
