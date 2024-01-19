<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Statistik Admin</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dasbor'); ?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
        <li class="active">Statistik Admin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $count_pengumuman; ?></h3>
                    <p class="text-uppercase">pengumuman</p>
                </div>
                <div class="icon">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="<?php echo site_url('admin/pengumuman'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $count_user; ?></h3>
                    <p class="text-uppercase">user</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo site_url('admin/users'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $count_jenis; ?></h3>
                    <p class="text-uppercase">jenis</p>
                </div>
                <div class="icon">
                    <i class="fa fa-files-o"></i>
                </div>
                <a href="<?php echo site_url('admin/jenis'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $count_tingkat; ?></h3>
                    <p class="text-uppercase">tingkat</p>
                </div>
                <div class="icon">
                    <i class="fa fa-files-o"></i>
                </div>
                <a href="<?php echo site_url('admin/tingkat'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $count_prestasi; ?></h3>
                    <p class="text-uppercase">prestasi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-files-o"></i>
                </div>
                <a href="<?php echo site_url('admin/prestasi'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
