<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SKKM - Admin</title>
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('admin/dasbor'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>KM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>SKKM</span>
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
                                    <a href="<?php echo site_url('admin/user'); ?>" class="btn btn-default btn-flat">Profil</a>
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
                    <a href="<?php echo site_url('admin/dasbor'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dasbor</span>
                    </a>
                </li>
                <li class="treeview active">
                    <a href="<?php echo site_url('admin/users'); ?>">
                        <i class="fa fa-users"></i> <span>Users</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-balance-scale"></i> <span>Bobot SKKM</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('admin/jenis'); ?>"><i class="fa fa-circle-o"></i> Data
                                Jenis</a></li>
                        <li><a href="<?php echo site_url('admin/tingkat'); ?>"><i class="fa fa-circle-o"></i> Data
                                Tingkat</a></li>
                        <li><a href="<?php echo site_url('admin/prestasi'); ?>"><i class="fa fa-circle-o"></i> Data
                                Prestasi</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="<?php echo site_url('admin/pengumuman'); ?>">
                        <i class="fa fa-newspaper-o"></i> <span>Pengumuman</span>
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
        <strong>Copyright <a href="https://xead.my.id">Kelompok NoirDev</a>.</strong> All rights
        reserved.
    </footer>

</div><!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('adminlte/plugins/jQuery/jquery.min.js'); ?>"></script>
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
<!-- page script-->
<script>
    $(document).ready(function () {
        $("#userstable").DataTable();
        var groups = document.querySelector('input[name = "groups[]"]:checked').value;

        // group admin UP2KK
        if (groups == 1) {
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;
            document.getElementById('nip').required = true;
        }
        // group anggota UP2KK
        else if (groups == 2) {
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;
            document.getElementById('nip').required = true;
        }
        // group mahasiswa
        else if (groups == 3) {
            document.getElementById('nip').disabled = true;
            document.getElementById('nim').disabled = false;
            document.getElementById('nim').required = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = false;
            document.getElementById('prodi').required = true;
            document.getElementById('kelas').disabled = false;
            document.getElementById('kelas').required = true;
            document.getElementById('semester').disabled = false;
            document.getElementById('semester').required = true;
        }
    });

    /* Ajax Dropdown Jurusan Prodi */
    function getProdi(value) {
        console.log(value);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/users/get_prodi');?>",
            data: "row=" + value,
            success: function (data) {
                $("#prodi").html(data);
                console.log(data);
            },

            error: function (XMLHttpRequest) {
                alert(XMLHttpRequest.responseText);
            }
        });
    }
    ;

    /* Radio button selected in form*/
    function form_add_check() {
        var usersForm = document.forms.usersForm;
        var groups = usersForm.elements['groups[]'];

        // group = admin UP2KK
        if (groups.value == 1) {
            document.getElementById('nip').disabled = false;
            document.getElementById('nip').required = true;
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;

            $("#nim").val("");
        }
        // group = anggota UP2KK
        else if (groups.value == 2) {
            document.getElementById('nip').disabled = false;
            document.getElementById('nip').required = true;
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;

            $("#nim").val("");
        }
        // group = mahasiswa
        else if (groups.value == 3) {
            document.getElementById('nip').disabled = true;
            document.getElementById('nim').disabled = false;
            document.getElementById('nim').required = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = false;
            document.getElementById('prodi').required = true;
            document.getElementById('kelas').disabled = false;
            document.getElementById('kelas').required = true;
            document.getElementById('semester').disabled = false;
            document.getElementById('semester').required = true;

            $("#nip").val("");
        }
    }
    ;

    /* Radio button selected in form*/
    function form_edit_check() {
        var usersForm = document.forms.usersForm;
        var groups = usersForm.elements['groups[]'];

        // bernilai 1 = admin
        if (groups.value == 1) {
            document.getElementById('nip').disabled = false;
            document.getElementById('nip').required = true;
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;

            $("#nim").val("");
        }
        // bernilai 2 = up2kk
        else if (groups.value == 2) {
            document.getElementById('nip').disabled = false;
            document.getElementById('nip').required = true;
            document.getElementById('nim').disabled = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = true;
            document.getElementById('kelas').disabled = true;
            document.getElementById('semester').disabled = true;

            $("#nim").val("");
        }
        // bernilai 3 = mahasiswa
        else if (groups.value == 3) {
            document.getElementById('nip').disabled = true;
            document.getElementById('nim').disabled = false;
            document.getElementById('nim').required = true;
            document.getElementById('jurusan').disabled = false;
            document.getElementById('jurusan').required = true;
            document.getElementById('prodi').disabled = false;
            document.getElementById('prodi').required = true;
            document.getElementById('kelas').disabled = false;
            document.getElementById('kelas').required = true;
            document.getElementById('semester').disabled = false;
            document.getElementById('semester').required = true;

            $("#nip").val("");
        }
    }
    ;

</script>
</body>
</html>
