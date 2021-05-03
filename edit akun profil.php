<?php
  require_once "config.php";

  session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
  }

  // buat query untuk ambil data dari database
  echo $_SESSION['id'];
  $sql = "SELECT * FROM user WHERE id='".$_SESSION['id']."'";
  $query = mysqli_query($link, $sql);
  $user = mysqli_fetch_assoc($query);

  // jika data yang di-edit tidak ditemukan
  if( mysqli_num_rows($query) < 1 ){
      die("Data tidak ditemukan...");
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
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

    <title>Edit Profil Akun | Goedang</title>
  </head>
  
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
        <div class="container-fluid d-flex justify-content-around">
          <a class="navbar-brand" href="landing.php">
            <img src="img/[logo].png" alt="" height="40">
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
            <?php
              if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
                echo '
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registrasi.php">Register</a>
                </li>';
              }
              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                echo '
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="edit akun profil.php">Profil</a></li>
                    <li><a class="dropdown-item" href="Point.php">Poin Akun</a></li>
                    <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                  </ul>
                </li>';
              }
            ?>
          </ul>
        </div>
      </nav>
    </div>

    <div class="container mt-5 px-5 py-5">
      <h2>Account Profil</h2>
      <h5>____________________________________________________________________________________________________________________________________________________________</h5>
      <br><br>
      <h4>Identitas diri</h4>
      <form action="proses-edit.php" method="POST">
        <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" id="nama" value="<?php echo $user['nama'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nik" class="col-sm-2 col-form-label">Nomor KTP</label>
          <div class="col-sm-10">
            <input type="nik" type="number" name="nik" placeholder="nomer ktp anda" class="form-control" id="nik" value="<?php echo $user['nik'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" placeholder="email anda" class="form-control" id="email" value="<?php echo $user['email'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="notelp" class="col-sm-2 col-form-label">Nomor Telp</label>
          <div class="col-sm-10">
            <input type="notelp" type="number" name="notelp" placeholder="nomor telepon anda" class="form-control" id="notelp" value="<?php echo $user['notelp'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="passwd" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="passwd" placeholder="masukan password" class="form-control" id="passwd" value="<?php echo $user['passwd'] ?>">
          </div>
        </div>
        <br><br>

        <h4>Profil Toko</h4>
        <div class="mb-3 row">
          <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
          <div class="col-sm-10">
            <input type="text" name="nama_toko" placeholder="nama toko" class="form-control" id="nama_toko" value="<?php echo $user['nama_toko'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="no_toko" class="col-sm-2 col-form-label">Nomer Toko</label>
          <div class="col-sm-10">
            <input type="no_toko" type="number" name="no_toko" placeholder="nomor toko" class="form-control" id="no_toko" value="<?php echo $user['no_toko'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="alamat_toko" class="col-sm-2 col-form-label">Alamat Toko</label>
          <div class="col-sm-10">
            <input type="text" name="alamat_toko" placeholder="alamat toko" class="form-control" id="alamat_toko" value="<?php echo $user['alamat_toko'] ?>">
          </div>
        </div>
        <br>
        <p>
          <button class="btn btn-primary btn-md" type="submit" name="simpan">Simpan</button>
        </p>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>