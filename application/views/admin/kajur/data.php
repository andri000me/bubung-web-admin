
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Kajur</h3>
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
                  <th>Nama Kajur</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Jurusan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($kajurs as $kajur): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $kajur->nama ?></td>
                  <td><?php echo $kajur->username ?></td>
                  <td><?php echo $kajur->password ?></td>
                  <td><?php foreach ($jurusans as $key) {
                    if($kajur->jurusan_id == $key->jurusan_id){
                      echo $key->jurusan_nama;
                    }
                  } ?></td>
                  <td><?php $sts = $kajur->status;
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
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $kajur->kajur_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('admin/kajur/delete/'.($kajur->kajur_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $kajur->kajur_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Kajur</h4>
                          </div>
                          <form action="<?php echo site_url('admin/kajur/edit/'.($kajur->kajur_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="kajur_id" value="<?php echo $kajur->kajur_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Kajur</label>
                              <input type="text" class="form-control" placeholder="Nama Kajur" name="nama" value="<?php echo $kajur->nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $kajur->username ?>">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $kajur->password ?>">
                            </div>
                            <div class="form-group">
                              <label>Jurusan</label>
                              <select class="form-control select2" style="width: 100%;" name="jurusan_id" required>
                                <?php foreach ($jurusans as $jurusan): ?>
                                <option value="<?php echo $jurusan->jurusan_id ?>" <?php echo $kajur->jurusan_id == $jurusan->jurusan_id ? 'selected' : '' ?>><?php echo $jurusan->jurusan_nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option value="A" <?php echo $kajur->status == 'A' ? 'selected' : '' ?>>Aktif</option>
                                <option value="T" <?php echo $kajur->status == 'T' ? 'selected' : '' ?>>Tidak Aktif</option>
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
          <h4 class="modal-title">Tambah Kajur</h4>
        </div>
        <form action="<?php echo site_url('admin/kajur/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kajur</label>
            <input type="text" class="form-control" placeholder="Nama Kajur" name="nama" required>
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
            <label>Jurusan</label>
            <select class="form-control select2" style="width: 100%;" name="jurusan_id" required>
              <?php foreach ($jurusans as $jurusan): ?>
              <option value="<?php echo $jurusan->jurusan_id ?>"><?php echo $jurusan->jurusan_nama ?></option>
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
  