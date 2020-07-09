
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/ic_admin.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->common->getAdminData()->nama;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?php echo $this->uri->segment(1) == 'home' ? 'active': '' ?>">
          <a href="<?php echo site_url('home') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="header">MASTER DATA</li>
        <li class="<?php echo $this->uri->segment(1) == 'kelas' ? 'active': '' ?>">
          <a href="<?php echo site_url('kelas') ?>">
            <i class="fa fa-circle-o"></i> <span>Kelas</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(1) == 'mapel' ? 'active': '' ?>">
          <a href="<?php echo site_url('mapel') ?>">
            <i class="fa fa-database"></i> <span>Mata Pelajaran</span>
          </a>
        </li>
        <li class="header">AKUN</li>
        <li class="<?php echo $this->uri->segment(1) == 'guru' ? 'active': '' ?>">
          <a href="<?php echo site_url('guru') ?>">
            <i class="fa fa-users"></i> <span>Guru</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(1) == 'orangtua' ? 'active': '' ?>">
          <a href="<?php echo site_url('orangtua') ?>">
            <i class="fa fa-user"></i> <span>Orang Tua</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(1) == 'siswa' ? 'active': '' ?>">
          <a href="<?php echo site_url('siswa') ?>">
            <i class="fa fa-graduation-cap"></i> <span>Siswa</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(1) == 'mapelkelas' ? 'active': '' ?>">
          <a href="<?php echo site_url('mapelkelas') ?>">
            <i class="fa fa-database"></i> <span>Mata Pelajaran Kelas</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>