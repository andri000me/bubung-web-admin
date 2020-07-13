
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Guru</h3>
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
                  <th>Nama Guru</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Wali Kelas</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($gurus as $guru): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $guru->nama ?></td>
                  <td><?php echo $guru->email ?></td>
                  <td><?php echo $guru->password ?></td>
                  <td><?php foreach ($kelass as $key) {
                    if($guru->kelas_id == $key->kelas_id){
                      echo $key->kelas_nama;
                    }
                  } ?></td>
                  <td><?php echo $guru->alamat ?></td>
                  <td><?php echo $guru->no_hp ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $guru->guru_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('guru/delete/'.($guru->guru_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $guru->guru_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Guru</h4>
                          </div>
                          <form action="<?php echo site_url('guru/edit/'.($guru->guru_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="guru_id" value="<?php echo $guru->guru_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Guru</label>
                              <input type="text" class="form-control" placeholder="Nama Guru" name="nama" value="<?php echo $guru->nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $guru->email ?>">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $guru->password ?>">
                            </div>
                            <div class="form-group">
                              <label>Nomor HP</label>
                              <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" value="<?php echo $guru->no_hp ?>">
                            </div>
                            <div class="form-group">
                              <label>Alamat</label>
                              <textarea type="text" class="form-control" placeholder="Alamat" name="alamat"><?php echo $guru->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Kelas</label>
                              <select class="form-control select2" style="width: 100%;" name="kelas_id" required>
                                <?php foreach ($kelass as $kelas): ?>
                                <option value="<?php echo $kelas->kelas_id ?>" <?php echo $guru->kelas_id == $kelas->kelas_id ? 'selected' : '' ?>><?php echo $kelas->kelas_nama ?></option>
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
          <h4 class="modal-title">Tambah Guru</h4>
        </div>
        <form action="<?php echo site_url('guru/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" class="form-control" placeholder="Nama Guru" name="nama" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="Password" name="password" required>
          </div>

          <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea type="text" class="form-control" placeholder="Alamat" name="alamat"></textarea>
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
  