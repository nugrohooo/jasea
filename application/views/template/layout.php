            <?php $this->load->view('template/head');?>    
          <!-- TOP SECONDARY NAVIGATION -->
            <?php $this->load->view('template/sidebar');?>
         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="">
  <!-- Main content -->
    <section class="content">
          <?php $this->load->view($template); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">JASEA</a>.</strong> All rights
    reserved.
  </footer>
          <?php $this->load->view('template/footer');?>