<!-- bootstrap wysihtml5 - text editor -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>"> -->

         <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->db->query("select * from materi")->num_rows()?></h3>

              <p>Total Materi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
            <?php echo $this->session->flashdata('msg'); ?>
              <h3 class="box-title">Tambah Materi</h3>

            </div>
              <?php echo form_open_multipart('upload_img/upload'); ?>
            <div class="box-body">
              <div class="form-group">
                <label>Keyword</label>
                <input type="text" class="form-control" id="kata_kunci" name="kata_kunci" placeholder="Keyword" required="required">
              </div>
              <div class="form-group">
                <label>Pengertian</label>
                <textarea id="pengertian" name="arti" rows="8" cols="80" placeholder="Pengertian" required="">
                </textarea>
              </div>
              <div class="form-group">
                <label>Gambar</label>
               <input type="file" name="userfile">
              </div>             
              <div class="form-group">
                <label>Syntax</label>
                <textarea id="syntax" name="syntax" rows="8" cols="80" required="required">
                </textarea>
              </div>
              <div class="form-group">
                <label>Required</label>
                <textarea id="required" name="required" rows="8" cols="80" required="required">
                </textarea>
              </div>
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

<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?php echo base_url('assets/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"> -->
