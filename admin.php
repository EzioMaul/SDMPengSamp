<?php
include('koneksi.php');session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
                        <?php if (isset($_SESSION['username'])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif ?>

                        <li class="nav-item">
                            <a class="nav-link" href="tambah.php">Tambah Petugas</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="view_pembelian.php">Kehadiran</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    
    <div class="container" style="margin-top:20px">
        <h2>Daftar Pegawai</h2>
        
        <hr>
        
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Pegawai</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM pegawai") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        
                        echo '
                        <tr>
                            <td>'.$data['id_pegawai'].'</td>
                            <td>'.$data['nama'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['alamat'].'</td>
                            <td>'.$data['telepon'].'</td>

                            <td>
                                <a href="edit.php?id_pegawai='.$data['id_pegawai'].'" class="badge badge-warning">Edit</a>
                                <a href="delete.php?id_pegawai='.$data['id_pegawai'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
             
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
        
    </div>

    <div class="container" style="margin-top:20px">
        <h2>Daftar Perizinan</h2>
        
        <hr>
        
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Perizinan</th>
                    <th>Nama</th>
                    <th>Alasan</th>
                    <th>Status Perizinan</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM perizinan") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        
                        echo '
                        <tr>
                            <td>'.$data['id_perizinan'].'</td>
                            <td>'.$data['nama'].'</td>
                            <td>'.$data['alasan'].'</td>
                            <td>'.$data['status_acc'].'</td>
                

                            <td>
                                <a href="edit_perizinan.php?id_perizinan='.$data['id_perizinan'].'" class="badge badge-warning">Edit</a>
                                <a href="delete.php?id_perizinan='.$data['id_perizinan'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
             
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
        
    </div>
    
    <div class="container" style="margin-top:20px">
        <h2>Daftar Laporan Pegawai</h2>
        
        <hr>
        
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Laporan</th>
                    <th>ID Pegawai</th>
                    <th>Status Tugas</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM laporan") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        
                        echo '
                        <tr>
                            <td>'.$data['id_laporan'].'</td>
                            <td>'.$data['id_pegawai'].'</td>
                            <td>'.$data['status_tugas'].'</td>
                            <td>'.$data['catatan'].'</td>
                        </tr>
                        ';
                        $no++;
                    }
             
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>