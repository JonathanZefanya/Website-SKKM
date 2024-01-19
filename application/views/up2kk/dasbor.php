<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Statistik PKA</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/dasbor');?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
    <li class="active">Statistik PKA</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>
            <?php echo $count_mahasiswa; ?>
          </h3>
          <p class="text-uppercase">mahasiswa</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?php echo site_url('up2kk/daftar-mahasiswa'); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>
            <?php echo $count_valid; ?>
          </h3>
          <p class="text-uppercase">skkm valid</p>
        </div>
        <div class="icon">
          <i class="fa fa-check-square-o"></i>
        </div>
        <a href="<?php echo site_url('up2kk/daftar-skkm-valid'); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3>
          <?php echo $count_tidak_valid; ?>
          </h3>
          <p class="text-uppercase">skkm tidak valid</p>
        </div>
        <div class="icon">
          <i class="fa fa-times-circle-o"></i>
        </div>
        <a href="<?php echo base_url('up2kk/daftar-skkm-tidak-valid'); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>
            <?php echo $count_belum_divalidasi; ?>
          </h3>
          <p class="text-uppercase">skkm belum divalidasi</p>
        </div>
        <div class="icon">
          <i class="fa fa-question-circle"></i>
        </div>
        <a href="<?php echo base_url('up2kk/daftar-skkm-belum-valid'); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</section><!-- /.content -->
