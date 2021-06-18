<?php session_start(); ?>
<?php include 'config.php'; ?>
<?php

//mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//query ambil data
$ambil = $link->query("SELECT * FROM produk WHERE id_produk= '$id_produk'");
$data = $ambil->fetch_assoc();

echo "<pre>";
print_r($data);
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">

      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- start navbar -->
<div class="container">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
    <div class="container-fluid d-flex justify-content-around">
      <a class="navbar-brand" href="#">
        <img src="img/GOEDANG.png" alt="" height="40">
      </a>
      <form class="w-50">
          <div class="input-group border rounded-pill">
            <input type="search" placeholder=" Cari produk anda sekarang" aria-describedby="button-addon3" class="form-control bg-none border-0">
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
    
    //save later 1
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
  <!-- end navbar -->
<br><br><br><br>
<div class="container">
  <div class="row">
  <!-- kolom 3 -->
    
        <?php
        //jk ada tombol beli
        if (isset($_POST["Keranjang"])) 
        {
            //mendapatkan jumlah yang diinputkan
            $jumlah = $_POST["jumlah"];
            //masukkan di keranjang belanja
            $_SESSION["keranjang"][$id_produk] = $jumlah;

            echo "<script>alert('produk dah masuk keranjang ni bos');</script>";
            echo "<script>location='keranjang.php';</script>";
        }
        ?>
    
    <!-- kolom2 -->
    <br><br>
    <div class="col-md-6">
    <h2><?php echo $data["nama_produk"] ?></h2><hr />
    <h4>Rp. <?php echo number_format($data["harga"]); ?></h4>
      <br> <hr />
      <h4>Vendor &nbsp; &nbsp; Rp. <?php echo $data["vendor"] ?></h4><hr />
      <br>
      <h4>Satuan &nbsp; &nbsp; Rp. <?php echo $data["unit"] ?></h4><hr />
        </div>
    </div>
    <!-- beli -->
    <form method="post" >
          <div class="form-group">
                <div class="input-group">
                    <input type="number" min="1" class="form-control" name="jumlah">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" name="Keranjang">Keranjang</button>
                    </div>
                </div>
            </div>
        </form>

    <!-- kolom 1 -->
    </div class="row">
                    </div class="row">
    <img src="img_produk/<?php echo $data["img_produk"]; ?>" alt="" class="img-responsive">
                    </div>
  </div>
  </div>
</div>
  

  <script src="app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>