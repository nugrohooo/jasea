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
<style type="text/css">
body {  line-height: 1em; }
#rounded-corner {
	font-family: Verdana, Arial, Sans-Serif;
	font-size: 12px;
	margin: 15px;
	width: 100%;
	text-align: left;
	border-collapse: collapse;
}
#rounded-corner thead th.rounded-company {
	background: #b9c9fe url("") left -1px no-repeat;
}
#rounded-corner thead th.rounded-q2 {
	background: #b9c9fe url("") right -1px no-repeat;
}
#rounded-corner th {
	padding: 8px;
	font-weight: normal;
	font-size: 13px;
	color: #039;
	background: #b9c9fe;
}
#rounded-corner td {
	padding: 8px;
	background: #e8edff;
	border-top: 1px solid #fff;
	color: #669;
}
#rounded-corner tfoot td.rounded-foot-left {
	background: #e8edff url("botleft.png") left bottom no-repeat;
}
#rounded-corner tfoot td.rounded-foot-right {
	background: #e8edff url("botright.png") right bottom no-repeat;
}
#rounded-corner tbody tr:hover td {
	background: #d0dafd;
}
</style>
<body class="hold-transition skin-red sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper b">

  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top navbar-fixed-top">
     <!-- Sidebar toggle button-->
      <a href="<?php echo site_url('C_index/index')?>" class="btn-back">
        <i class="glyphicon glyphicon-search" style="font-size: 30px;padding-left: 5px;"></i>
      </a>
      <h4 class="logo-xs">
        <b>Detail</b>
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
          <img src="<?php echo base_url('assets/dist/img/java.png')?>" class="image-responsive" alt="">
          
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
          <a href="<?=site_url('C_index/about')?>">
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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <b> <?=$list->kata_kunci;?></b></h3>
        </div>
        <div class="box-body list-key">
          <ul class="result">
              <span>Pengertian</span>
              <li class='information'>
                <!-- <span><?=$new_desc;?></span> -->
                <span><?=$list->arti;?></span>
              </li>

			  			<?php if (!empty($list->gambar)) {?>
              <span>Gambar</span>
              <li class='information'>
                <img src="<?php echo base_url('assets/images/'.$list->gambar)?>" class="img-responsive">
              </li>
              <?php
              }
              ?>

              <?php if (!empty($list->syntax)) {?>
              <span>Syntax</span>
              <li class='information'>
                <span><?=$list->syntax;?></span>
              </li>
              <?php
              }
              ?>

              <?php if (!empty($list->required)) {?>
              <span>Penjelasan Syntax</span>
              <li class='information'>
                <span><?=$list->required;?></span>
              </li>
              <?php
              }
              ?>


              
               <?php
               if (sizeof($similiar)==0) {
                  echo " ";
                } else {?>
                  <li class='information'>
                    <?php
                  echo "Similiar Key : <br>";
                  foreach ($similiar as $key => $value) {
                    ?>
                    <a style="color: blue" href="<?=site_url('C_index/detail_kamus/'.$value->id)?>" class='btn btn-block'>
                    <span><b><?=$value->kata_kunci?></b></span> </a>
                  <?php }
                ?>
                </li>
                <?php
                }?>
<br>
        <div class="container dropdown ">
          <h2>Komentar</h2>
          <table id="rounded-corner">
          <ul class="list-group "> 
            <thead>
 <tr>
  <th scope="col" class="rounded-company">Komentar</th>
  <th scope="col" class="rounded-q1">Nama</th>
  <th scope="col" class="rounded-q2">Tanggal</th>
  
 </tr>
</thead>

        <?php 

        foreach ($list_komentar as $key ) {
          ?>
          <tr>
          <td>
          <li class=" list-group-item "><?php echo $key['komentar'] ?> </li>
          </td>
          <td>
          <li class="list-group-item-dark disabled"><?php echo $key['firstname'] ?> </li>
          </td>
          <td>
          <li class="list-group-item-light disabled"><?php echo $key['tanggal_komentar'] ?> </li>
          </td>
          </tr>
          <?php
        }
         ?>
         </ul>  
       </div>
        </table>
        <br>
          <form action="<?php echo site_url()?>/C_admin/simpan_komentar/<?php echo $id_materi; ?>" method="post" >
              <textarea name="komentar" id="komentar" class="form-control"></textarea>
              
              <button type="submit"  class="btn btn-primary"> Komentar</button>  
          </form>
        </div>  
        </ul>
        
        
      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">JASEA</a>.</strong> All rights
    reserved.
  </footer>



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