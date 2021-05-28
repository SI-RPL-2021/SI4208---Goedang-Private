<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Teh</title>
    <style type="text/css">

        .sidebar li .submenu{ 
            list-style: none; 
            margin: 0; 
            padding: 0; 
            padding-left: 1rem; 
            padding-right: 1rem;
        }
        
        .sidebar .nav-link {
            font-weight: 500;
            color: var(--bs-dark);
        }
        .sidebar .nav-link:hover {
            color: var(--bs-primary);
        }
        
        </style>
        
        
        <script type="text/javascript">
        
            document.addEventListener("DOMContentLoaded", function(){
        
                document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
        
                    element.addEventListener('click', function (e) {
        
                        let nextEl = element.nextElementSibling;
                        let parentEl  = element.parentElement;	
        
                        if(nextEl) {
                            e.preventDefault();	
                            let mycollapse = new bootstrap.Collapse(nextEl);
        
                              if(nextEl.classList.contains('show')){
                                  mycollapse.hide();
                              } else {
                                  mycollapse.show();

                                  var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');

                                if(opened_submenu){
                                    new bootstrap.Collapse(opened_submenu);
                                }
        
                              }
                          }
        
                    });
                })
        
            }); 

        </script>
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
          <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <nav class="sidebar px-5 mb-4">
                <ul class="nav flex-column" id="nav_accordion">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item1" href="#"> Makanan Ringan <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item1" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="MR_kacang.php">Kacang </a></li>
                            <li><a class="nav-link" href="MR_jelly.php">Jelly </a> </li>
                        </ul>               
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item2" href="#"> Minuman <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item2" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="minum_kopi.php">Kopi </a></li>
                            <li><a class="nav-link" href="minum_teh.php">Teh </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item4" href="#"> Keperluan dapur <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item4" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="dapur_minyak.php">Minyak </a></li>
                            <li><a class="nav-link" href="dapur_penyedap.php">Penyedap Rasa </a> </li>
                        </ul> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item5" href="#"> Kesehatan & Sanitasi Pribadi <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item5" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="handzinitizer.php">Handsinitizer </a></li>
                            <li><a class="nav-link" href="kayu_putih.php">Minyak Kayu Putih </a></li>
                        </ul> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item6" href="#"> Perawatan Bayi <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item6" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="bayi_sabun.php">Sabun Bayi </a></li>
                            <li><a class="nav-link" href="bayi_sampo.php">Sampoo Bayi </a></li>
                        </ul> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item7" href="#"> Peralatan Rumah Tangga <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul id="menu_item7" class="submenu collapse" data-bs-parent="#nav_accordion">
                            <li><a class="nav-link" href="RT_gelas.php">Gelas </a></li>
                            <li><a class="nav-link" href="RT_piring.php">Piring </a></li>
                        </ul> 
                    </li>
                </ul>
                </nav>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1 class="mt-4">Teh</h1>
                    <br>
                    <div class="row row-cols-1 row-cols-md-5 g-6">
                        <div class="col">
                          <div class="card">
                            <img src="teh sosro.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Teh Celup Sosro isi 25 kantong</h5>
                              <p class="card-text">Rp.7.200</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="teh sariwangi.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Teh Sariwangi isi 48 kantong</h5>
                              <p class="card-text">Rp.16.000</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="teh thongji.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Teh Thong ji isi 25 kant0ng</h5>
                              <p class="card-text">Rp.8.350</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="Teh Lemon Kepala Djenggot.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Teh Lemon Kepala Djenggot </h5>
                              <p class="card-text">Rp.15.000</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        
    </div>
            
            

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>