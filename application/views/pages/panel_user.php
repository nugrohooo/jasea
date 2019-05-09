
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/dist/img/user.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('username')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user.png')?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('username').' '.$this->session->userdata('lastname')?>
                  <small>S1. Pend. Teknologi Informasi</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=site_url('C_admin/profile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('C_admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>