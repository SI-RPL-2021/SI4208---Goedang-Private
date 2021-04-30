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

    <title>FAQ Page</title>
    <link rel="stylesheet" href="styles.css">

  </head>

 <body>
   <!-- start navbar -->
    <div class="container">
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
        <div class="container-fluid d-flex justify-content-around">
          <a class="navbar-brand" href="#">
            <img src="GOEDANG.png" alt="" height="40">
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
              require_once "config.php";
              session_start();
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
  <div class="container-fluid">
    <h2>Hai,</h2>
    <h2>Ada yang bisa kami bantu?</h2>

    <div class="form-outline">
  <input type="search" id="form1" class="form-control" placeholder="Cari kata kunci"
  aria-label="Search" />
</div>
<br>
    <center>
      <h4>Apakah permasalahan Anda tentang ....</h4>
    
    <div class="accordion">
        <div class="icon"></div>
        <h5>Q: Apa itu GOEDANG?</h5>
    </div>
    <div class="panel">
        <p>Goedang merupakan sebuah marketplace bebasis website yang menyediakan produk dan barang dengan stok lebih banyak
        dibandingkan marketplace lainnya</p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5>Q: Dimana data pengguna disimpan?</h5>
    </div>
    <div class="panel">
        <p>Data pengguna disimpan dengan aman pada database kami</p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5>Q: Bagaimaana GOEDANG bekerja?</h5>
    </div>
    <div class="panel">
        <p>Kami menyediakan kolom search jadi pengguna bisa melakukan pencarian barang yang diinginkan dan melakukan pembayaran.</p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5>Q: Bagaimana cara melakukan pembayaran?</h5>
    </div>
    <div class="panel">
        <p>Dengan melakukan bukti transfer dari rekening pembeli ke rekening GOEDANG.</p>
    </div>
    <div class="accordion">
      <div class="icon"></div>
      <h5>Q: Apakah GOEDANG menyediakan jaminan garansi?</h5>
  </div>
  <div class="panel">
      <p>Untuk saat ini GOEDANG hanya menjamin garansi barang rusak pada saat pengiriman pada pihak kurir.</p>
  </div>

  <div class="accordion">
      <div class="icon"></div>
      <h5>Q: Apa fungsi point akun?</h5>
  </div>
  <div class="panel">
      <p>Bisa ditukarkan saat melakukan pembayaran.</p>
  </div>

  <div class="accordion">
      <div class="icon"></div>
      <h5>Q: Bagaimana mengedit informasi akun?</h5>
  </div>
  <div class="panel">
      <p>Simple, cukup klik pada informasi akun pengguna bisa melakukannya secara otodidak</p>
  </div>

  <div class="accordion">
      <div class="icon"></div>
      <h5>Q: Cabang GOEDANG ada dimana saja?</h5>
  </div>
  <div class="panel">
      <p>Untuk saat ini cabang GOEDANG tersebar di seluruh penjuru provinsi yang terdapat pada pulau Jawa saja</p>
  </div>
</div>  

<script src="app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        
</body>
</html>