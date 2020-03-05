<?php
@session_start(); 
// print_r($_SERVER); die();
include "+koneksi.php";
if(@$_SESSION['admin'] || @$_SESSION['pengajar']) {
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
  <link rel="shortcut icon" href="../assets/img/favicon.ico">
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Google fonts - Popppins for copy-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
  <!-- orion icons-->
  <link rel="stylesheet" href="../assets/css/orionicons.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../assets/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <script src="/style/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <?php
  if(@$_SESSION['admin']) {
      $sesi_id = @$_SESSION['admin'];
      $level = "admin";
  } else if(@$_SESSION['pengajar']) {
      $sesi_id = @$_SESSION['pengajar'];
      $level = "pengajar";
  }
  ?>
  <!-- navbar-->
  <header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
      <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a
        href="#" class="navbar-brand font-weight-bold text-base">E-Learning SMA Pertiwi Kota Jambi</a>
      <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
        <!-- <li class="nav-item">
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">
                <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li> -->
        <li class="nav-item dropdown ml-auto">
          <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="nav-link dropdown-toggle">
            <img src="img/<?php cek_session("foto_pengajar","foto_pengajar"); ?>/<?php
                if($level == 'admin') {
                $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$sesi_id'") or die ($db->error);
                } 
                else if($level == 'pengajar') {
                $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$sesi_id'") or die ($db->error);
                }
              $data_terlogin = mysqli_fetch_array($sql_terlogin);
              
              if(empty($data_terlogin['foto'])){
                echo ucfirst('anonim.png');
              }
              else{
                echo ucfirst($data_terlogin['foto']);
              }
              ?>" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow" /></a>
          <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong
                class="d-block headings-font-family">
                <?php
              if($level == 'admin') {
                  $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$sesi_id'") or die ($db->error);
              } else if($level == 'pengajar') {
                  $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$sesi_id'") or die ($db->error);
              }
              $data_terlogin = mysqli_fetch_array($sql_terlogin);
              echo ucfirst($data_terlogin['nama_lengkap']);
              ?>
              </strong></a>
            <div class="dropdown-divider"></div><a href="?hal=editprofil" class="dropdown-item">Edit Profil</a>
            <div class="dropdown-divider"></div><a
              href="<?php cek_session('inc/logout.php?sesi=admin', 'inc/logout.php?sesi=pengajar'); ?>"
              class="dropdown-item">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar py-3">
      <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
      <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item"><a href="/admin"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == '') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-home mr-3 text-gray"></i><span>Home</span></a></li>
        <?php if(@$_SESSION['admin']) { ?>
        <li class="sidebar-list-item"><a href="?page=pengajar"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'pengajar') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-chalkboard-teacher mr-3 text-gray"></i><span>Data Pengajar</span></a></li>
        <li class="sidebar-list-item"><a href="?page=siswa"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'siswa') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-user mr-3 text-gray"></i><span>Data Siswa</span></a></li>
        <?php } ?>
        <li class="sidebar-list-item"><a href="?page=kelas"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'kelas') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-chalkboard mr-3 text-gray"></i><span>Data Kelas</span></a></li>
        <li class="sidebar-list-item"><a href="?page=mapel"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'mapel') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-receipt mr-3 text-gray"></i></i><span>Data Mapel</span></a></li>
             <li class="sidebar-list-item"><a href="?page=materi"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'materi') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-book mr-3 text-gray"></i></i><span>Data Materi</span></a></li>
        <li class="sidebar-list-item"><a href="?page=quiz"
            class="sidebar-link text-muted <?php if(@$_GET['page'] == 'quiz') { echo 'active'; } ?>">
            <i class="fa fa-fw fa-clipboard mr-3 text-gray"></i></i><span>Data Quis</span></a></li>
      </ul>
    </div>
    <div class="page-holder w-100 d-flex flex-wrap">
      <div class="container-fluid px-xl-5">
        <section class="content-wrapper">
          <!-- <div class="row"> -->

          <?php
            if(@$_GET['page'] == '') {
                include "inc/beranda.php";
            } else if(@$_GET['page'] == 'pengajar') {
                include "inc/pengajar.php";
            } else if(@$_GET['page'] == 'siswaregistrasi') {
                include "inc/siswaregistrasi.php";
            } else if(@$_GET['page'] == 'siswa') {
                include "inc/siswa.php";
            } else if(@$_GET['page'] == 'kelas') {
                include "inc/kelas.php";
            } else if(@$_GET['page'] == 'mapel') {
                include "inc/mapel.php";
            } else if(@$_GET['page'] == 'quiz') {
                include "inc/quiz.php";
            } else if(@$_GET['page'] == 'materi') {
                include "inc/materi.php";
            } else if(@$_GET['page'] == 'berita') {
                include "inc/berita.php";
            } else {
                echo "<div class='col-xs-12'><div class='alert alert-danger'>[404] Halaman tidak ditemukan! Silahkan pilih menu yang ada!</div></div>";
            } ?>

          <!-- </div> -->
        </section>

      </div>
      <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 text-center text-md-left text-primary">
              <p class="mb-2 mb-md-0">&copy; SMA Pertiwi Kota Jambi <?= date('Y') ?></p>
            </div>
            <div class="col-md-6 text-center text-md-right text-gray-400">
              <p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates"
                  class="external text-gray-400">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script> -->
  <script src="/style/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <!-- <script src="../assets/vendor/chart.js/Chart.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

  <!-- <script src="../assets/js/charts-home.js"></script> -->
  <script src="../assets/js/front.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#tb_pengajar').DataTable();
      $('#tb_siswa').DataTable();
      $('#tb_quis').DataTable();
      $('#tb_mapel').DataTable();
      $('#tb_kelas').DataTable();
      $('#tb_materi').DataTable();
      $('#tb_essay').DataTable();
    });
  </script>

</body>

</html>
<?php
} else {
 include "login.php";
}
?>