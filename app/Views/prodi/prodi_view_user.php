 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>DAFTAR PRODI</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>Id Prodi</center></th>
        <th><center>Nama Prodi</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($prodi as $row): ?>
        <tr>
          <td><center><?= $row['id_prodi'];?></center></td>
          <td><center><?= $row['nama_prodi'];?></center></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>