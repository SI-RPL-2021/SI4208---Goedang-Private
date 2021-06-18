<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

    <title>Goedang</title>
    
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
                <a id="button-addon3" role="button" class="btn btn-link text-primary" href="cari.php"><i class="fa fa-search"></i></a>
                <!-- <a class="btn btn-secondary btn-sm" href="adm_produkedit.php?id='.$produk['id_produk'].'" role="button"><i class="far fa-edit"></i></a> -->
              </div>
            </div>
          </form>
          
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="keranjangg.php"><i class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanansaya.php"><i class="fas fa-clipboard-list"></i></a>
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
    
    <div class="container mt-5 px-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style=" width:100%;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style=" width:100%; height: 500px !important;">
          <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1549194388-f61be84a6e9e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1952&q=80" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://image.freepik.com/free-vector/flash-sale-discount-banner-template-promotion_7087-866.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://image.freepik.com/free-vector/colorful-promotional-sales-banner-design_1017-9784.jpg?1" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-4 ps-5">
          <div class="accordion accordion-flush shadow-sm p-3 mb-4 bg-body rounded" id="accordionFlushExample">
            <?php
              $selectkat = mysqli_query($link, "SELECT * FROM kategori");
              $i=1;
              while($kat = mysqli_fetch_assoc($selectkat)){
                $selectsubkat = mysqli_query($link, "SELECT * FROM subkategori WHERE id_kat='".$kat['id_kat']."'");
                $kat_url = seoUrl($kat['nama_kat']);
                echo'
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-kat'.$i.'">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$i.'" aria-expanded="false" aria-controls="flush-collapse'.$i.'">
                    '.$kat['nama_kat'].'
                    </button>
                  </h2>
                  <div id="flush-collapse'.$i.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$i.'" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="list-group">
                        <a class="list-group-item list-group-item-action border-0" href="katalog.php/'.$kat_url.'?a='.$kat['id_kat'].'" role="button">Semua '.$kat['nama_kat'].'</a>
                ';

                while($subkat = mysqli_fetch_assoc($selectsubkat)){
                  $subkat_url = seoUrl($subkat['nama_subkat']);
                  echo'
                  <a class="list-group-item list-group-item-action border-0" href="katalog.php/'.$subkat_url.'?c='.$subkat['id_subkat'].'" role="button">'.$subkat['nama_subkat'].'</a>
                  ';
                }
                echo'
                      </div>
                    </div>
                  </div>  
                </div>
                ';
                $i==$i++;
              }
            ?>
          </div>
        </div>
        
        <div class="col-sm-8 pe-5">
          <!-- <div class="card w-100 shadow-sm p-3 mb-4 bg-body rounded border-light">
            <div class="card-body">
              <h3>Penawaran Khusus</h3>
              <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                  <div class="card h-100 border-light">
                    <img src="img/lifebuoy batang.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Livebuoy</h5>
                      <small class="card-text">Rp 316.000</small>
                      <p class="card-text">Rp 299.000<br>144 x 75gr</p>
                      <button type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 border-light">
                    <img src="img/tehkotak.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Teh Kotak</h5>
                      <small class="card-text">Rp 70.000</small>
                      <p class="card-text">Rp 65.000<br>24 x 300ml</p>
                      <button type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 border-light">
                    <img src="img/kopiko.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Kopiko</h5>
                      <small class="card-text">Rp 7.300</small>
                      <p class="card-text">Rp 6.900<br>150gr</p>
                      <button type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          
          <div class="card w-100 shadow-sm p-3 mb-5 bg-body rounded border-light">
            <div class="card-body">
              <h3>Produk</h3>
              <div class="row row-cols-1 row-cols-md-4 g-3">
                <?php
                  $selectprod = mysqli_query($link, "SELECT * FROM produk");
                  while($produk = mysqli_fetch_assoc($selectprod)){
                    $selectimg = mysqli_query($link, "SELECT images FROM produk_img WHERE id_produk='".$produk['id_produk']."'");
                    $j = 0;
                    while($img = mysqli_fetch_assoc($selectimg)){
                      if($j==0){
                        $produk_img = $img['images'];
                      }
                      $j == $j++;
                    }
                    echo '
                    <div class="col">
                      <div class="card h-100 border-light">
                      <a href="detailproduk.php?p='.$produk['id_produk'].'" class="stretched-link"><img src="uploads/'.$produk_img.'" class="card-img-top"></a>
                        <div class="card-body">
                        <h6 class="card-title">'.$produk['nama_produk'].'</h6>
                          <p class="card-text"><strong>Rp '.$produk['harga'].'</strong></p>
                          <small>'.$produk['unit'].'<br>'.$produk['berat'].'gr</small>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><button type="button" class="btn btn-primary btn-sm">Tambah</button></li>
                        </ul>
                      </div>
                    </div>
                    ';
                  }
                ?>
              </div>
            </div>
          </div>

          <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav> -->
        
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
                          <li><a href="pesan.php">Kontak</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                      <h3 class="f-title f_600 t_color f_size_18">Bantuan</h3>
                      <ul class="list-unstyled f_list">
                          <li><a href="FAQ3.php">Pusat Bantuan</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>