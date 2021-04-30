<?php
$user_id = 1234;
$user_name = "dimas";
$id_belanja = 32;
$total_belanja = 30000;

if ($user_id == 1234 & $user_name == "dimas" & $id_belanja == 32) {
    $point = $total_belanja*10/100;
}else {
    echo "failed";
}

require_once "config.php";

  session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
    <link href="css/footer.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
    
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
        <div class="container-fluid d-flex justify-content-around">
          <a class="navbar-brand" href="#">
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
              <li class="dropdown">
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
    <div class="container-sm ps-5">

    </div>
    
    <div class="container mt-5" >

            <div class="accordion accordion-flush shadow-sm p-3 mb-4 bg-body rounded" id="accordionFlushExample"style="margin-top: 10%;" >

                <div class ="row" style="text-align: center; background-color : white; ">
                  <div class="col-sm">
                    <h3>History</h3>
                  </div>
 
                </div>

                <div class ="row" style="" >
                  <div class="col-sm" style="text-align: left; margin-left: 5% ; ">
                    <p style=”text-align:justify;”>
                      <img src="img/point (1).png" style="float:left;  margin: 8px ;" width="50px" height="50px" alt="..." />
                      <h5 class="card-title">Point Belanja Rp.50000<?php echo $total_belanja?></h5>
                      <small class="card-text">18-03-2019 21:40</small>
                      </p>
                  </div>
                  <div class="col-sm" style="text-align: right;margin-right: 5%; padding-top: 30px;">
                    <h5>+ <?php echo $point?></h5>
                  </div>
                </div>

                <div class ="row" style="" >
                  <div class="col-sm" style="text-align: left; margin-left: 5% ; ">
                    <p style=”text-align:justify;”>
                      <img src="img/point (1).png" style="float:left;  margin: 8px ;" width="50px" height="50px" alt="..." />
                      <h5 class="card-title">Point Belanja Rp.</h5>
                      <small class="card-text">18-03-2019 21:40</small>
                      </p>
                  </div>
                  <div class="col-sm" style="text-align: right;margin-right: 5%; padding-top: 30px;">
                    <h5>+5000</h5>
                  </div>
                </div>
                    <hr>
                <div class ="row" style="" >
                  <div class="col-sm" style="text-align: left; margin-left: 5% ; ">
                    <p style=”text-align:justify;”>
                      <img src="img/point (1).png" style="float:left;  margin: 8px ;" width="50px" height="50px" alt="..." />
                      <h5 class="card-title">TOTAL POINT</h5>
                      
                      </p>
                  </div>
                  <div class="col-sm" style="text-align: right;margin-right: 5%; padding-top: 30px;">
                    <h5>+5000</h5>
                  </div>
                </div>

        
        </div>
      
    </div>
  

   

<footer class="new_footer_area bg_color">
  <div class="new_footer_top">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                      <img src="img/[logo2].png" height="200">
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                      <h3 class="f-title f_600 t_color f_size_18">Tentang</h3>
                      <ul class="list-unstyled f_list">
                          <li><a href="#">Goedang</a></li>
                          <li><a href="#">Kontak</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                      <h3 class="f-title f_600 t_color f_size_18">Bantuan</h3>
                      <ul class="list-unstyled f_list">
                          <li><a href="#">Pusat Bantuan</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                      <h3 class="f-title f_600 t_color f_size_18">Ikuti Kami</h3>
                      <div class="f_social_icon">
                          <a href="#" class="fab fa-facebook"></a>
                          <a href="#" class="fab fa-twitter"></a>
                          <a href="#" class="fab fa-linkedin"></a>
                          <a href="#" class="fab fa-pinterest"></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer_bg">
          <div class="footer_bg_one"></div>
          <div class="footer_bg_two"></div>
      </div>
  </div>
  <div class="footer_bottom">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-sm-7">
                  <p class="mb-0 f_400">© Goedang Inc. 2021 All rights reserved.</p>
              </div>
          </div>
      </div>
  </div>
</footer>
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

