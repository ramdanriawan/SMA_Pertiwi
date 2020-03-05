

<section class="content-header mt-5">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-fw fa-user"></i> Data Siswa</li>
        </ol>
    </div>
</section>



<section class="content">
    <div class="container-fluid">
        <div class="header">


            <?php
$no = 1;
$id = @$_GET['id'];

if (@$_SESSION['admin']) {?>

            <?php
}

if (@$_GET['action'] == '') {

    if (@$_SESSION['admin']) {?>

            <?php
}?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card my-2">
                        <div class="card-header">
                            <?php
if (@$_GET['IDkelas'] == '') {
        echo '<a href="?page=siswa&action=tambah" class="btn btn-primary btn-sm">Tambah Data</a> <a href="./laporan/cetak.php?data=siswa" target="_blank" class="btn btn-default btn-sm">Cetak Data Siswa</a>';
    } else if (@$_GET['IDkelas'] != '') {
        echo "Data Siswa Kelas " . @$_GET['kelas'] . " &nbsp; <a href='?page=kelas' class='btn btn-warning btn-sm'>Kembali</a>";
    }?>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-hover" id="tb_siswa">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <?php if (@$_SESSION[admin]) {?>
                                            <th>Status</th>
                                            <?php }?>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

    if (@$_GET['IDkelas'] == '') {
        $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.status ") or die($db->error);
    } else if (@$_GET['IDkelas'] != '') {
        $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.status AND tb_siswa.id_kelas = '$_GET[IDkelas]'") or die($db->error);
    }

    if (mysqli_num_rows($sql_siswa) > 0) {
        while ($data_siswa = mysqli_fetch_array($sql_siswa)) {?>
                                        <tr>
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td><?php echo $data_siswa['nis']; ?></td>
                                            <td><?php echo $data_siswa['nama_lengkap']; ?></td>
                                            <td><?php echo $data_siswa['jenis_kelamin']; ?></td>
                                            <td><?php echo $data_siswa['alamat']; ?></td>
                                            <td align="center"><?php echo $data_siswa['nama_kelas']; ?></td>
                                            <?php if (@$_SESSION[admin]) {?>
                                            <td><?php echo ucfirst($data_siswa['status']); ?></td>
                                            <?php }?>
                                            <td align="center">
                                                <?php if (@$_SESSION[admin]) {?>
                                                <a href="?page=siswa&action=edit&id=<?php echo $data_siswa['id_siswa']; ?>"
                                                    class="btn btn-sm m-1" style="background-color:#f60;">Edit</a>
                                                <a onclick="return confirm('Yakin akan menghapus data ?');"
                                                    href="?page=siswa&action=hapus&id=<?php echo $data_siswa['id_siswa']; ?>"
                                                    class="btn btn-sm m-1" style="background-color:#f00;">Hapus</a>
                                                <?php }?>
                                                <a href="?page=siswa&action=detail&IDsiswa=<?php echo $data_siswa['id_siswa']; ?>"
                                                    class="btn btn-sm btn-dark m-1">Detail</a>
                                            </td>
                                        </tr>
                                        <?php
}
    } else {?>
                                        <tr>
                                            <td colspan="8" align="center">Data tidak ditemukan</td>
                                        </tr>
                                        <?php
}?>
                                    </tbody>
                                </table>
                                <script>

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
} else if (@$_GET['action'] == 'tambah') {
    ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card my-2">
                        <div class="card-header">Tambah Data Siswa &nbsp; <a href="?page=siswa"
                                class="btn btn-warning btn-sm">Kembali</a></div>
                        <div class="card-body">
                            <form method="post" action="?page=siswa&action=prosestambah" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIS *</label>
                                    <input type="text" name="nis" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap *</label>
                                    <input type="text" name="nama_lengkap" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir *</label>
                                    <input type="text" name="tempat_lahir" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir *</label>
                                    <input type="date" name="tgl_lahir" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin *</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama *</label>
                                    <select name="agama" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah *</label>
                                    <input type="text" name="nama_ayah" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu*</label>
                                    <input type="text" name="nama_ibu" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon *</label>
                                    <input type="text" name="no_telp" class="form-control" required />
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat *</label>
                                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kelas *</label>
                                    <select name="kelas" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <?php
$sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
    while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
        echo '<option value="' . $data_kelas['id_kelas'] . '">' . $data_kelas['nama_kelas'] . '</option>';
    }?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tahun Masuk*</label>
                                    <select name="thn_masuk" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <?php
for ($i = 2020; $i >= 2000; $i--) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="gambar" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" name="username" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" name="password" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Status Akun</label>
                                    <select name="status" class="form-control">
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-success"><i
                                            class="fa fa-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
} else if (@$_GET['action'] == 'prosestambah') {
    $nis           = @mysqli_real_escape_string($db, $_POST['nis']);
    $nama_lengkap  = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
    $tempat_lahir  = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
    $tgl_lahir     = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
    $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
    $agama         = @mysqli_real_escape_string($db, $_POST['agama']);
    $nama_ayah     = @mysqli_real_escape_string($db, $_POST['nama_ayah']);
    $nama_ibu      = @mysqli_real_escape_string($db, $_POST['nama_ibu']);
    $no_telp       = @mysqli_real_escape_string($db, $_POST['no_telp']);
    $email         = @mysqli_real_escape_string($db, $_POST['email']);
    $alamat        = @mysqli_real_escape_string($db, $_POST['alamat']);
    $kelas         = @mysqli_real_escape_string($db, $_POST['kelas']);
    $thn_masuk     = @mysqli_real_escape_string($db, $_POST['thn_masuk']);
    $username      = @mysqli_real_escape_string($db, $_POST['username']);
    $password      = @mysqli_real_escape_string($db, $_POST['password']);
    $status        = @mysqli_real_escape_string($db, $_POST['status']);

    $sumber      = @$_FILES['gambar']['tmp_name'];
    $target      = '../img/foto_siswa/';
    $nama_gambar = @$_FILES['gambar']['name'];

    // validasi gambar yang diperbolehkan
    $type_allowed = ['image/jpeg', 'image/png', 'image/jpg'];
                    
    if ( !in_array( $_FILES['gambar']['type'],  $type_allowed) ) {
        echo '<script>alert("Gagal mengupload gambar, file hanya boleh type png, jpeg saja!");</script>';
        
        header('Refresh:0');
    }

    // cek jika username ada
    $find = mysqli_query($db, "select * from tb_siswa where username='$username'");
    if( mysqli_fetch_array($find) ) {
        echo "<script>alert(\"Username $username sudah ada, silahkan coba username lain!\");</script>";
        
        header('Refresh:0');
    }
    // die('okk2');

    if ($nama_gambar != '') {
        if (move_uploaded_file($sumber, $target . $nama_gambar)) {
            mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$nama_ayah', '$nama_ibu', '$no_telp', '$email', '$alamat', '$kelas', '$thn_masuk', '$nama_gambar', '$username', md5('$password'), '$password','$status')") or die($db->error);
            echo '<script>window.location="?page=siswa";</script>';
        } else {
            echo '<script>alert("Gagal menambah data siswa, foto gagal diupload, coba lagi!"); window.location="?page=siswa";</script>';
        }
    } else {
        mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$nama_ayah', '$nama_ibu', '$no_telp', '$email', '$alamat', '$kelas', '$thn_masuk', '$nama_gambar', '$username', md5('$password'), '$password', '$status')") or die($db->error);
        echo '<script>window.location="?page=siswa";</script>';
    }
    ?>

            <?php
} else if (@$_GET['action'] == 'edit') {
    $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$id'") or die($db->error);
    $data      = mysqli_fetch_array($sql_siswa);
    ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card my-2">
                        <div class="card-header"> Edit Data Siswa &nbsp; <a href="?page=siswa"
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
                                        <option value="P" <?php if ($data['jenis_kelamin'] == 'P') {echo "selected";}?>>
                                            Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Agama* </label>
                                    <select name="agama" class="form-control" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen"
                                            <?php if ($data['agama'] == 'Kristen') {echo "selected";}?>>Kristen</option>
                                        <option value="Katholik"
                                            <?php if ($data['agama'] == 'Katholik') {echo "selected";}?>>Katholik
                                        </option>
                                        <option value="Hindu" <?php if ($data['agama'] == 'Hindu') {echo "selected";}?>>
                                            Hindu</option>
                                        <option value="Budha" <?php if ($data['agama'] == 'Budha') {echo "selected";}?>>
                                            Budha</option>
                                        <option value="Konghucu"
                                            <?php if ($data['agama'] == 'Konghucu') {echo "selected";}?>>Konghucu
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
$sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
    while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
        echo '<option value="' . $data_kelas['id_kelas'] . '">' . $data_kelas['nama_kelas'] . '</option>';
    }?>
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
        echo '<option value="' . $i . '">' . $i . '</option>';
    }?>
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
                                    <label>Status Akun</label>
                                    <select name="status" class="form-control">
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif"
                                            <?php if ($data['status'] == 'tidak aktif') {echo "selected";}?>>Tidak Aktif
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="simpan" value="Simpan" class="btn btn-success"><i
                                            class="fa fa-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                </div>
                            </form>
                            <?php
if (@$_POST['simpan']) {
        $nis           = @mysqli_real_escape_string($db, $_POST['nis']);
        $nama_lengkap  = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
        $tempat_lahir  = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
        $tgl_lahir     = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
        $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
        $agama         = @mysqli_real_escape_string($db, $_POST['agama']);
        $nama_ayah     = @mysqli_real_escape_string($db, $_POST['nama_ayah']);
        $nama_ibu      = @mysqli_real_escape_string($db, $_POST['nama_ibu']);
        $no_telp       = @mysqli_real_escape_string($db, $_POST['no_telp']);
        $email         = @mysqli_real_escape_string($db, $_POST['email']);
        $alamat        = @mysqli_real_escape_string($db, $_POST['alamat']);
        $kelas         = @mysqli_real_escape_string($db, $_POST['kelas']);
        $thn_masuk     = @mysqli_real_escape_string($db, $_POST['thn_masuk']);
        $user          = @mysqli_real_escape_string($db, $_POST['user']);
        $pass          = @mysqli_real_escape_string($db, $_POST['pass']);
        $status        = @mysqli_real_escape_string($db, $_POST['status']);

        $sumber      = @$_FILES['gambar']['tmp_name'];
        $target      = 'img/foto_siswa/';
        $nama_gambar = @$_FILES['gambar']['name'];

		// validasi gambar yang diperbolehkan
		$type_allowed = ['image/jpeg', 'image/png', 'image/jpg'];
						
		if ( !in_array( $_FILES['gambar']['type'],  $type_allowed) ) {
			echo '<script>alert("Gagal mengupload gambar, file hanya boleh type png, jpeg, jpg saja!");</script>';
			
			header('Refresh:0');
		}

        if ($nama_gambar == '') {
            mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', no_telp = '$no_telp', email = '$email', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', username = '$user', password = md5('$pass'), pass = '$pass', status = '$status' WHERE id_siswa = '$id'") or die($db->error);
            echo '<script>window.location="?page=siswa";</script>';
        } else {
            if (move_uploaded_file($sumber, $target . $nama_gambar)) {
                mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', no_telp = '$no_telp', email = '$email', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', foto = '$nama_gambar', username = '$user', password = md5('$pass'), pass = '$pass', status = '$status' WHERE id_siswa = '$id'") or die($db->error);
                echo '<script>window.location="?page=siswa";</script>';
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
} else if (@$_GET['action'] == 'hapus') {
    mysqli_query($db, "DELETE FROM tb_siswa WHERE id_siswa = '$id'") or die($db->error);
    echo "<script>window.location='?page=siswa';</script>";
} else if (@$_GET['action'] == 'detail') {
    $sql_siswa_per_id = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$_GET[IDsiswa]'") or die($db->error);
    $data             = mysqli_fetch_array($sql_siswa_per_id);
    ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-2">
                        <div class="card-header">Detail Data Siswa <a href="?page=siswa"
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
                                        <td><?php echo $data['tempat_lahir'] . ", " . tgl_indo($data['tgl_lahir']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Jenis Kelamin</b></td>
                                        <td align="center">:</td>
                                        <td><?php if ($data['jenis_kelamin'] == 'L') {echo "Laki-laki";} else {echo "Perempuan";}?>
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
                                    <?php if (@$_SESSION[admin]) {?>
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
                                    <tr>
                                        <td align="right"><b>Status</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo ucfirst($data['status']); ?></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}?>
        </div>
    </div>
</section>