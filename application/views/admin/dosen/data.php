
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Dosen Wali</h3>
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
                  <th>Nama Dosen Wali</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Kelas</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($dosens as $dosen): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dosen->nama ?></td>
                  <td><?php echo $dosen->username ?></td>
                  <td><?php echo $dosen->password ?></td>
                  <td><?php foreach ($kelass as $key) {
                    if($dosen->kelas_id == $key->kelas_id){
                      echo $key->semester." ".$key->kelas_nama;
                    }
                  } ?></td>
                  <td><?php $sts = $dosen->status;
                  if($sts=='A'){
                    ?>
                    <label class="label label-success label-md">Aktif</label>
                    <?php
                  }
                  elseif($sts=='T'){
                    ?>
                    <label class="label label-default label-md">Tidak Aktif</label>
                    <?php
                  }?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $dosen->dosen_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('admin/dosen/delete/'.($dosen->dosen_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $dosen->dosen_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Dosen Wali</h4>
                          </div>
                          <form action="<?php echo site_url('admin/dosen/edit/'.($dosen->dosen_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="dosen_id" value="<?php echo $dosen->dosen_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Dosen Wali</label>
                              <input type="text" class="form-control" placeholder="Nama Dosen Wali" name="nama" value="<?php echo $dosen->nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $dosen->username ?>">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $dosen->password ?>">
                            </div>
                            <div class="form-group">
                              <label>Kelas</label>
                              <select class="form-control select2" style="width: 100%;" name="kelas_id" required>
                                <?php foreach ($kelass as $kelas): ?>
                                <option value="<?php echo $kelas->kelas_id ?>" <?php echo $dosen->kelas_id == $kelas->kelas_id ? 'selected' : '' ?>><?php echo $kelas->semester." ".$kelas->kelas_nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option value="A" <?php echo $dosen->status == 'A' ? 'selected' : '' ?>>Aktif</option>
                                <option value="T" <?php echo $dosen->status == 'T' ? 'selected' : '' ?>>Tidak Aktif</option>
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
          <h4 class="modal-title">Tambah Dosen Wali</h4>
        </div>
        <form action="<?php echo site_url('admin/dosen/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Dosen Wali</label>
            <input type="text" class="form-control" placeholder="Nama Dosen Wali" name="nama" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control select2" style="width: 100%;" name="kelas_id" required>
              <?php foreach ($kelass as $kelas): ?>
              <option value="<?php echo $kelas->kelas_id ?>"><?php echo $kelas->semester." ".$kelas->kelas_nama ?></option>
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
  