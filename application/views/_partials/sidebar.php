
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/ic_'.$this->uri->segment(1).'.png');?>" class="img-circle" alt="User Image">
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
        
        <li class="<?php echo $this->uri->segment(2) == 'home' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/home') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="<?php echo 
        $this->uri->segment(2) == 'jurusan' ||
        $this->uri->segment(2) == 'prodi' ||
        $this->uri->segment(2) == 'kelas'
        ? 'active': '' ?> treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(2) == 'jurusan' ? 'active': '' ?>"><a href="<?php echo site_url('admin/jurusan') ?>"><i class="fa fa-circle-o"></i> Jurusan</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'prodi' ? 'active': '' ?>"><a href="<?php echo site_url('admin/prodi') ?>"><i class="fa fa-circle-o"></i> Prodi</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'kelas' ? 'active': '' ?>"><a href="<?php echo site_url('admin/kelas') ?>"><i class="fa fa-circle-o"></i> Kelas</a></li>
          </ul>
        </li>
        <li class="header">AKUN</li>
        <li class="<?php echo $this->uri->segment(2) == 'admin' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/admin') ?>">
            <i class="fa fa-lock"></i> <span>Admin</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'pimpinan' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/pimpinan') ?>">
            <i class="ion ion-person"></i> <span>Pimpinan</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'kajur' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/kajur') ?>">
            <i class="ion ion-person"></i> <span>Kajur</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'kaprodi' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/kaprodi') ?>">
            <i class="fa fa-graduation-cap"></i> <span>KA. Prodi</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'mahasiswa' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/mahasiswa') ?>">
            <i class="fa fa-users"></i> <span>Mahasiswa</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'dosen' ? 'active': '' ?>">
          <a href="<?php echo site_url('admin/dosen') ?>">
            <i class="fa fa-user"></i> <span>Dosen Wali</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>