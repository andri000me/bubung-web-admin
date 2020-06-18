
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Jurusan</h3>
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
                  <th>Nama Jurusan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($jurusans as $jurusan): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jurusan->jurusan_nama ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $jurusan->jurusan_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('admin/jurusan/delete/'.($jurusan->jurusan_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $jurusan->jurusan_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Jurusan</h4>
                          </div>
                          <form action="<?php echo site_url('admin/jurusan/edit/'.($jurusan->jurusan_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="jurusan_id" value="<?php echo $jurusan->jurusan_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Jurusan</label>
                              <input type="text" class="form-control" placeholder="Nama Jurusan" name="jurusan_nama" value="<?php echo $jurusan->jurusan_nama ?>">
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
          <h4 class="modal-title">Tambah Jurusan</h4>
        </div>
        <form action="<?php echo site_url('admin/jurusan/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" class="form-control" placeholder="Nama Jurusan" name="jurusan_nama" required>
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
  