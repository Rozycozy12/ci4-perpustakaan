 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>LAPORAN PENGEMBALIAN BUKU PERPUSTAKAAN</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>Id Kembali</center></th>
        <th><center>Id Pinjam</center></th>
        <th><center>Kode Buku</center></th>
        <th><center>Nama Anggota</center></th>
        <th><center>Nama Petugas</center></th>
        <th><center>Tanggal Pinjam</center></th>
        <th><center>Tanggal Kembali</center></th>
        <th><center>Tanggal Penyerahan</center></th>
        <th><center>Denda</center></th>
        <th><center>Status Buku</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($pengembalian as $row): ?>
        <tr>
          <td><center><?= $row->id_kembali ?></center></td>
          <td><center><?= $row->id_pinjam ?></center></td>
          <td><center><?= $row->kd_buku ?> <br> <small><?= $row->jdl_buku ?></small> </td>
          <td><center><?= $row->nama_anggota ?></td>
          <td><center><?= $row->nama_user ?></td>
          <td><center><?= $row->tgl_pinjam ?></center></td>
          <td><center><?= $row->tgl_kembali ?></center></td>
          <td><center><?= $row->tgl_serah ?></center></td>
          <td><center><?= $row->denda ?></center></td>
          <td><center><?= $row->stts_buku ?></center></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>