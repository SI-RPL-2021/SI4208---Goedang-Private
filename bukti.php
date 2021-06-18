<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>

    <title>Bukti pembayaran</title>
    
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
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled mx-3" href="#">|</i></a>
            </li>
            <?php
              require_once "koneksi.php";
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

<div>
<div>
	<div class="container">
		<h2 class="text-center" style="margin: 25px;"></h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<head>

<div class="container-fluid">

<head>
<body>

<div class="col-md-12">
<?php
echo date("d/m/Y")
?>
</div>

<br/><br/>
<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-2">
ID User: <span style="color:red;">*</span>
</div>
<div class="col-md-10">
<input type="text" name="nama" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput ="setCustomValidity('')" />
</div>
<br/><br/>
<div class="col-md-2">
ID Pemesanan: <span style="color:red;">*</span>
</div>
<div class="col-md-10">
<input type="text" name="namaBarang" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput ="setCustomValidity('')" /><br/><br/>
</div>
<br/><br/>

<div class="col-md-2">
Pembayaran melalui: <span style="color:red;">*</span>
</div>

<div class="col-md-10 dropdown">
<select name="bank" required oninvalid="this.setCustomValidity('Wajib dipilih')" oninput ="setCustomValidity('')">
<option value="">-- Pilih --</option>
<option value="bca">BCA</option>
<option value="mandiri">Mandiri</option>
<option value="bni">BNI</option>
<option value="bri">BRI</option>
<option value="btpn">BTPN</option>
</select>
</div>

<br/><br/>
<div class="col-md-2">
Bukti transfer
</div>
<div class="col-md-10">
<input type="file" name="bukti_transf" />
</div>
<br/><br/>
<div class="col-md-12">
<button type="submit" name="btn-upload">Kirim File</button>
</div>
</form>
</div>

<?php
//error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['btn-upload']))
{
$bukti_transf = date("d-m-Y h:i:s a")."-".$_POST['nama']."-".$_POST['namaBarang']."-".$_POST['bank']."-".$_FILES['bukti_transf']['name'];
$bukti_loc = $_FILES['bukti_transf']['tmp_name'];
$folder="buktiTransfer/";
if(move_uploaded_file($bukti_loc,$folder.$bukti_transf))
{
?><script>alert('Upload file berhasil');</script><?php
}
else
{
?><script>alert('Gagal upload, silakan ulangi kembali');</script><?php
}
}

?>

</body>
</html>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
</body>
</html>


