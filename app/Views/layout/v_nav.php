 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?= base_url('foto/'. session()->get('foto_user')) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= session()->get('nama_user') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?= session()->get('level') ?></a>
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
        <li class="header">MAIN MENU</li>

        <?php if (session()->get('level')== 'Admin') { ?>
         <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('registerauth/register') ?>"><i class="fa fa-user-plus"></i> Register User Baru </a></li>
            <li class="active"><a href="<?= base_url('user') ?>"><i class="fa fa-users"></i> Data User </a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Prodi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('prodi/add_new') ?>"><i class="fa fa-pencil-square-o"></i> Tambah Daftar Prodi </a></li>
            <li class="active"><a href="<?= base_url('prodi') ?>"><i class="fa fa-server"></i> Data Prodi</a></li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url('buku/buku_admin') ?>">
            <i class="fa fa-bookmark"></i> <span>Daftar Buku</span>
          </a>
        </li>
         <li>
          <a href="<?= base_url('anggota/view_admin') ?>">
            <i class="fa fa-users"></i> <span> Data Anggota </span>
          </a>
        </li>
         <li>
          <a href="<?= base_url('peminjaman/laporan') ?>">
            <i class="fa fa-file-text-o"></i> <span> Laporan Peminjaman </span>
          </a>
        </li>
         <li>
          <a href="<?= base_url('pengembalian/laporan') ?>">
            <i class="fa fa-file-text-o"></i> <span> Laporan Pengembalian </span>
          </a>
        </li>
      <?php } ?>

      <?php if (session()->get('level')== 'Petugas') { ?>
         <li>
          <a href="<?= base_url('prodi/prodi_user') ?>">
            <i class="fa fa-graduation-cap"></i> <span> Data Prodi </span>
          </a>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-user"></i> <span>Anggota Perpustakaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('Anggota/add_new') ?>"><i class="fa fa-user-plus"></i> Register Anggota Baru </a></li>
            <li class="active"><a href="<?= base_url('anggota') ?>"><i class="fa fa-users"></i> Data Anggota Perpustakaan </a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-book"></i> <span>Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('buku/add_new') ?>"><i class="fa fa-plus-square"></i> Tambah Daftar Buku </a></li>
            <li class="active"><a href="<?= base_url('buku') ?>"><i class="fa fa-bookmark"></i> Daftar Buku </a></li>
          </ul>
        </li>
         <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Peminjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('peminjaman/add_new') ?>"><i class="fa fa-plus-square"></i> Tambah Daftar Peminjam </a></li>
            <li class="active"><a href="<?= base_url('peminjaman') ?>"><i class="fa fa-bookmark"></i> Data Peminjaman </a></li>
            <li class="active"><a href="<?= base_url('peminjaman/laporan') ?>"><i class="fa fa-book"></i> Laporan </a></li>
          </ul>
        </li>
         <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Pengembalian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('pengembalian/add_new') ?>"><i class="fa fa-plus-square"></i> Tambah Daftar Pengembalian </a></li>
            <li class="active"><a href="<?= base_url('pengembalian') ?>"><i class="fa fa-bookmark"></i> Data Pengembalian </a></li>
            <li class="active"><a href="<?= base_url('pengembalian/laporan') ?>"><i class="fa fa-book"></i> Laporan </a></li>
          </ul>
        </li>
      <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>it all starts here</small>
      </h1>
        </section>

    <!-- Main content -->
    <section class="content">
