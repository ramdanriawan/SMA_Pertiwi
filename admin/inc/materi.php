<?php 
// print_r($_FILES); die();
?>

<section class="content-header mt-5">
  <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-book"></i> Materi</li>
        
      </ol>
   </div>
</section>

<section class="content">
    <div class="container-fluid">
            <div class="header">
<?php
if(@$_GET['action'] == '') { ?>
	<div class="row">
		<div class="col-md-12">
	        <div class="card my-2">
	            <div class="card-header"><a href="?page=materi&action=tambah" class="btn btn-sm btn-primary btn-xs">Tambah Data</a> &nbsp; <a href="./laporan/cetak.php?data=materi" target="_blank" class="btn btn-default btn-xs">Cetak</a></div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-striped table-borderless table-hover" id="tb_materi">
	                        <thead class="thead-dark">
	                            <tr>
	                                <th>#</th>
	                                <th>Judul</th>
	                                <th>Kelas</th>
	                                <th>Mapel</th>
	                                <th>Nama File</th>
	                                <th>Tanggal Posting</th>
	                                <th>Pembuat</th>	                     
	                                <th>Opsi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php
	                        $no = 1;
	                        if(@$_SESSION[admin]) {
		                        $sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi JOIN tb_kelas ON tb_file_materi.id_kelas = tb_kelas.id_kelas JOIN tb_mapel ON tb_file_materi.id_mapel = tb_mapel.id") or die($db->error);
	                        } else if(@$_SESSION[pengajar]) {
	                        	$sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi JOIN tb_kelas ON tb_file_materi.id_kelas = tb_kelas.id_kelas JOIN tb_mapel ON tb_file_materi.id_mapel = tb_mapel.id WHERE pembuat = '$_SESSION[pengajar]'") or die($db->error);
	                        }
	                        if(mysqli_num_rows($sql_materi) > 0) {
	                        	while($data_materi = mysqli_fetch_array($sql_materi)) { ?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $data_materi['judul']; ?></td>
										<td><?php echo $data_materi['nama_kelas']; ?></td>
										<td><?php echo $data_materi['mapel']; ?></td>
										<td><?php echo $data_materi['nama_file']; ?></td>
										<td><?php echo tgl_indo($data_materi['tgl_posting']); ?></td>
										<td>
											<?php
											if($data_materi['pembuat'] == 'admin') {
												echo "Admin";
											} else {
												$sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_materi[pembuat]'") or die($db->error);
												$data_pengajar = mysqli_fetch_array($sql_pengajar);
												echo $data_pengajar['nama_lengkap'];
											} ?>
										</td>										
										<td align="center">
	                                        <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=materi&action=hapus&IDmateri=<?php echo $data_materi['id_materi']; ?>" class="btn btn-sm btn-danger btn-xs">Hapus</a>
                                        </td>
									</tr>
								<?php
	                        	}
	                        } else {
	                        	echo '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
	                        } ?>
	                        </tbody>
	                    </table>
	                    <script>
                        $(document).ready(function () {
                            $('#datamateri').dataTable();
                        });
                        </script>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php
} if(@$_GET['action'] == 'tambah') { ?>
	<div class="row">
		<div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">Tambah File Materi &nbsp; <a href="?page=materi" class="btn btn-warning btn-xs">Kembali</a></div>
                <div class="card-body">
	                <?php
	                if(@$_SESSION[admin]) { ?>
	                	<form method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                            <label>Judul *</label>
	                            <input type="text" name="judul" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <label>Mapel *</label>
	                            <select name="mapel" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel") or die ($db->error);
	                            	while($data_mapel = mysqli_fetch_array($sql_mapel)) {
	                            		echo '<option value="'.$data_mapel['id'].'">'.$data_mapel['mapel'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Kelas *</label>
	                            <select name="kelas" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die ($db->error);
	                            	while($data_kelas = mysqli_fetch_array($sql_kelas)) {
	                            		echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>File *</label>
	                            <input type="file" name="materi" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                            <input type="reset" value="Reset" class="btn btn-danger" />
	                        </div>
	                    </form>
					<?php
	                } else if(@$_SESSION[pengajar]) { ?>
	                    <form method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                            <label>Judul *</label>
	                            <input type="text" name="judul" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <label>Mapel yang Anda Ajar *</label>
	                            <select name="mapel" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_mapel_ajar = mysqli_query($db, "SELECT DISTINCT(id_mapel) FROM tb_mapel_ajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
	                            	while($data_mapel_ajar = mysqli_fetch_array($sql_mapel_ajar)) {
	                            		$sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel WHERE id = '$data_mapel_ajar[id_mapel]'") or die($db->error);
	                            		$data_mapel = mysqli_fetch_array($sql_mapel);
	                            		echo '<option value="'.$data_mapel_ajar['id_mapel'].'">'.$data_mapel['mapel'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Kelas yang Anda Ajar *</label>
	                            <select name="kelas" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas_ajar JOIN tb_kelas ON tb_kelas_ajar.id_kelas = tb_kelas.id_kelas WHERE tb_kelas_ajar.id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
	                            	while($data_kelas = mysqli_fetch_array($sql_kelas)) {
	                            		echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>File *</label>
	                            <input type="file" name="materi" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                            <input type="reset" value="Reset" class="btn btn-danger" />
	                        </div>
	                    </form>
                    <?php
	                }

                    if(@$_POST['simpan']) {
                    	$judul = @mysqli_real_escape_string($db, $_POST['judul']);
                        $mapel = @mysqli_real_escape_string($db, $_POST['mapel']);
                        $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);

                        $sumber = @$_FILES['materi']['tmp_name'];
                        $target = 'file_materi/';
						$nama_file = @$_FILES['materi']['name'];
						$type_allowed = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
						
						if ( !in_array( $_FILES['materi']['type'],  $type_allowed) ) {
							echo '<script>alert("Gagal menambah materi, file hanya boleh type doc, docx, dan pdf saja!");</script>';
                            exit;
						}

                        if(move_uploaded_file($sumber, $target.$nama_file)) {
                        	if(@$_SESSION[admin]) {
	                            mysqli_query($db, "INSERT INTO tb_file_materi VALUES('', '$judul', '$kelas', '$mapel', '$nama_file', now(), 'admin')") or die ($db->error);           
                            } else if(@$_SESSION[pengajar]) {
                            	mysqli_query($db, "INSERT INTO tb_file_materi VALUES('', '$judul', '$kelas', '$mapel', '$nama_file', now(), '$_SESSION[pengajar]')") or die ($db->error);
                            }
                            echo '<script>window.location="?page=materi";</script>';
                        } else {
                            echo '<script>alert("Gagal menambah materi, file gagal diupload, coba lagi!");</script>';
                        }
                    } ?>
                </div>
            </div>
        </div>
	</div>
<?php
} else if(@$_GET['action'] == 'hapus') {
	mysqli_query($db, "DELETE FROM tb_file_materi WHERE id_materi = '$_GET[IDmateri]'") or die($db->error);
	echo "<script>window.location='?page=materi';</script>";
} ?>

			</div>                   
    </div>           
</section>