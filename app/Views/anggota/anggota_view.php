 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>DAFTAR ANGGOTA</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>NIM</center></th>
        <th><center>Nama Lengkap</center></th>
        <th><center>Id Prodi</center></th>
        <th><center>No Handphone</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($anggota as $row): ?>
        <tr>
          <td><center><?= $row['nim'];?></center></td>
          <td><center><?= $row['nama_anggota'];?></td>
         <td><center><?= $row['id_prodi'];?> <br> <small><?= $row['nama_prodi'];?></small> </td>
          <td><center><?= $row['tlp'];?></td>
          <td><center><a href="/anggota/edit/<?= $row['nim'];?>" class="btn-submit"><i class = "fa fa-edit"></i></a>  <a href="/anggota/delete/<?= $row['nim'];?>" class="btn-submit"><i class = "fa fa-remove"></i> </center></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>