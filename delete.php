<?php
include('koneksi.php');

if(isset($_GET['id_pegawai'])){
	
	$id = $_GET['id_pegawai'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		
		$del = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data!"); document.location="admin.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data!"); document.location="admin.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database!"); document.location="admin.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database!"); document.location="admin.php";</script>';
}

?>