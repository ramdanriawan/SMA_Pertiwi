<?php
// print_r($_FILES); die();
if(@$_SESSION['admin']) { ?>

<section class="content-header mt-5">
  <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-chalkboard-teacher"></i> Data Guru</li>
        
      </ol>
   </div>
</section>

<section class="content">
    <div class="container-fluid">
            <div class="header">

<div class="row">
	<?php
	$id = @$_GET['id'];
	$sql_per_id = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$id'") or die ($db->error);
	$data = mysqli_fetch_array($sql_per_id);

	if(@$_GET['action'] == '') { ?>

    <div class="col-md-12">
        <div class="card my-2">
            <div class="card-header"><a href="?page=pengajar&action=tambah" class="btn btn-primary btn-sm">Tambah Data</a> <a href="./laporan/cetak.php?data=pengajar" target="_blank" class="btn btn-default btn-sm">Cetak Data Guru</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover" id="tb_pengajar">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar") or die ($db->error);
                        if(mysqli_num_rows($sql_pengajar) > 0) {
	                        while($data_pengajar = mysqli_fetch_array($sql_pengajar)) {
	                        ?>
	                            <tr>
	                                <td><?php echo $no++; ?></td>
	                                <td><?php echo $data_pengajar['nip']; ?></td>
	                                <td><?php echo $data_pengajar['nama_lengkap']; ?></td>
	                                <td><?php echo $data_pengajar['jenis_kelamin']; ?></td>
	                                <td><?php echo ucfirst($data_pengajar['status']); ?></td>
	                                <td align="center" width="170px">
	                                    <a href="?page=pengajar&action=edit&id=<?php echo $data_pengajar['id_pengajar']; ?>" class="btn btn-sm m-1" style="background-color:#f60;">Edit</a>
	                                    <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=pengajar&action=hapus&id=<?php echo $data_pengajar['id_pengajar']; ?>" class="btn btn-sm m-1" style="background-color:#f00;">Hapus</a>
	                                    <a href="?page=pengajar&action=detail&id=<?php echo $data_pengajar['id_pengajar']; ?>" class="btn btn-sm btn-dark m-1">Detail</a>
	                                </td>
	                            </tr>
	                        <?php
		                    }
		                } else {
		                	?>
							<tr>
                                <td colspan="6" align="center">Data tidak ditemukan</td>
							</tr>
		                	<?php
		                }
	                    ?>
                        </tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
    <?php
	} else if(@$_GET['action'] == 'detail') {
		?>
		<div class="col-md-12">
	        <div class="card my-2">
	            <div class="card-header">Detail Data Pengajar &nbsp; <a href="?page=pengajar" class="btn btn-warning btn-sm">Kembali</a></div>
	            <div class="card-body">
	            	<div class="table-responsive">
                        <table width="100%">
                        	<tr>
                        		<td align="right" width="46%"><b>NIP</b></td>
                        		<td align="center">:</td>
                        		<td width="46%"><?php echo $data['nip']; ?></td>
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
                        		<td><?php if($data['jenis_kelamin'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?></td>
                        	</tr>
                        	<tr>
                        		<td align="right"><b>Agama</b></td>
                        		<td align="center">:</td>
                        		<td><?php echo $data['agama']; ?></td>
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
                        		<td align="right"><b>Jabatan</b></td>
                        		<td align="center">:</td>
                        		<td><?php echo $data['jabatan']; ?></td>
                        	</tr>
                        	<tr>
                        		<td align="right" valign="top"><b>Foto</b></td>
                        		<td align="center" valign="top">:</td>
                        		<td>
                        			<div style="padding:10px 0;"><img width="250px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td align="right"><b>Website</b></td>
                        		<td align="center">:</td>
                        		<td><?php echo $data['web']; ?></td>
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
                        	<tr>
                        		<td align="right"><b>Status</b></td>
                        		<td align="center">:</td>
                        		<td><?php echo ucfirst($data['status']); ?></td>
                        	</tr>
                        </table>
                    </div>
	            </div>
		    </div>
		</div>
		<?php
	} else if(@$_GET['action'] == 'tambah') {
		?>
		<div class="col-md-6">
	        <div class="card my-2">
	            <div class="card-header">Tambah Data Pengajar &nbsp; <a href="?page=pengajar" class="btn btn-warning btn-sm">Kembali</a></div>
	            <div class="card-body">
					<form method="post" action="?page=pengajar&action=prosestambah" enctype="multipart/form-data">
      					<div class="form-group">
                            <label>NIP *</label>
                            <input type="text" name="nip" class="form-control" required />
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
                            <label>Nomor Telepon *</label>
                            <input type="text" name="no_telp" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" />
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jabatan *</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Ex: Guru PKn" required />
                        </div>
						<div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="gambar" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" name="web" class="form-control" placeholder="http://example.com" />
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
	                        <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
	                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
	            </div>
		    </div>
		</div>
		<?php
	} else if(@$_GET['action'] == 'prosestambah') {
		$nip = @mysqli_real_escape_string($db, $_POST['nip']);
		$nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
		$tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
		$tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
		$jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
		$agama = @mysqli_real_escape_string($db, $_POST['agama']);
		$no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
		$email = @mysqli_real_escape_string($db, $_POST['email']);
		$alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
		$jabatan = @mysqli_real_escape_string($db, $_POST['jabatan']);
		$web = @mysqli_real_escape_string($db, $_POST['web']);
		$username = @mysqli_real_escape_string($db, $_POST['username']);
		$password = @mysqli_real_escape_string($db, $_POST['password']);
		$status = @mysqli_real_escape_string($db, $_POST['status']);

		$sumber = @$_FILES['gambar']['tmp_name'];
		$target = 'img/foto_pengajar/';
		$nama_gambar = @$_FILES['gambar']['name'];

		// validasi gambar yang diperbolehkan
		$type_allowed = ['image/jpeg', 'image/png', 'image/jpg'];
						
		if ( !in_array( $_FILES['gambar']['type'],  $type_allowed) ) {
			echo '<script>alert("Gagal mengupload gambar, file hanya boleh type png, jpeg, jpg saja!");</script>';
			
			header('Refresh:0');
		}

		// cek jika username ada
		$find = mysqli_query($db, "select * from tb_pengajar where username='$username'");
		if( mysqli_fetch_array($find) ) {
			echo "<script>alert(\"Username $username sudah ada, silahkan coba username lain!\");</script>";
			
			header('Refresh:0');
		}
		// die('okk2');
		// die('okk2');

		if($nama_gambar != '') {
			if(move_uploaded_file($sumber, $target.$nama_gambar)) {
				mysqli_query($db, "INSERT INTO tb_pengajar VALUES(null, '$nip', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$no_telp', '$email', '$alamat', '$jabatan', '$nama_gambar', '$web', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
				echo '<script>window.location="?page=pengajar";</script>';
			} else {
				echo '<script>alert("Gagal menambah data pengajar, foto gagal diupload, coba lagi!"); window.location="?page=pengajar";</script>';
			}
		} else {
			mysqli_query($db, "INSERT INTO tb_pengajar VALUES(null, '$nip', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$no_telp', '$email', '$alamat', '$jabatan', 'anonim.png', '$web', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
			echo '<script>window.location="?page=pengajar";</script>';
		}
	} else if(@$_GET['action'] == 'edit') {
		?>
		<div class="col-md-6">
	        <div class="card my-2">
	            <div class="card-header">Edit Data Pengajar &nbsp; <a href="?page=pengajar" class="btn btn-warning btn-sm">Kembali</a></div>
	            <div class="card-body">
					<form method="post" action="?page=pengajar&action=prosesedit&id=<?php echo $data['id_pengajar']; ?>" enctype="multipart/form-data">
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
                            <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" placeholder="example@mail.com" />
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jabatan *</label>
                            <input type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>" class="form-control" required />
                        </div>
						<div class="form-group">
                            <label>Foto</label>
                            <div style="padding:0 0 5px 0;"><img width="200px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                            <input type="file" name="gambar" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" name="web" value="<?php echo $data['web']; ?>" class="form-control" placeholder="http://example.com" />
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
                            <label>Status Akun</label>
                            <select name="status" class="form-control">
								<option value="aktif">Aktif</option>
								<option value="tidak aktif" <?php if($data['status'] == 'tidak aktif') { echo "selected"; } ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
	                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
	                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
	            </div>
		    </div>
		</div>
		<?php
	} else if(@$_GET['action'] == 'prosesedit') {
		$nip = @mysqli_real_escape_string($db, $_POST['nip']);
		$nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
		$tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
		$tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
		$jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
		$agama = @mysqli_real_escape_string($db, $_POST['agama']);
		$no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
		$email = @mysqli_real_escape_string($db, $_POST['email']);
		$alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
		$jabatan = @mysqli_real_escape_string($db, $_POST['jabatan']);
		$web = @mysqli_real_escape_string($db, $_POST['web']);
		$username = @mysqli_real_escape_string($db, $_POST['username']);
		$password = @mysqli_real_escape_string($db, $_POST['password']);
		$status = @mysqli_real_escape_string($db, $_POST['status']);

		$sumber = @$_FILES['gambar']['tmp_name'];
		$target = 'img/foto_pengajar/';
		$nama_gambar = @$_FILES['gambar']['name'];

		// validasi gambar yang diperbolehkan
		$type_allowed = ['image/jpeg', 'image/png', 'image/jpg'];

		if ( !in_array( $_FILES['gambar']['type'],  $type_allowed) ) {
			echo '<script>alert("Gagal mengupload gambar, file hanya boleh type png, jpeg, jpg saja!");</script>';
			
			header('Refresh:0');
		}

		if($nama_gambar == '') {
			mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_telp = '$no_telp', email = '$email', alamat = '$alamat', jabatan = '$jabatan', web = '$web', username = '$username', password = md5('$password'), pass = '$password', status = '$status' WHERE id_pengajar = '$id'") or die ($db->error);			
			echo '<script>window.location="?page=pengajar";</script>';
		} else {
			if(move_uploaded_file($sumber, $target.$nama_gambar)) {
				mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_telp = '$no_telp', email = '$email', alamat = '$alamat', jabatan = '$jabatan', foto = '$nama_gambar', web = '$web', username = '$username', password = md5('$password'), pass = '$password', status = '$status' WHERE id_pengajar = '$id'") or die ($db->error);			
				echo '<script>window.location="?page=pengajar";</script>';
			} else {
				echo '<script>alert("Gagal mengedit data pengajar, foto gagal diupload, coba lagi!"); window.location="?page=pengajar";</script>';
			}
		}
	} else if(@$_GET['action'] == 'hapus') {
		mysqli_query($db, "DELETE FROM tb_pengajar WHERE id_pengajar = '$id'") or die ($db->error);
		echo '<script>window.location="?page=pengajar";</script>';
	}
	?>
</div>

<?php
} else { ?>
	<div class="row">
	    <div class="col-xs-12">
	        <div class="alert alert-danger">Maaf Anda tidak punya hak akses masuk halaman ini!</div>
	    </div>
	</div>
	<?php
} ?>

			</div>                   
    </div>           
</section>