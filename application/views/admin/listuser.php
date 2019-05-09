            <?php $this->load->view('template/head');?>
          <!-- TOP SECONDARY NAVIGATION -->
            <?php $this->load->view('template/sidebar');?>
         <!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <div class="content-wrapper" style="">
  <!-- Main content -->
    <section class="content">


<!--  -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
           
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="box-header">
              <h3 class="box-title">List Users</h3>
            </div>
            <div class="box-body">
<div class="table-responsive">

 <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
            <td width="5%" >No</td>
            <td width="10%">Username</td>
            <td width="25%">Name</td>
            <td width="25%">Email</td>
            <td width="15%">Role</td>
            <td width="20%">Action</td>
            </tr>
            </thead>
            <tbody>
              <?php
              $i=1; foreach ($list as $key ) { ?>
                <tr>
                <td><?=$i?></td>
                <td><?=$key->username?></td>
                <td><?=$key->firstname.' '.$key->lastname?></td>
                <td><?=$key->email?></td>
                <td><?php if ($key->level==1) {echo "admin";} else {echo "user";} ?> </td>
                <td class="text-center">
                  <a href="<?php echo site_url('C_admin/detail_user/').$key->id ;?>" class="btn btn-flat btn-primary" title="Detail"><i class="glyphicon glyphicon-edit"></i> Update</a>
                  <a href="<?php echo site_url('C_admin/delete_user/').$key->id ;?>" class="btn btn-flat btn-danger" title="Detail"><i class="glyphicon glyphicon-edit"></i> Delete</a>
                        </td>
              <?php $i++;} ?>
            </tbody>
        </table>
</div>


            </div>


            <div class="box-footer">

            </div>
            </div>
          </div>
        </div>

      </div>


<!--  -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">JASEA</a>.</strong> All rights
    reserved.
  </footer>
          <?php $this->load->view('template/footer');?>

<!-- jQuery datatable -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>
