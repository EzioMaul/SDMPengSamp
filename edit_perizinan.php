<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Daftar Perizinan</h2>
		
		<hr>
		
		<?php
		if(isset($_GET['id_perizinan'])){
			$id = $_GET['id_perizinan'];
			$sql = mysqli_query($koneksi, "SELECT * FROM perizinan WHERE id_perizinan=$id") or die(mysqli_error($koneksi));
			if(mysqli_num_rows($sql) == 0){

				echo '<div class="alert alert-warning">ID Perizinan tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($sql);
			}
		}
		?>
		
		<?php
		if(isset($_POST['submit'])){
			$id = $_GET['id_perizinan'];
			$nama	= $_POST['nama'];
			$alasan = $_POST['alasan'];
			$status	= $_POST['status_acc'];
			
			
			$sql = mysqli_query($koneksi, "UPDATE perizinan SET status_acc='$status' WHERE id_perizinan=$id") or die(mysqli_error($koneksi));
			$a = $koneksi->query($sql);
			if($sql){
				echo '<script>alert("Berhasil menyimpan data!"); document.location="admin.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit_perizinan.php?id_perizinan=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Perizinan</label>
				<div class="col-sm-10">
					<input type="text" name="id_perizinan" class="form-control" size="4" value="<?php echo $data['id_perizinan']; ?>" readonly required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan</label>
				<div class="col-sm-10">
					<input type="text" name="alasan" class="form-control" value="<?php echo $data['alasan']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perizinan</label>
				<div class="col-sm-10">
                    <select name="status_acc">
                        <option value="Diizinkan">Diizinkan</option>
                        <option value="Tidak Diizinkan">Tidak Diizinkan</option>
                    </select>
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

