<?php 
error_reporting(0);
// print_r($_SESSION); die();
// inisialisasi data pengajar
$sqlPengajar = mysqli_query($db, "select * from tb_pengajar where id_pengajar = $_SESSION[pengajar]");
$pengajar = mysqli_fetch_object($sqlPengajar);

// print_r($pengajar); die();
// kodingan untuk data di beranda supaya gak kosong
$sqlTotalTugasQuiz = mysqli_query($db, "select COUNT(*) as total from tb_topik_quiz where pembuat = $pengajar->id_pengajar ");
$totalTugasQuiz = mysqli_fetch_object($sqlTotalTugasQuiz);

$sqlTotalNilaiEssay = mysqli_query($db, "select COUNT(*) as total from tb_nilai_essay JOIN tb_topik_quiz ON tb_nilai_essay.id_tq=tb_topik_quiz.id_tq where tb_topik_quiz.pembuat = $pengajar->id_pengajar ");
$totalNilaiEssay = mysqli_fetch_object($sqlTotalNilaiEssay);

$sqlTotalNilaiPilgan = mysqli_query($db, "select COUNT(*) as total from tb_nilai_pilgan JOIN tb_topik_quiz ON tb_nilai_pilgan.id_tq=tb_topik_quiz.id_tq where tb_topik_quiz.pembuat = $pengajar->id_pengajar");
$totalNilaiPilgan = mysqli_fetch_object($sqlTotalNilaiPilgan);

$sqlTotalMateri = mysqli_query($db, "select COUNT(*) as total from tb_file_materi JOIN tb_mapel_ajar ON tb_file_materi.id_mapel=tb_mapel_ajar.id_mapel where id_pengajar = $pengajar->id_pengajar ");
$totalMateri = mysqli_fetch_object($sqlTotalMateri);

?>


<section class="content-header mt-5">
  <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        
      </ol>
   </div>
</section>

<?php 
    if(@$_SESSION['admin']) {
    
    if(@$_GET['hal'] == '') { ?>

<section class="py-5">
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Pengajar</h6>
                      <span class="text-gray">
                      <?php
                      $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar") or die ($db->error);
                      echo mysqli_num_rows($sql_pengajar);
                      ?> Pengajar
                      </span>
                    </div>
                  </div>
                  <div class="icon text-white bg-violet"><i class="fas fa-chalkboard-teacher"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Siswa</h6>
                      <span class="text-gray">
                      <?php
                      $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa") or die ($db->error);
                      echo mysqli_num_rows($sql_siswa);
                      ?>
                      </span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="fas fa-user"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Quis</h6>
                      <span class="text-gray">
                      <?php
                      $sql_quiz = mysqli_query($db, "SELECT * FROM tb_topik_quiz") or die ($db->error);
                      echo mysqli_num_rows($sql_quiz);
                      ?>
                      </span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="far fa-clipboard"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Materi</h6>
                      <span class="text-gray">
                      <?php
                      $sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi") or die ($db->error);
                      echo mysqli_num_rows($sql_materi);
                      ?>
                      </span>
                    </div>
                  </div>
                  <div class="icon text-white bg-red"><i class="fas fa-book"></i></div>
                </div>
              </div>
            </div>
          </section>
    
    <?php
    } else if(@$_GET['hal'] == 'editprofil') {
        $sql_admin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[admin]'") or die ($db->error);
        $data = mysqli_fetch_array($sql_admin);
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header">Edit Profil &nbsp; <a href="./" class="btn btn-warning btn-sm">Kembali</a></div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon *</label>
                                <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" value="<?php echo $data['pass']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if(@$_POST['simpan']) {
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                            $email = @mysqli_real_escape_string($db, $_POST['email']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            mysqli_query($db, "UPDATE tb_admin SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', no_telp = '$no_telp', email = '$email', username = '$username', password = md5('$password'), pass = '$password' WHERE id_admin = '$_SESSION[admin]'") or die ($db->error);          
                            echo '<script>window.location="./";</script>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

} else if(@$_SESSION['pengajar']) {

    $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
    $data = mysqli_fetch_array($sql_pengajar);
    
    if(@$_GET['hal'] == '') { ?> 
    <div class="row">
        <div class="col-lg-12">
			<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Selamat Datang, <?php echo $data_terlogin['nama_lengkap']; ?> !</h4>
              </div>
        </div>
    </div>

    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tugas / Quiz
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $totalTugasQuiz->total; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Soal Essay
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $totalNilaiEssay->total; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-table fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Soal Pilgan
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php echo $totalNilaiPilgan->total; ?></div>
                        </div>

                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-table fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Materi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $totalMateri->total; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-receipt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
    <?php
    } else if(@$_GET['hal'] == 'editprofil') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header">Edit Profil &nbsp; <a href="./" class="btn btn-warning btn-sm">Kembali</a></div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIP *</label>
                                <input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P" <?php if($data['jenis_kelamin'] == 'P') { echo "selected"; } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama *</label>
                                <select name="agama" class="form-control" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen" <?php if($data['agama'] == 'Kristen') { echo "selected"; } ?>>Kristen</option>
                                    <option value="Katholik" <?php if($data['agama'] == 'Katholik') { echo "selected"; } ?>>Katholik</option>
                                    <option value="Hindu" <?php if($data['agama'] == 'Hindu') { echo "selected"; } ?>>Hindu</option>
                                    <option value="Budha" <?php if($data['agama'] == 'Budha') { echo "selected"; } ?>>Budha</option>
                                    <option value="Konghucu" <?php if($data['agama'] == 'Konghucu') { echo "selected"; } ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon *</label>
                                <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" placeholder="Ex. codingyuk@gmail.com" />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div style="padding:0 0 5px 0;"><img width="200px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                                <input type="file" name="gambar" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="url" name="web" value="<?php echo $data['web']; ?>" class="form-control" placeholder="Ex. http://ningali-tv.blogspot.com" />
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" value="<?php echo $data['pass']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if(@$_POST['simpan']) {
                            $nip = @mysqli_real_escape_string($db, $_POST['nip']);
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                            $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                            $agama = @mysqli_real_escape_string($db, $_POST['agama']);
                            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                            $email = @mysqli_real_escape_string($db, $_POST['email']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $web = @mysqli_real_escape_string($db, $_POST['web']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            $sumber = @$_FILES['gambar']['tmp_name'];
                            $target = 'img/foto_pengajar/';
                            $nama_gambar = @$_FILES['gambar']['name'];

                            if($nama_gambar == '') {
                                mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_telp = '$no_telp', email = '$email', alamat = '$alamat', web = '$web', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);          
                                echo '<script>window.location="./";</script>';
                            } else {
                                if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                                    mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_telp = '$no_telp', email = '$email', alamat = '$alamat', foto = '$nama_gambar', web = '$web', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);           
                                    echo '<script>window.location="./";</script>';
                                } else {
                                    echo '<script>alert("Gagal mengedit info profil, foto gagal diupload, coba lagi!");</script>';
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} ?>

			</div>                   
    </div>           
</section>