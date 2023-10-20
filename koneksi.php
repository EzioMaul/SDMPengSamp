<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "sdm";
	$koneksi = mysqli_connect($host, $username, $password, $database);

	if ($koneksi) {
		echo "";
	} else {
		echo "Koneksi Gagal";
	}
?>