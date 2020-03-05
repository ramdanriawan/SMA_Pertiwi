<?php
@session_start();
include "../+koneksi.php";

$user = @mysqli_real_escape_string($db, $_POST['user']);
$pass = @mysqli_real_escape_string($db, $_POST['pass']);

$sql = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user' AND password = md5('$pass')") or die ($db->error);
$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);
if($cek > 0) {
	if($data['status'] == 'aktif') {
	echo "sukses";
	@$_SESSION['siswa'] = $data['id_siswa'];
}else {
			echo "akun tidak aktif";
		}
	} else {
		echo "gagal";
	}

?>