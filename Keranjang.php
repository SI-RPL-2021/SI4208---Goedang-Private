<?php session_start(); ?>
<?php include 'koneksi.php';?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

    <title>Keranjang Belanja</title>
    
  </head>
  <body>
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

      
    <div class="container" >
        <div class="row px-5"style="margin-top: 10%;">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6 style="font-size: 28px;">Keranjang</h6>
                    <hr>
            <form action="cart.php?action=remove&id=$id_produk" method="post" class="cart-items">
                <div class="border rounded">
                    <div class="row bg-white">
                        <div class="col-md-3 pl-0">
                            <img src="img/chocholatos1.png" alt="Image1" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h5 class="pt-2">php_namaProduk</h5>
                            <small class="text-secondary">php_varian :</small>
                            <h5 class="pt-2">php_harga </h5>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  placeholder="Tulis catatan untuk barang ini">
                            
                        </div>
                        <div class="col-md-3 py-5">
                            <div>
                                <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                <input type="text" value="1" class="form-control w-25 d-inline">
                                <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                            </div>
                            <p align="right">
                                <button type="submit" class="btn btn-danger mt-4 col-3 " name="remove" style="margin-right: 20%;" ><i class="fas fa-trash"></i></button>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-27">
    <div class="pt-4">
        <h6>Ringkasan Belanja</h6>
        <hr>
        <div class="row price-details">
            <div class="col-md-6">
                <h6>Total (0 Barang)</h6>
                <h6>Subtotal</h6>
            </div>
            <div class="col-md-6">
                <br>
                <h6>Rp</h6>
            </div>
        </div>

            <div class="col">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary border rounded mt-2" type="button">Beli</button>
                  </div>
        </div>
    </div>

</div>
</div>
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

