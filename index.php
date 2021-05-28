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
	<title>Halaman Pemesanan</title>

<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

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

<!-- Untuk Keperluan Demo Saya Menggunakan Library Css Online, Jika sobat menggunakan untuk keperluan developmen/production maka download pada situs resminya -->
	<!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<!-- Image and text -->
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    PEMESANAN
	  </a>
	</nav>

	<div class="container">
		<h2 class="text-center" style="margin: 30px;">Daftar Pemesanan Customer</h2>

<a href="tambah_data.php">
    <button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
</a>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>No</td>
			<td>ID Pemesanan</td>
			<td>Nama Toko</td>
			<td>No. Telepon</td>
			<td>Alamat Lengkap</td>
            <td>Jumlah Pemesanan</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
	        $no = 1;
	        $query = "SELECT * FROM pemesanan ORDER BY nama ASC";
	        $dewan1 = $db2->prepare($query);
	        $dewan1->execute();
	        $res1 = $dewan1->get_result();

	        if ($res1->num_rows > 0) {
		        while ($row = $res1->fetch_assoc()) {
                    $id = $row['id'];
                    $id_pemesanan = $row['id_pemesanan'];
		            $nama = $row['nama'];
		            $no_telepon = $row['no_telepon'];
		            $alamat = $row['alamat'];
		            $jumlah = $row['jumlah'];
		?>
			<tr>
				<td><?php echo $no++; ?></td>
                <td><?php echo $id_pemesanan; ?></td>
				<td><?php echo $nama; ?></td>
				<td><?php echo $no_telepon; ?></td>
				<td><?php echo $alamat; ?></td>
				<td><?php echo $jumlah; ?></td>
				<td>
                <a href="edit_data.php?aa=<?php echo base64_encode($id) ?>">
	                <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
                </a>
                <a href="hapus_data.php?aa=<?php echo base64_encode($id) ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
                </a>
				</td>
			</tr>
	    <?php } } else { ?> 
		    <tr>
		    	<td colspan='6'>Tidak ada data ditemukan</td>
		    </tr>
	    <?php } ?>
	</tbody>
</table>

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


