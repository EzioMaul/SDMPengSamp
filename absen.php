<?php 
session_start();

$koneksi = new mysqli("localhost", "root", "", "sdm");

if (!isset($_SESSION["petugas"])) {
	echo "<script>alert('Silahkan Login Terlebih Dahulu'); </script>";
	echo "<script>location ='login.php'; </script>";
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Absen Pegawai</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
 <body>
 	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
                <a class="navbar-brand" href="#">SDM Pengelolaan Sampah</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <?php if (isset($_SESSION["petugas"])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
        </div>
    </nav>

  <section class="konten">
    	<div class="container">
    		<h2>Tambah Absen Pegawai </h2>
    		
			<?php
		if(isset($_POST['submit'])){
			$id = $_POST['id_absen'];
			$nama = $_POST['nama'];
			$tgl = $_POST['tgl'];
			$jam = $_POST['jam'];
			$keterangan = $_POST['keterangan'];
			$keterlambatan = $_POST['keterlambatan'];


			$cek = mysqli_query($koneksi, "SELECT * FROM absen WHERE id_absen='$id'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows ($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO absen(id_absen, nama, tgl, jam, keterangan, keterlambatan) VALUES('$id', '$nama', '$tgl', '$jam', '$keterangan', '$keterlambatan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="user.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="absen.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Absen</label>
				<div class="col-sm-10">
					<input type="text" name="id_absen" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" name="tgl" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam</label>
				<div class="col-sm-10">
					<input type="time" name="jam" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterlambatan</label>
				<div class="col-sm-10">
					<input type="text" name="keterlambatan" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="user.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
    		

    	</div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>