      <!-- Main row -->
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <?php echo $this->session->flashdata('msg'); ?>

              <?php echo form_open_multipart('upload_img/add_user'); ?>
            <div class="box-header">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <?php echo form_open("#"); ?>
            <div class="box-body">
              <div class="row p-t-b-5">
                <div class="col-md-6">
                  <label>Firstname</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Lastname</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required="required">
                  </div>
                </div>
              </div>
              <div class="row p-t-b-5">
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Username</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                  </div>
                </div>
              </div>
              <div class="row p-t-b-5">
                <div class="col-md-6">
                  <label>Password</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Confirm Password</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="Password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="required">
                  </div>
                </div>
              </div>
              <div class="row p-t-b-5">
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Akses</label>
                  <select class="form-control" required="required" name="level">
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                  </select>
                </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Foto</label>
                      <input type="file" name="userfile" required="required">
                  </div>
                </div>

              </div>
 <!-- 
              <div class="row p-t-b-5">
              </div>
  -->
            </div>
            <div class="box-footer">
              <input type="submit" name="upload" class="btn btn-primary" value="Submit">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>

      </div>
      </div>
      <!-- /.row (main row) -->
