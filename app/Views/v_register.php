
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url() ?>/template/index2.html"><b>New User</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register Now</p>

    <!-- pesan validasi error -->

    <?php
    $errors=session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
    

      <div class="alert alert-danger" role="alert">
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
      <?php } ?>

      <?php
      if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
    }
    ?>

    <?php
    echo form_open_multipart('Registerauth/save_register');
    ?>

      <div class="form-group has-feedback">
        <input name="nama_user" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pswd" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="repswd" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="tlp" class="form-control" placeholder="No Handphone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="file" name="foto_user" class="form-control" id="">
        <span class="glyphicon glyphicon-upload form-control-feedback"></span>
      </div>
      <select name="level" id="" class="form-control" >
          <option value="">Choose Level</option>
          <option value="Admin">Admin</option>
          <option value="Petugas">Petugas</option>
      </select>
      <br />
      <br />
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>
<a href="<?= base_url('web') ?>" class="text-center">Batal</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500,0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>
</body>
</html>
