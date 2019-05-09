
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body box-profile">
              

              <h3 class="profile-username text-center"><?=$list->firstname.' '.$list->lastname?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Fakultas</b> <a class="pull-right"><?=$list->fakultas?></a>
                </li>
                <li class="list-group-item">
                  <b>Jurusan</b> <a class="pull-right"><?=$list->jurusan?></a>
                </li>
                <li class="list-group-item">
                  <b>Prodi</b> <a class="pull-right"><?=$list->universitas?></a>
                </li>
                <li class="list-group-item">
                  <b>Angkatan</b> <a class="pull-right"><?=$list->angkatan?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right"><?=$list->universitas?></a>
                </li>
              </ul>
              <a href="<?=site_url('C_admin/detail_user/'.$list->id)?>" class="btn btn-success block pull-right">Update</a>

            </div>
            <!-- /.box-body -->
          </div>

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title"></h3 -->
            </div>
            <div class="box-body">
              <div class="information">
                <p>JASEA adalah aplikasi yang berguna untuk mencari kata,syntax maupun materi dalam modul java se untuk bahasa Pemrograman Berorientasi Obyek
                   yang diuraikan dalam bahasa Indonesia agar mudah dimengerti oleh pengguna</p>
              </div>
            </div>
          </div>
          <!-- /.box -->

        </div>

      </div>
      </div>
      <!-- /.row (main row) -->
