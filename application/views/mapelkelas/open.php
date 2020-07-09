
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Mapel Kelas <?php echo $kelas->kelas_nama?></h3>
            </div>

            <div class="box-footer">
                <a href="#" class="btn btn-success btn-xs" onclick="return history.back(-1);"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
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
                  <th>&nbsp;</th>
                  <th>Hari</th>
                  <th>Nama Mapel</th>
                  <th>Jam</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($mapelkelass as $mapelkelas): ?>
                <tr>
                  <td><?php echo "-"?></td>
                  <td><?php echo $mapelkelas->hari ?></td>
                  <td><?php echo $mapelkelas->mapel_nama ?></td>
                  <td><?php echo $mapelkelas->jam ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $mapelkelas->mapel_kelas_id ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('mapelkelas/delete/'.($kelas->kelas_id).'/'.($mapelkelas->mapel_kelas_id)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $mapelkelas->mapel_kelas_id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Mapel Kelas</h4>
                          </div>
                          <form action="<?php echo site_url('mapelkelas/edit/'.($kelas->kelas_id).'/'.($mapelkelas->mapel_kelas_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="mapel_kelas_id" value="<?php echo $mapelkelas->mapel_kelas_id ?>">
                          <input type="hidden" name="kelas_id" value="<?php echo $mapelkelas->kelas_id ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Hari</label>
                              <select class="form-control select2" style="width: 100%;" name="hari" required>
                                <option value="">Pilih Hari</option>
                                <option value="Senin" <?php echo $mapelkelas->hari=='Senin' ? 'selected' : '' ?>>Senin</option>
                                <option value="Selasa" <?php echo $mapelkelas->hari=='Selasa' ? 'selected' : '' ?>>Selasa</option>
                                <option value="Rabu" <?php echo $mapelkelas->hari=='Rabu' ? 'selected' : '' ?>>Rabu</option>
                                <option value="Kamis" <?php echo $mapelkelas->hari=='Kamis' ? 'selected' : '' ?>>Kamis</option>
                                <option value="Jumat" <?php echo $mapelkelas->hari=='Jumat' ? 'selected' : '' ?>>Jumat</option>
                                <option value="Sabtu" <?php echo $mapelkelas->hari=='Sabtu' ? 'selected' : '' ?>>Sabtu</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Mapel</label>
                              <select class="form-control select2" style="width: 100%;" name="mapel_id" required>
                                <?php foreach ($mapels as $mapel): ?>
                                <option value="<?php echo $mapel->mapel_id ?>" <?php echo $mapel->mapel_id == $mapelkelas->mapel_id ? 'selected' : '' ?>><?php echo $mapel->mapel_nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Jam</label>
                              <input type="text" class="form-control" placeholder="Contoh. 08:00 - 10:30" name="jam" value="<?php echo $mapelkelas->jam ?>">
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
          <h4 class="modal-title">Tambah Mapel Kelas</h4>
        </div>
        <form action="<?php echo site_url('mapelkelas/add/'.($kelas->kelas_id)) ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Hari</label>
            <select class="form-control select2" style="width: 100%;" name="hari" required>
              <option value="">Pilih Hari</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
            </select>
          </div>
          <div class="form-group">
            <label>Mapel</label>
            <select class="form-control select2" style="width: 100%;" name="mapel_id" required>
              <option value="">Pilih Mapel</option>
              <?php foreach ($mapels as $mapel): ?>
              <option value="<?php echo $mapel->mapel_id ?>"><?php echo $mapel->mapel_nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jam</label>
            <input type="text" class="form-control" placeholder="Contoh. 08:00 - 10:30" name="jam" required>
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
  

  <script>
	$(document).ready(function(){
    var groupColumn = 1;
    // var groupColumn2 = 2;
    var table = $('#example1').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
            // { "visible": false, "targets": groupColumn2 }
        ],
        // "order": [[ groupColumn, 'asc' ]],
        "displayLength": 15,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group" style="background-color: #3c8dbc; color: white"><td colspan="12">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );

            // api.column(groupColumn2, {page:'current'} ).data().each( function ( group, i ) {
            //     if ( last !== group ) {
            //         $(rows).eq( i ).before(
            //             '<tr class="group" style="background-color: #999; color: white"><td colspan="12">'+group+'</td></tr>'
            //         );
 
            //         last = group;
            //     }
            // } );
            
        }
    } );
	});
	</script>