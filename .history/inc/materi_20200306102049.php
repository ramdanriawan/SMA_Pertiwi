<section class="content-header mt-5">
            <div class="col-lg-12">
                  <ol class="breadcrumb">
                    <li><i class="fa fa-receipt"></i> Data Materi</li>

                  </ol>
            </div>
</section>

<section class="content">
    <div class="container-fluid">
            <div class="header">

<?php
$db = mysqli_connect("localhost", "id12825935_db_elearning", "db_elearning", "id12825935_db_elearning");

if (@$_GET['action'] == '') {?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card my-2">
	            <div class="card-header">Data Materi Pelajaran</div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-striped table-borderless table-hover" id="tb_materi">
	                        <thead class"thead-dark">
	                            <tr>
	                                <th>#</th>
	                                <th>Mata Pelajaran</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php
$no        = 1;
    $sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel") or die($db->error);
    while ($data_mapel = mysqli_fetch_array($sql_mapel)) {?>
	                            <tr>
	                                <td width="40px" align="center"><?php echo $no++; ?></td>
	                                <td><?php echo $data_mapel['mapel']; ?></td>
	                                <td width="200px" align="center">
										<?php 
											$sql_id_kelas = mysqli_query($db, "SELECT * FROM tb_siswa where id_siswa = $_SESSION[siswa]") or die ($db->error);
                                            $siswa = mysqli_fetch_array($sql_id_kelas);

											$sql_quiz = mysqli_query($db, "SELECT * FROM tb_file_materi where id_mapel = $data_mapel[id] and id_kelas = $siswa[id_kelas]") or die ($db->error);
											if(mysqli_fetch_array($sql_quiz)): 
										?>

	                                	<a href="?page=materi&action=lihatmateri&id_mapel=<?php echo $data_mapel['id']; ?>" class="btn btn-primary btn-sm">Lihat Materi</a>
										
										<?php endif; ?>
	                                </td>
	                            </tr>
	                        	<?php
}?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php
} else if (@$_GET['action'] == 'lihatmateri') {?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card my-2">
	            <div class="card-header">Lihat Data Materi Pelajaran</div>
	            <div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
						    <thead class"thead-dark">
						        <tr>
						            <th>#</th>
						            <th>Judul Materi</th>
						            <th>Nama File</th>
						            <th>Tanggal Posting</th>
						            <th>Pembuat</th>
						            <th>Opsi</th>
						        </tr>
						    </thead>
						    <tbody id="materi">
						    <?php
$sql_siswa  = mysqli_query($db, "SELECT * FROM tb_siswa WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
    $data_siswa = mysqli_fetch_array($sql_siswa);
    $no         = 1;
    $sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi WHERE id_mapel = '$_GET[id_mapel]' AND id_kelas = '$data_siswa[id_kelas]'") or die($db->error);
    if (mysqli_num_rows($sql_materi) > 0) {
        while ($data_materi = mysqli_fetch_array($sql_materi)) {?>
							        <tr>
							            <td width="40px" align="center"><?php echo $no++; ?></td>
							            <td id="judul"><?php echo $data_materi['judul']; ?></td>
							            <td><?php echo $data_materi['nama_file']; ?></td>
							            <td><?php echo $data_materi['tgl_posting']; ?></td>
							            <td>
							            	<?php
if ($data_materi['pembuat'] == 'admin') {
            echo "Admin";
        } else {
            $sql_pengajar  = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_materi[pembuat]'") or die($db->error);
            $data_pengajar = mysqli_fetch_array($sql_pengajar);
            echo $data_pengajar['nama_lengkap'];
        }?>
							            </td>
							            <td align="center">
							            	<a href="./admin/file_materi/<?php echo $data_materi['nama_file']; ?>" id="klik" isi="<?php echo $data_materi['id_materi']; ?>" class="btn btn-info btn-xs">Download</a>
							            </td>
							        </tr>
							    	<?php
}
    } else {
        echo '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
    }?>
						    </tbody>
						</table>
					</div>
                    <script type="text/javascript">
                    $("#materi").on("click", "#klik", function() {
                    	var id = $(this).attr("isi");
						$.ajax({
							url : 'inc/prosesklik.php',
							type : 'POST',
							data : 'id='+id,
							success : function(msg) {
								window.location='?page=materi&action=lihatmateri&id_mapel=<?php echo @$_GET["id_mapel"]; ?>';
							}
						});
                    });
                    </script>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>

			</div>
    </div>
</section>