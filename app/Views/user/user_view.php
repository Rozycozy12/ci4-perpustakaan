 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <body>
  <h2><br /><br /><center>DAFTAR USER</center>
  <br>
  <table class="table" border="2" cellpadding="10" width="50%">
    <thead>
      <tr>
        <th><center>Id User</center></th>
        <th><center>Nama Lengkap</center></th>
        <th><center>Username</center></th>
        <th><center>No Handphone</center></th>
        <th><center>Level</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($user as $row): ?>
        <tr>
          <td><center><?= $row['id_user'];?></center></td>
          <td><?= $row['nama_user'];?></td>
          <td><?= $row['username'];?></td>
          <td><?= $row['tlp'];?></td>
          <td><?= $row['level'];?></td>
          <td><center><a href="/user/edit/<?= $row['id_user'];?>" class="btn-submit"><i class = "fa fa-edit"></i></a>  <a href="/user/delete/<?= $row['id_user'];?>" class="btn-submit"><i class = "fa fa-remove"></i></a>  </center></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>