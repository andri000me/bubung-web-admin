
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Admin</h3>
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
                  <th>Nama Admin</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($admins as $admin): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $admin->nama ?></td>
                  <td><?php echo $admin->username ?></td>
                  <td><?php echo $admin->password ?></td>
                  <td><?php $sts = $admin->status;
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
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $admin->admin_id ?>" <?php echo $this->session->userdata('admin_id') == $admin->admin_id ? 'disabled' : '' ?>><i class="fa fa fa-pencil"></i>&nbsp;Edit</button>
                    <a href="<?php echo site_url('admin/admin/delete/'.($admin->admin_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');" <?php echo $this->session->userdata('admin_id') == $admin->admin_id ? 'disabled' : '' ?>><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $admin->admin_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Admin</h4>
                          </div>
                          <form action="<?php echo site_url('admin/admin/edit/'.($admin->admin_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="admin_id" value="<?php echo $admin->admin_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Admin</label>
                              <input type="text" class="form-control" placeholder="Nama Admin" name="nama" value="<?php echo $admin->nama ?>">
                            </div>
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $admin->username ?>">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $admin->password ?>">
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
          <h4 class="modal-title">Tambah Admin</h4>
        </div>
        <form action="<?php echo site_url('admin/admin/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Admin</label>
            <input type="text" class="form-control" placeholder="Nama Admin" name="nama" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="Password" name="password" required>
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
  