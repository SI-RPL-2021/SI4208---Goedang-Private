<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'] ,ENT_QUOTES)));
	$id_pemesanan = stripslashes(strip_tags(htmlspecialchars($_POST['id_pemesanan'] ,ENT_QUOTES)));
	$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'] ,ENT_QUOTES)));
	$no_telepon = stripslashes(strip_tags(htmlspecialchars($_POST['no_telepon'] ,ENT_QUOTES)));
    $alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'] ,ENT_QUOTES)));
	$jumlah = stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'] ,ENT_QUOTES)));

	$query = "UPDATE pemesanan SET id_pemesanan=?, nama=?, no_telepon=?, alamat=?, jumlah=? WHERE id=?";
    $dewan1 = $db2->prepare($query);
    $dewan1->bind_param("sssssi", $id_pemesanan, $nama, $no_telepon, $alamat, $jumlah, $id);
    
    if ($dewan1->execute()) {
    	echo "<script>alert('Data Berhasil Diubah');location='index.php';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$db2->close();
?>