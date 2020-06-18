
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Prodi</h3>
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
                  <th>Nama Prodi</th>
                  <th>Nama Jurusan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($prodis as $prodi): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $prodi->prodi_nama ?></td>
                  <td><?php echo $prodi->jurusan_nama ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $prodi->prodi_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('admin/prodi/delete/'.($prodi->prodi_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $prodi->prodi_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Prodi</h4>
                          </div>
                          <form action="<?php echo site_url('admin/prodi/edit/'.($prodi->prodi_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="prodi_id" value="<?php echo $prodi->prodi_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Prodi</label>
                              <input type="text" class="form-control" placeholder="Nama Prodi" name="prodi_nama" value="<?php echo $prodi->prodi_nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Jurusan</label>
                              <select class="form-control select2" style="width: 100%;" name="jurusan_id" required>
                                <option value="<?php echo $prodi->jurusan_id ?>"><?php echo $prodi->jurusan_nama ?></option>
                                <?php foreach ($jurusans as $jurusan): ?>
                                <option value="<?php echo $jurusan->jurusan_id ?>"><?php echo $jurusan->jurusan_nama ?></option>
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
          <h4 class="modal-title">Tambah Prodi</h4>
        </div>
        <form action="<?php echo site_url('admin/prodi/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Prodi</label>
            <input type="text" class="form-control" placeholder="Nama Prodi" name="prodi_nama" required>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control select2" style="width: 100%;" name="jurusan_id" required>
              <option value="">Pilih Jurusan</option>
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
  