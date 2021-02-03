<center>
	<h1>Selamat Datang</h1>
	<h1><?= session()->get('level') ?></h1>
	<!--  <div position="center" class="user-panel">
        <div class="pull-left image"> -->
          <img style="width: 10%" src="<?= base_url('foto/'. session()->get('foto_user')) ?>" class="img-circle" alt="User Image">
          <br />
          <br />
          <h1><?= session()->get('nama_user') ?></h1>
</center>

