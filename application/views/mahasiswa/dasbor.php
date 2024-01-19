<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Statistik Mahasiswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mahasiswa/dasbor'); ?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
        <li class="active">Statistik Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                        $number = 0;
                        $str = "poin";
                        if ($skkm_valid == NULL): ?>
                            <?php echo $number . ' ' . $str; ?>
                        <?php else: ?>
                            <?php echo $skkm_valid . ' ' . $str; ?>
                        <?php endif; ?>
                    </h3>
                    <p class="text-uppercase">skkm valid</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square-o"></i>
                </div>
                <a href="<?php echo site_url('mahasiswa/daftar-skkm-valid'); ?>" class="small-box-footer">More Info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <?php
                        $number = 0;
                        $str = "poin";
                        if ($skkm_tidak_valid == NULL): ?>
                            <?php echo $number . ' ' . $str; ?>
                        <?php else: ?>
                            <?php echo $skkm_tidak_valid . ' ' . $str; ?>
                        <?php endif; ?>
                    </h3>
                    <p class="text-uppercase">skkm tidak valid</p>
                </div>
                <div class="icon">
                    <i class="fa fa-times-circle-o"></i>
                </div>
                <a href="<?php echo site_url('mahasiswa/daftar-skkm-tidak-valid'); ?>" class="small-box-footer">More
                    Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <?php
                        $number = 0;
                        $str = "poin";
                        if ($skkm_belum_divalidasi == NULL): ?>
                            <?php echo $number . ' ' . $str; ?>
                        <?php else: ?>
                            <?php echo $skkm_belum_divalidasi . ' ' . $str; ?>
                        <?php endif; ?>
                    </h3>
                    <p class="text-uppercase">skkm belum divalidasi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-question-circle"></i>
                </div>
                <a href="<?php echo site_url('mahasiswa/daftar-skkm-belum-valid'); ?>" class="small-box-footer">More
                    Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section><!-- /.content -->
