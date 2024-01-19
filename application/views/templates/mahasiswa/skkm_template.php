<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SKKM - Mahasiswa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/normalize.css'); ?>">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables/dataTables.bootstrap.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/skins/_all-skins.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        #image-preview {
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>

</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('mahasiswa/dasbor'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>KM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Mahasiswa</b> SKKM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $gravatar_url; ?>" class="user-image" alt="User Image">
                            <span
                                class="hidden-xs"><?php echo $current_user->nama_lengkap; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $gravatar_url; ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo $current_user->nama_lengkap; ?>
                                    <small>Terdaftar pada
                                        tahun <?php echo date('Y', $current_user->created_on); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo site_url('mahasiswa/user'); ?>"
                                       class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo site_url('logout'); ?>"
                                       class="btn btn-default btn-flat">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $gravatar_url; ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $current_user->nama_lengkap; ?></p>
                    <a href=""><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="<?php echo site_url('mahasiswa/dasbor'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dasbor</span>
                    </a>
                </li>
                <li class="treeview active">
                    <a href="<?php echo site_url('mahasiswa/daftar-skkm'); ?>">
                        <i class="fa fa-archive"></i> <span>SKKM</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $contents; ?>
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0.0
        </div>
        <strong>Copyright <a href="https://jojo.tirtagt.xyz">Kelompok NoirDev</a>.</strong> All rights
        reserved.
    </footer>

</div><!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('adminlte/plugins/jQuery/jquery.min.js'); ?>"></script>
<!-- jQuery Upload Preview -->
<script src="<?php echo base_url('adminlte/plugins/uploadPreview/jquery.uploadPreview.min.js'); ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url('adminlte/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('adminlte/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('adminlte/plugins/fastclick/fastclick.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('adminlte/dist/js/app.min.js'); ?>"></script>
<!-- Select2 Js -->
<script src="<?php echo base_url('adminlte/plugins/select2/select2.min.js'); ?>"></script>
<!-- page script-->
<script>
    $(document).ready(function() {
        $("#skkmtable").DataTable({
            "scrollX": true
        });
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });
    });

    function getTingkat(value) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('mahasiswa/skkm/get_tingkat');?>",
            data: "value=" + value,
            success: function (data) {
                $("#prestasi option:gt(0)").remove();
                $("#tingkat").html(data);
                $("#nilai").val("");
            },

            error: function (XMLHttpRequest) {
                alert(XMLHttpRequest.responseText);
            }
        });
    }
    ;

    function getPrestasi(value) {
        //console.log(value);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('mahasiswa/skkm/get_prestasi');?>",
            data: "value=" + value,
            success: function (data) {
                $("#prestasi").html(data);
                $("#nilai").val("");
            },

            error: function (XMLHttpRequest) {
                alert(XMLHttpRequest.responseText);
            }
        });
    }

    function getNilai(value) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('mahasiswa/skkm/get_nilai');?>",
            data: "value=" + value,
            success: function (data) {
                document.getElementById('nilai').value = data;
            },

            error: function (XMLHttpRequest) {
                alert(XMLHttpRequest.responseText);
            }
        });
    }
</script>
</body>
</html>
