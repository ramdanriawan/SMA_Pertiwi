<?php
@session_start();
if (@$_SESSION['siswa']) {
    echo "<script>window.location='./';</script>";
} else {
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Learning SMA Pertiwi Kota Jambi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="assets/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="assets/img/logo.png" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
			<h2 class="mb-4">Selamat Datang di <br> SMA Pertiwi Kota Jambi</h2>
			<?php
if (@$_POST['login']) {
        $user     = @mysqli_real_escape_string($db, $_POST['user']);
        $pass     = @mysqli_real_escape_string($db, $_POST['pass']);
        $sql      = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user' AND password = md5('$pass')") or die($db->error);
        $data     = mysqli_fetch_array($sql);
        $rowSiswa = mysqli_num_rows($sql) > 0;

        // untuk guru
        $sqlPengajar  = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE username = '$user' AND password = md5('$pass')") or die($db->error);
        $dataPengajar = mysqli_fetch_array($sqlPengajar);
        $rowPengajar  = mysqli_num_rows($sqlPengajar) > 0;

        if ($rowSiswa) {
            if ($data['status'] == 'aktif') {
                @$_SESSION['siswa'] = $data['id_siswa'];
                echo "<script>window.location='./';</script>";
            } else {
                echo '<center><div class="alert alert-warning">Login gagal, akun Anda sedang tidak aktif</div><center>';
            }
        } 
        elseif ($rowPengajar) {
            if($dataPengajar['status'] == 'aktif') {
              header("Location: admin");
              @$_SESSION['pengajar'] = $dataPengajar['id_pengajar'];
            } else {
              echo "akun tidak aktif";
            }
        } else {
          echo '<center><div class="alert alert-danger">Login gagal, username / password salah, coba lagi!</div><center>';
        }
    }?>
			<div id="output"></div>
            <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p> -->
            <form method="post" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="user" placeholder="Username or Email address" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="pass" placeholder="Password" class="form-control border-0 shadow form-control-lg text-green">
              </div>
			  <button type="submit" name="login" value="login" class="btn btn-primary shadow px-5">Log in</button>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">&copy; SMA Pertiwi Kota Jambi <?=date('Y');?></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="assets/js/front.js"></script>
  </body>
</html>
<?php
}
?>