<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JASEA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url('favicon.ico')?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/b-style.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper b">

  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top navbar-fixed-top">
      <!-- Sidebar toggle button-->
      <!-- <a href="<?php echo site_url('C_index/index')?>" class="btn-back">
        <i class="fa fa-arrow-left"></i>
      </a> -->
      <h4 class="logo-xs">
        <b>Aplikasi JASEA</b>
      </h4>

    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="info">
          <h4>JASEA</h4>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?=site_url('C_index')?>">
          <i class="fa fa-search"></i> <span>Cari Kata</span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('C_index/listkamus?')?>">
          <i class="fa fa-book"></i> <span>Daftar Materi</span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('C_index/information?')?>">
          <i class="fa fa-question-circle"></i> <span>Petunjuk</span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('C_index/about?')?>">
          <i class="fa fa-user"></i> <span>Tentang</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-top: 50px;">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kata yang dicari</h3>
        </div>
        <div class="box-body">
          <div class="information">
            <p>Makna</p>
          </div>
          <div class="information">
            <p>Syntax</p>
          </div>
          <div class="information">
            <p>Syarat Penggunaan </p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kata yang dicari</h3
        </div>
        <div class="box-body">
          <div class="information">
            <p>Makna</p>
          </div>
          <div class="information">
            <p>Syntax</p>
          </div>
          <div class="information">
            <p>Syarat Penggunaan </p>
          </div>
        </div>
      </div>

      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">JASEA</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<!-- <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script> -->
</body>
</html>
