<?php echo $this->session->flashdata('msg'); ?>
<!-- bootstrap wysihtml5 - text editor -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>"> -->

         <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Update User</h3>
            </div>
            <form method="post" action="<?=site_url('upload_img/update_user')?>">
              
            <div class="box-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?=$list->username?>" required="required">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?=$list->email?>" required="required" >
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" value="xxxxxxxx" >
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="xxxxxxxx" >
              </div>

              <div class="form-group">
                <label>Akses</label>
                <select class="form-control" required="required" name="level">
                  <option value="<?php if ($list->level==1) {echo 1;} else {echo 2;} ?>">
                    <?php if ($list->level==1) {echo "admin";} else {echo "user";} ?></option>
                  <option value="<?php if ($list->level!=1) {echo 1;} else {echo 2;} ?> ">
                    <?php if ($list->level!=1) {echo "admin";} else {echo "user";} ?></option>
                </select>
              </div>


            </div>
            <div class="box-footer">
              <div class="form-group">
              <input type="hidden" name="id" value="<?=$list->id?>">
                <input type="submit" class="btn btn-primary" value="Update User" >
              </div>
            </div>
          </div>
        </form>
        </div>

        <div class="col-lg-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Update Profile</h3>
            </div>
              <?php echo form_open_multipart('upload_img/update_profile'); ?>
            <div class="box-body">
             <div class="form-group">
                <label>Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="<?=$list->firstname?>" required="required">
              </div>
              <div class="form-group">
                <label>Lastname</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="<?=$list->lastname?>" required="required">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" value="<?=$list->alamat?>" required="required">
              </div>


              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" class="form-control" value="<?=$list->jurusan?>" required="required" >
              </div>

              <div class="form-group">
                <label>Fakultas</label>
                <input type="text" id="fakultas" name="fakultas" class="form-control" value="<?=$list->fakultas?>" required="required" >
              </div>

              <div class="form-group">
                <label>Universitas</label>
                <input type="text" id="universitas" name="universitas" class="form-control" value="<?=$list->universitas?>" required="required" >
              </div>
              <div class="form-group">
                <label>Angkatan</label>
                <input type="number" id="angkatan" name="angkatan" class="form-control" value="<?=$list->angkatan?>" required="required" >
              </div>




              <div class="form-group">
                <label>Foto</label>
              <?php if ($list->foto==null) {
               } else {?>
                <img src="<?php echo base_url('assets/images/'.$list->foto)?>" class="img-responsive">
              <?php } ?>
               <input type="file" name="userfile">
              </div>

            </div>
            <div class="box-footer">
              <input type="hidden" name="id" value="<?=$list->id?>">
              <input type="submit" name="upload" class="btn btn-primary" value="Update Profile">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        </div>
      </div>
      <!-- /.row (main row) -->

<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?php echo base_url('assets/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"> -->
