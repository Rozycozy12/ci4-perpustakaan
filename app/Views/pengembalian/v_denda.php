<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Peminjaman</title>
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
  <h2><br /><br />Form Edit<br /><br />
    <hr />
  <form action="/pengembalian/save" method="post">
    <div class="form-add-post">
      <tbody>
    <label htmlFor="title">Kode Buku</label>
    <input type="hidden" name="id_pinjam" value="<?= $peminjaman->id_pinjam?>" readonly="readonly"/>
    <input type="text" name="kd_buku" value="<?= $peminjaman->kd_buku;?>" readonly="readonly" />
    <label htmlFor="title">NIM</label>
    <input type="text" name="nim" value="<?= $peminjaman->nim;?>" readonly="readonly" />
    <label htmlFor="title">Id Petugas</label>
    <input type="text" name="id_user" value="<?= $peminjaman->id_user;?>" readonly="readonly"/>
    <label htmlFor="title">Tanggal Pinjam</label>
    <input type="text" name="tgl_pinjam" value="<?= $peminjaman->tgl_pinjam;?>" readonly="readonly"/>
    <label htmlFor="title">Tanggal Kembali</label>
    <input type="text" name="tgl_kembali" value="<?= $peminjaman->tgl_kembali;?>" readonly="readonly"/>
    <label htmlFor="title">Denda</label>
    <?php if(strtotime(date('Y-m-d'))>strtotime($peminjaman->tgl_kembali)): ?>
    <?php $denda= date_diff(date_create($peminjaman->tgl_kembali),date_create(date('Y-m-d')));
          $hari=$denda->format('%a');
          $denda=$hari*1000;
     ?>
    <input type="text" name="denda" value="<?= $denda ?>">
    <?php else:?>
    <input type="text" name="denda" value="0">
    <?php endif;?>
    <button type="submit" class="btn-submit">Save</button>
    <a href="/pengembalian" class="btn-add">Batal</a><br><br>
      </tbody>
    </div>
  </form>

</body>
</html>