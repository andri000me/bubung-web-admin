
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?php echo SITE_NAME ?></h3>
            </div>
            <div class="box-body">
              <section class="col-lg-6">
                <h3><i class="fa fa-bullhorn"></i> Selamat datang <?php echo $this->common->getAdminData()->nama;?></h3>
              </section>
            </div>
          </div>
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_guru?></h3>

              <p>Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo site_url('guru') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total_orangtua?></h3>

              <p>Orang Tua</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo site_url('orangtua') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_siswa?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?php echo site_url('siswa') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>