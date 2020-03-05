<?php 
// inisialisasi data siswa
$sqlSiswa = mysqli_query($db, "select * from tb_siswa where id_siswa = $_SESSION[siswa]");
$siswa = mysqli_fetch_object($sqlSiswa);

// kodingan untuk data di beranda supaya gak kosong
$sqlTotalTugasQuiz = mysqli_query($db, "select COUNT(*) as total from tb_topik_quiz where id_kelas = $siswa->id_kelas ");
$totalTugasQuiz = mysqli_fetch_object($sqlTotalTugasQuiz);

$sqlTotalNilaiEssay = mysqli_query($db, "select COUNT(*) as total from tb_nilai_essay where id_siswa = $siswa->id_siswa ");
$totalNilaiEssay = mysqli_fetch_object($sqlTotalNilaiEssay);

$sqlTotalNilaiPilgan = mysqli_query($db, "select COUNT(*) as total from tb_nilai_pilgan where id_siswa = $siswa->id_siswa ");
$totalNilaiPilgan = mysqli_fetch_object($sqlTotalNilaiPilgan);

$sqlTotalMateri = mysqli_query($db, "select COUNT(*) as total from tb_file_materi where id_kelas = $siswa->id_kelas ");
$totalMateri = mysqli_fetch_object($sqlTotalMateri);

?>

<section class="content-header mt-5">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Beranda</li>

        </ol>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="header">

            <?php
$sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$_SESSION[siswa]'") or die ($db->error);
$data = mysqli_fetch_array($sql_siswa);

if(@$_GET['hal'] == '') { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Selamat Datang,
                            <?php echo $data_terlogin['nama_lengkap']; ?>!</h4>

                        Selamat datang di E-Learning SMA Pertiwi Kota Jambi Kota Jambi.<br />
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
} else if(@$_GET['hal'] == 'detailprofil') { ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card my-2">
                        <div class="card-header">Detail Data Siswa <a href="?page"
                                class="btn btn-warning btn-sm">Kembali</a></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <tr>
                                        <td align="right" width="46%"><b>NIS</b></td>
                                        <td align="center">:</td>
                                        <td width="46%"><?php echo $data['nis']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Nama Lengkap</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Tempat Tanggal Lahir</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Jenis Kelamin</b></td>
                                        <td align="center">:</td>
                                        <td><?php if($data['jenis_kelamin'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Agama</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Nama Ayah</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Nama Ibu</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Nomor Telepon</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['no_telp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Email</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Alamat</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Kelas</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_kelas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Tahun Masuk</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['thn_masuk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top"><b>Foto</b></td>
                                        <td align="center" valign="top">:</td>
                                        <td>
                                            <div style="padding:10px 0;"><img width="250px"
                                                    src="img/foto_siswa/<?php echo $data['foto']; ?>" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Username</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Password</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['pass']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
} else if(@$_GET['hal'] == 'editprofil') { ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card my-2">
                        <div class="card-header"> Edit Profil &nbsp; <a href="?page"
                                class="btn btn-warning btn-sm">Kembali</a></div>
                        <div class="card-body">

                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIS*</label>
                                    <input type="text" name="nis" value="<?php echo $data['nis']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap*</label>
                                    <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir*</label>
                                    <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir*</label>
                                    <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin*</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P"
                                            <?php if($data['jenis_kelamin'] == 'P') { echo "selected"; } ?>>Perempuan
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Agama* </label>
                                    <select name="agama" class="form-control" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen"
                                            <?php if($data['agama'] == 'Kristen') { echo "selected"; } ?>>Kristen
                                        </option>
                                        <option value="Katholik"
                                            <?php if($data['agama'] == 'Katholik') { echo "selected"; } ?>>Katholik
                                        </option>
                                        <option value="Hindu"
                                            <?php if($data['agama'] == 'Hindu') { echo "selected"; } ?>>Hindu</option>
                                        <option value="Budha"
                                            <?php if($data['agama'] == 'Budha') { echo "selected"; } ?>>Budha</option>
                                        <option value="Konghucu"
                                            <?php if($data['agama'] == 'Konghucu') { echo "selected"; } ?>>Konghucu
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Ayah*</label>
                                    <input type="text" name="nama_ayah" value="<?php echo $data['nama_ayah']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Nama Ibu*</label>
                                    <input type="text" name="nama_ibu" value="<?php echo $data['nama_ibu']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telepon </label>
                                    <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $data['email']; ?>"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Alamat*</label>
                                    <textarea name="alamat" class="form-control" rows="3"
                                        required><?php echo $data['alamat']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Kelas* </label>
                                    <select name="kelas" class="form-control" required>
                                        <option value="<?php echo $data['id_kelas']; ?>">
                                            <?php echo $data['nama_kelas']; ?></option>
                                        <option value="">- Pilih -</option>
                                        <?php
                    $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die ($db->error);
                    while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                    } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tahun Masuk*</label>
                                    <select name="thn_masuk" class="form-control" required>
                                        <option value="<?php echo $data['thn_masuk']; ?>">
                                            <?php echo $data['thn_masuk']; ?></option>
                                        <option value="">- Pilih -</option>
                                        <?php
                    for ($i = 2020; $i >= 2000; $i--) { 
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Foto </label>
                                    <br /><img src="./img/foto_siswa/<?php echo $data['foto']; ?>" width="150px"
                                        style="margin-bottom:5px;" /><input type="file" name="gambar"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Username*</label>
                                    <input type="text" name="user" value="<?php echo $data['username']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="text" name="pass" value="<?php echo $data['pass']; ?>"
                                        class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="simpan" value="Simpan" class="btn btn-success"><i
                                            class="fa fa-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                </div>
                            </form>
                            <?php
            if(@$_POST['simpan']) {
                $nis = @mysqli_real_escape_string($db, $_POST['nis']);
                $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                $agama = @mysqli_real_escape_string($db, $_POST['agama']);
                $nama_ayah = @mysqli_real_escape_string($db, $_POST['nama_ayah']);
                $nama_ibu = @mysqli_real_escape_string($db, $_POST['nama_ibu']);
                $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                $email = @mysqli_real_escape_string($db, $_POST['email']);
                $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                $thn_masuk = @mysqli_real_escape_string($db, $_POST['thn_masuk']);
                $user = @mysqli_real_escape_string($db, $_POST['user']);
                $pass = @mysqli_real_escape_string($db, $_POST['pass']);

                $sumber = @$_FILES['gambar']['tmp_name'];
                $target = 'img/foto_siswa/';
                $nama_gambar = @$_FILES['gambar']['name'];

                if($nama_gambar == '') {
                    mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', no_telp = '$no_telp', email = '$email', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', username = '$user', password = md5('$pass'), pass = '$pass' WHERE id_siswa = '$_SESSION[siswa]'") or die ($db->error);          
                    echo '<script>window.location="?hal=detailprofil";</script>';
                } else {
                    if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                        mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', no_telp = '$no_telp', email = '$email', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', foto = '$nama_gambar', username = '$user', password = md5('$pass'), pass = '$pass' WHERE id_siswa = '$_SESSION[siswa]'") or die ($db->error);           
                        echo '<script>window.location="?hal=detailprofil";</script>';
                    } else {
                        echo '<script>alert("Gagal mengedit info profil, foto gagal diupload, coba lagi!");</script>';
                    }
                }
            }
            ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
} ?>

        </div>
    </div>
</section>