
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
            </div>

            <div class="box-footer">
                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah-data"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
            </div>

            <!-- /.box-header -->
    				<?php if ($this->session->flashdata('success')): ?>
            <div class="box-header">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('success'); ?></p>
              </div>
            </div>
    				<?php elseif ($this->session->flashdata('failed')): ?>
            <div class="box-header">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('failed'); ?></p>
              </div>
            </div>
    				<?php else: ?>
    				<?php endif; ?>

            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Nama Orang Tua</th>
                  <th>HP Orang Tua</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($siswas as $siswa): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $siswa->nama ?></td>
                  <td><?php foreach ($kelass as $key) {
                    if($siswa->kelas_id == $key->kelas_id){
                      echo $key->kelas_nama;
                    }
                  } ?></td>                  
                  <td><?php foreach ($orangtuas as $key) {
                    if($siswa->orangtua_id == $key->orangtua_id){
                      echo $key->nama;
                    }
                  } ?></td>
                  <td><?php foreach ($orangtuas as $key) {
                    if($siswa->orangtua_id == $key->orangtua_id){
                      echo $key->no_hp;
                    }
                  } ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $siswa->siswa_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('siswa/delete/'.($siswa->siswa_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $siswa->siswa_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Siswa</h4>
                          </div>
                          <form action="<?php echo site_url('siswa/edit/'.($siswa->siswa_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="siswa_id" value="<?php echo $siswa->siswa_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" value="<?php echo $siswa->nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Kelas</label>
                              <select class="form-control select2" style="width: 100%;" name="kelas_id" required>
                                <?php foreach ($kelass as $kelas): ?>
                                <option value="<?php echo $kelas->kelas_id ?>" <?php echo $siswa->kelas_id == $kelas->kelas_id ? 'selected' : '' ?>><?php echo $kelas->kelas_nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Orang Tua</label>
                              <select class="form-control select2" style="width: 100%;" name="orangtua_id" required>
                                <?php foreach ($orangtuas as $orangtua): ?>
                                <option value="<?php echo $orangtua->orangtua_id ?>" <?php echo $siswa->orangtua_id == $orangtua->orangtua_id ? 'selected' : '' ?>><?php echo $orangtua->nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                          </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- tambah data -->
  <div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Siswa</h4>
        </div>
        <form action="<?php echo site_url('siswa/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" required>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control select2" style="width: 100%;" name="kelas_id" required>
              <option value="">Tentukan Kelas</option>
              <?php foreach ($kelass as $kelas): ?>
              <option value="<?php echo $kelas->kelas_id ?>"><?php echo $kelas->kelas_nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Orang Tua</label>
            <select class="form-control select2" style="width: 100%;" name="orangtua_id" required>
              <option value="">Tentukan Orang Tua</option>
              <?php foreach ($orangtuas as $orangtua): ?>
              <option value="<?php echo $orangtua->orangtua_id ?>"><?php echo $orangtua->nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  