<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Data Peminjaman</title>
  <style type="text/css">
    body {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 11px;
        background: black;
        background-size: cover;
          background-position: center;
        font-family: sans-serif;
        height: 100vh; 
          margin-bottom: 0px;
          padding: 0px;
      }
    h1, h2, td, th{
          color: white;
      }

    td{
          font-family: sans-serif;
          font-size: 12px;
      }

    .btn-submit {
        outline: none;
          border: 1px solid white;
          padding: 8px 8px;
          border-radius: 2px;
          color: gold; 
          margin-top: 30px;
      }

    button.btn-submit {
          outline: none;
          border: 1px solid gold;
          padding: 10px 30px;
          border-radius: 4px;
          color: gold; 
          text-transform: uppercase;
          font-weight: bold;
          margin-top: 30px;
          background-color: #ff000000;
        }
    .form-add-post {
          box-shadow: 0px 0px 16px rgb(0,0,0.5);
          width: 500px;
          margin-left: 20px;
          padding: 10px;
          margin-bottom: 50px;
          border-radius: 4px;
      }
    .form-add-post {
          display: block;
          font-size: 14px;
          columns: #607D8B;
          font-weight: bold;
          margin-bottom: 10px;
      }
    .form-add-post input, .form-add-post textarea {
          outline: none;
          border: 1px solid gold;
          padding: 12px;
          border-radius: 4px;
          margin-bottom: 20px;
          width: 100%;
          box-sizing: border-box;
          font-size: 12px;
          columns: #607D8B;
      }
    .btn-add {
          outline: none;
          border: 1px solid gold;
          padding: 10px 30px;
          border-radius: 4px;
          color: gold; 
          text-transform: uppercase;
          font-weight: bold;
          margin-top: 30px;
          background-color: #ff000000;
      }
    }

  </style>
</head>
<body>
<tr>
  <td height="100" colspan="0" ><left>
  <h2><br /><br />Form Add Peminjaman<br /><br />
    <hr />
  <form action="/peminjaman/save" method="post" enctype="multipart/form-data">
    <div class="form-add-post">
      <tbody>
    <label htmlFor="title">Kode Buku</label>
    <div class="col-sm-12 col-md-7">
    <select name="kd_buku" class="form-control">
                          <option value="">Pilih Buku</option>
                          <?php foreach ($buku as $row) { ?>
                          <option value="<?= $row['kd_buku'];?>"><?=  $row['kd_buku'];?> (<?=  $row['jdl_buku'];?>)</option>
                         <?php  } ?>
                        </select>
                      </div>
                      <br />
   <label htmlFor="title">NIM Peminjam</label>
    <div class="col-sm-12 col-md-7">
    <select name="nim" class="form-control">
                          <option value="">Pilih Nama Anggota</option> 
                          <?php foreach ($anggota as $row) { ?>
                          <option value="<?= $row['nim'];?>"><?=  $row['nim'];?> (<?=  $row['nama_anggota'];?>)</option>
                         <?php  } ?>
                        </select>
                      </div>
                      <br />
    <label htmlFor="title">Nama Petugas</label>
    <div class="col-sm-12 col-md-7">
    <input class="form-control" readonly="readonly" value="<?= session()->get('nama_user') ?>" disable>
    </div>
                      
    <button type="submit" class="btn-submit">Save</button>
    <a href="/peminjaman" class="btn-add">Batal</a><br><br>
      </tbody>
    </div>
  </form>

</body>
</html>