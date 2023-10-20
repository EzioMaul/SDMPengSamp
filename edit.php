<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Daftar Pegawai</h2>
		
		<hr>
		
		<?php
		if(isset($_GET['id_pegawai'])){
			$id = $_GET['id_pegawai'];
			$sql = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai=$id") or die(mysqli_error($koneksi));
			if(mysqli_num_rows($sql) == 0){

				echo '<div class="alert alert-warning">ID Pegawai tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($sql);
			}
		}
		?>
		
		<?php
		if(isset($_POST['submit'])){
			$id = $_GET['id_pegawai'];
			$nama	= $_POST['nama'];
			$email = $_POST['email'];
			$username	= $_POST['username'];
			$alamat= $_POST['alamat'];
			$telepon = $_POST['telepon'];
			
			$sql = mysqli_query($koneksi, "UPDATE pegawai SET alamat='$alamat', telepon='$telepon' WHERE id_pegawai=$id") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data!"); document.location="edit.php?id_pegawai='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id_pegawai=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Pegawai</label>
				<div class="col-sm-10">
					<input type="text" name="id_pegawai" class="form-control" size="4" value="<?php echo $data['id_pegawai']; ?>" readonly required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" readonly required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Telepon</label>
				<div class="col-sm-10">
					<input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>" required>
				</div>
			</div>
		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="admin.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>