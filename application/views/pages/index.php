<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JASEA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url('javaicon.png')?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-red.css')?>">

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
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper b">

 <header class="main-header navbar-fixed-top">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Selamat Datang</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top ">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
       
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <li class=" dropdown user user-menu">
            <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown">
               <span class="hidden-xs"><?=$this->session->userdata('firstname')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
          
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?=site_url('C_admin/logout')?>" class="btn btn-default btn-flat">Log out</a>
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
      <div class="info">
          
          
        </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <img src="<?php echo base_url('assets/dist/img/java.png')?>" class="image-responsive" alt="">
        
      
        
        <li>
          <a href="<?php echo site_url('C_index/about')?>">
          <i class="fa fa-user"></i> <span>Tentang</span>
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo site_url('Admin/index')?>">
          <i class="fa fa-user"></i> <span>Admin</span>
          </a>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper skin-red" style="padding-top: 50px;">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary skin-red">
        <div class="box-header with-border skin-red">
          <h3 class="box-title">Pencarian</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
<div class="container">
<button type="button" class="btn btn-primary btn-info center-block active-btn" data-toggle="collapse" data-target="#demo"> Search</button>
<div id="demo" class="collapse">
        <form id="form_search" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="input-group margin">
            <input name="kata_kunci" type="text" class="form-control" id="kata_kunci" required="required" >
                <span class="input-group-btn">
                  <button type="button" id="btn-search" class="btn btn-info btn-flat btn-custom"><i class="fa fa-search skin-red" ></i></button>
                </span>
          </div>
        </div>
</div>
        </div>

        </form>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>

      <div  
      id="search_result">
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
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()

    $("#kata_kunci").keyup(function(){
    $.ajax({
          type: "POST",
          url : "<?php echo site_url('C_index/cari_data_by_kata_fix');?>",
          data: $('#form_search').serialize(),
          success: function(data){
              $('#search_result').html(data);
          },
      });
    });


  })


  function button_search() {
        $.ajax({
              type: "POST",
              url : "<?php echo site_url('C_index/cari_data_by_kata_fix');?>",
              data: $('#form_search').serialize(),
              success: function(data){
                $('#search_result').html(data);
              }
          });
  }

</script>
</body>
</html>
