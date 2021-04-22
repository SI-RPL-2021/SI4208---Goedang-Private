<?php
include 'connect.php';

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$notelp = $_POST['notelp'];
$nama_toko = $_POST['nama_toko'];
$no_toko = $_POST['no_toko'];
$alamat_toko = $_POST['alamat_toko'];

//Query input menginput data kedalam tabel user
$sql="insert into user (id,nama,nik,email,passwd,notelp,nama_toko,no_toko,alamat_toko) values
('','$nama','$nik','$email','$passwd','$notelp','$nama_toko','$no_toko','$alamat_toko',)";

//Mengeksekusi/menjalankan query diatas 
$hasil=mysqli_query($con,$sql);

//Kondisi apakah berhasil atau tidak
if ($hasil) {
    echo 'Data berhasil disimpan';
}else{
    echo 'Gagal Menyimpan Data';
}

?>