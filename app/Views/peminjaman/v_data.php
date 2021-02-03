 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>DATA PEMINJAMAN BUKU PERPUSTAKAAN</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>Id Pinjam</center></th>
        <th><center>Kode Buku</center></th>
        <th><center>Nama Anggota</center></th>
        <th><center>Nama Petugas</center></th>
        <th><center>Tanggal Pinjam</center></th>
        <th><center>Tanggal Kembali</center></th>
        <th><center>Status Buku</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($peminjaman as $row): ?>
        <tr>
          <td><center><?= $row->id_pinjam ?></center></td>
          <td><center><?= $row->kd_buku ?> <br> <small><?= $row->jdl_buku ?></small> </td>
          <td><center><?= $row->nama_anggota ?> </td>
          <td><center> <?= $row->nama_user ?> </td>
          <td><center><?= $row->tgl_pinjam ?></center></td>
          <td><center><?= $row->tgl_kembali ?></center></td>
          <td><center><?= $row->stts_buku ?></center></td>
          <td><center><a href="/peminjaman/edit/<?= $row->id_pinjam ?>" class="btn-submit"><i class = "fa fa-edit"></i></a>  <a href="/peminjaman/delete/<?= $row->id_pinjam ?>" class="btn-submit"><i class = "fa fa-remove"></i></a></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>