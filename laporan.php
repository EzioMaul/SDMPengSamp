<?php
include('koneksi.php');
session_start();

?>
 
 
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Laporan Petugas</title>
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
    		<h2>Laporan Pegawai </h2>
    		
			<?php
		if(isset($_POST['submit'])){
			$id = $_POST['id_laporan'];
			$id_pegawai = $_POST['id_pegawai'];
			$status_tugas = $_POST['status_tugas'];
			$catatan = $_POST['catatan'];

			$cek = mysqli_query($koneksi, "SELECT * FROM laporan WHERE id_laporan='$id'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows ($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO laporan(id_laporan, id_pegawai, status_tugas, catatan) VALUES('$id', '$id_pegawai', '$status_tugas', '$catatan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data laporan."); document.location="user.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, laporan sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="laporan.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Laporan</label>
				<div class="col-sm-10">
					<input type="text" name="id_laporan" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Petugas</label>
				<div class="col-sm-10">
					<input type="text" name="id_pegawai" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Laporan</label>
				<div class="col-sm-10">
                    <select name="status_tugas">
                        <option value="Selesai">Selesai</option>
                        <option value="Tidak Selesai">Tidak Selesai</option>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Catatan</label>
				<div class="col-sm-10">
					<input type="text" name="catatan" class="form-control" required>
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