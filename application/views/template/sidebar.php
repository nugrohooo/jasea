<!-- Left side column. contains the logo and sidebar -->
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Data Materi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('C_admin/addkeyword')?>">
                <i class="fa fa-plus"></i> Tambah Materi
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('C_admin/listkeyword')?>">
                <i class="fa fa-list"></i> List Materi
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?=site_url('C_admin/add_user')?>">
                <i class="fa fa-plus"></i> Tambah User
              </a>
            </li>
            <li>
              <a href="<?=site_url('C_admin/listuser')?>">
                <i class="fa fa-list"></i> List User
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
