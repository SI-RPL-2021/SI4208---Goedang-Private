<?php session_start(); ?>
<?php include 'koneksi.php';?>

<!-- update later 2 -->

<!DOCTYPE html>
<html>
<head>
    <title>Dotail Produk</title>
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
    <div class="col order-last">
    <br><br><br>
  <h4>Jumlah</h4>
  <hr>
				<td>Total</td>
				<td>:</td>
				<td>
					<select name="qty">
						<option value="">pcs</option>
						<?php for($x=1;$x<=100;$x++){ ?>
						<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					
				</td>
			</tr>
		</table>
	</form>
	<hr>
  <h7 class="text-muted">Min. pembelian</h7><br>
  <h7 class="text-muted">12 pcs</h7><br>
  <h7 class="text-muted">1 box</h7>
  <br><br>
	<h6>Subtotal</h6>
  <br>
  <button type="button" a href='#' class="btn btn-light">Keranjang</button>
  <button type="button" a href='#' class="btn btn-primary">Beli</button>
  
        <!--CODE PHP HERE-->
        
    
    </div>
    
    <!-- kolom2 -->
    <div class="col">
    <br><br>
      <h2> Chocolatos Original</h2>
      <br> <hr />
      <h4>Rp. 15.000,-</h4> <h8>
      <br> <hr />
      <br>
      <h6>Stok &nbsp; &nbsp; &nbsp; &nbsp; 1026<h6>
      <br>
      <h6>Vendor &nbsp; &nbsp; MOMIC GALERI, Jakarta Selatan<h6>
      <br>
      <h6>Satuan<h6>
      <br>
      <button type="button" class="btn btn-light">/pcs</button>
      <button type="button" class="btn btn-light">/box (isi 12 pcs)</button>
      <h6>Varian<h6>
      <br>
      <button type="button" class="btn btn-light">original</button>
      <button type="button" class="btn btn-light">hazelnut</button>
      <button type="button" class="btn btn-light">sweet cheese</button>
      <button type="button" class="btn btn-light">dark</button>
  
    </div>
    <!-- kolom1 -->
    <div class="col order-first">
    <h6>     Home   >    Produk    >    Makanan Ringan<h6>
                    <br><br>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/chocholatos1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/chocholatos2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/chocholatos3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/chocholatos3.png" class="d-block w-100" alt="...">
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
  </div>
</div>
  

  <script src="app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>