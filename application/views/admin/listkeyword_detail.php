
      
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header">
            <?php echo $this->session->flashdata('msg'); ?>
              <h3 class="box-title">Update Keyword</h3>

            </div>
              <?php echo form_open_multipart('upload_img/update_keyword'); ?>
            <div class="box-body">
              <div class="form-group">
                <label>Keyword</label>
                <input type="text" class="form-control" id="kata_kunci" name="kata_kunci" value="<?=$list->kata_kunci?>" required="required">
              </div>
              <div class="form-group">
                <label>Pengertian</label>
                <textarea id="pengertian" name="arti" rows="8" cols="80" value="<?=$list->arti?>" required="required"><?=$list->arti?>
                </textarea>
              </div>
              <div class="form-group">
                <label>Gambar</label>
              <?php if ($list->gambar==null or $list->gambar = ' ') {
               } else {?>
                <img src="<?php echo base_url('assets/images/'.$list->gambar)?>" class="img-responsive">
              <?php } ?>
               <input type="file" name="userfile">
              </div>
              <?php if ($list->gambar==null or $list->gambar = ' ') {
               } else {?>
               <div class="form-group">
                <a href="<?=site_url('upload_img/delete_gambar/').$list->id?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Image</a>
              </div>
              <?php } ?>

              <div class="form-group">
                <label>Syntax</label>
                <textarea id="syntax" name="syntax" value="<?=$list->syntax?>" rows="8" cols="80" required="required"><?=$list->syntax?>
                </textarea>
              </div>
              <div class="form-group">
                <label>Required</label>
                <textarea id="required" value="<?=$list->required?>" name="required" rows="8" cols="80" required="required"><?=$list->required?>
                </textarea>
              </div>
            </div>
            <div class="form-group">
               
       
            </div>
           
       
            <div class="box-footer">
              <input type="hidden" name="id" value="<?=$list->id?>">
              <input type="submit" name="upload" class="btn btn-primary" value="Update Data">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
              <?php echo form_close(); ?>
           
            <table border="1" width="100%">
          <tr>
  <th scope="col" class="rounded-company">Komentar</th>
  <th scope="col" class="rounded-q1">Nama</th>
  <th scope="col" class="rounded-q2">Tanggal</th>
  <th scope="col" class="rounded-q3">Action</th>
  
 </tr>
        <?php 

        foreach ($list_komentar as $key ) {
          ?>
          <tr>
          <td>
          <li class="btn btn-block"><?php echo $key['komentar'] ?> </li>
          </td>
          <td>
          <li class="btn btn-block"><?php echo $key['firstname'] ?> </li>
          </td>
          <td>
          <li class="btn btn-block"><?php echo $key['tanggal_komentar'] ?> </li>
          </td>
          <td>
          <a href="<?php echo site_url()?>/C_admin/hapus_komentar/<?php echo $key['id']; ?>/<?php echo $id; ?>"class="btn btn-flat btn-danger" title="hapus">Hapus</a>
          </td>
          </tr>
          <?php
        }
         ?>
       </table>
             <form action="<?php echo site_url()?>/C_admin/balas_komentar/<?php echo $id; ?>" method="post"  >
              <textarea name="komentar" id="komentar" class="form-control"></textarea>
              
              <button type="submit"  class="btn btn-primary"> Balas Komentar</button>  
          </form>
           </div>
          </div>
       
        </div>

      </div>
      </div>
     