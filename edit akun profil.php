<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Edit Profil Akun</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
            <div class="container-fluid d-flex justify-content-around">
              <a class="navbar-brand" href="#">
                <img src="[logo].png" alt="" height="40">
              </a>
              <form class="w-50">
                <div class="input-group border rounded-pill">
                  <input type="search" placeholder=" Cari Produk atau Nama Brand" aria-describedby="button-addon3" class="form-control bg-none border-0">
                  <div class="input-group-append border-0">
                    <button id="button-addon3" type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
              
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled mx-3" href="#">|</i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                  </li>
                </ul>
              
            </div>
          </nav>
          <br><br><br><br><br>
          <h2>Account Profil</h2>
          <h5>____________________________________________________________________________________________________________________________________________________________</h5>
          <br><br>
          <h4>Identitas diri</h4>
          <form action="proses-edit.php" method="POST">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" id="nama" value="<?php echo $siswa['nama'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">Nomor KTP</label>
                <div class="col-sm-10">
                  <input type="nik" type="number" name="nik" placeholder="nomer ktp anda" class="form-control" id="nik" value="<?php echo $siswa['nik'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="email" placeholder="email anda" class="form-control" id="email" value="<?php echo $siswa['email'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notelp" class="col-sm-2 col-form-label">Nomor Telp</label>
                <div class="col-sm-10">
                  <input type="notelp" type="number" name="notelp" placeholder="nomor telepon anda" class="form-control" id="notelp" value="<?php echo $siswa['notelp'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="passwd" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" name="notelp" placeholder="masukan password" class="form-control" id="passwd" value="<?php echo $siswa['passwd'] ?>">
            </div>
            <br><br><br><br>
            <h4>Profil Toko</h4>
            <div class="mb-3 row">
                <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_toko" placeholder="nama toko" class="form-control" id="nama_toko" value="<?php echo $siswa['nama_toko'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_toko" class="col-sm-2 col-form-label">Nomer Toko</label>
                <div class="col-sm-10">
                  <input type="no_toko" type="number" name="no_toko" placeholder="nomor toko" class="form-control" id="no_toko" value="<?php echo $siswa['no_toko'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat_toko" class="col-sm-2 col-form-label">Alamat Toko</label>
                <div class="col-sm-10">
                  <input type="text" name="alamat_toko" placeholder="alamat toko" class="form-control" id="alamat_toko" value="<?php echo $siswa['alamat_toko'] ?>">
            </div>
            <br><br><br>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>
            </div>
          </form>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>