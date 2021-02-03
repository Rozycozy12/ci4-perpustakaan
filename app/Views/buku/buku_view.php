 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>DAFTAR BUKU</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>Kode Buku</center></th>
        <th><center>Judul Buku</center></th>
        <th><center>Penulis Buku</center></th>
        <th><center>Penerbit Buku</center></th>
        <th><center>Tahun Terbit</center></th>
        <th><center>Stok</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($buku as $row): ?>
        <tr>
          <td><center><?= $row['kd_buku'];?></center></td>
          <td><?= $row['jdl_buku'];?></td>
          <td><?= $row['penulis_buku'];?></td>
          <td><?= $row['penerbit_buku'];?></td>
          <td><?= $row['thn_terbit'];?></td>
          <td><?= $row['stok'];?></td>
          <td><center><a href="/buku/edit/<?= $row['kd_buku'];?>" class="btn-submit"><i class = "fa fa-edit"></i></a>  <a href="/buku/delete/<?= $row['kd_buku'];?>" class="btn-submit"><i class = "fa fa-remove"></i></a></center></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>