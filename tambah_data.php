<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Crud &amp; tambah data</title>
	
	<!-- Untuk Keperluan Demo Saya Menggunakan Library Css Online, Jika sobat menggunakan untuk keperluan developmen/production maka download pada situs resminya -->
	<!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<!-- Image and text -->
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    PEMESANAN
	  </a>
	</nav>

	<div class="container">
		<h2 class="center" style="margin: 30px;">Tambah Data</h2>

		<form method="POST" action="tambah_data_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>ID Pemesanan </label>
						<input type="text" name="id_pemesanan" id="id_pemesanan" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>Nama Toko</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>No. Telepon</label>
						<input type="text" name="no_telepon" id="no_telepon" class="form-control" required="true">
					</div>
                    <div class="form-group">
						<label>Alamat Lengkap</label>
						<input type="text" name="alamat" id="alamat" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>Jumlah Pemesanan</label>
						<input type="text" name="jumlah" id="jumlah" class="form-control" required="true">
					</div>

					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>

    <div class="text-center">© <?php echo date('Y'); ?> Copyright:
	    <a href="https://dewankomputer.com/"> Goedang</a>
	</div>
    <!-- Untuk Keperluan Demo Saya Menggunakan JQuery Online, Jika sobat menggunakan untuk keperluan developmen/production maka download JQuery pada situs resminya -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
</body>
</html>