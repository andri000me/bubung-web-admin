
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?php echo SITE_NAME ?></h3>
            </div>
            <div class="box-body">
              <p>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('dist/img/logo-polbeng.png')?>" alt="User profile picture">
                <h3 class="box-title text-center">Politeknik Negeri Bengkalis</h3>
                <h4 class="text-center"><?php echo SITE_NAME ?></h4>
              </p>
              <section class="col-lg-6">
                <h3><i class="fa fa-bullhorn"></i> Selamat datang <?php echo $this->common->getAdminData()->nama;?></h3>
              </section>
              <section class="col-lg-6">
                <h3 class="text-right"><i class="fa fa-calendar"></i> <?php echo $this->common->tanggalIndonesia(date('Y-m-d'));?></h3>
              </section>
            </div>
          </div>
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Akun Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Akun Dosen Wali</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Akun KA. Prodi</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Akun Kajur</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>