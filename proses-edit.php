<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $passwd = $_POST['passwd'];
    $nama_toko = $_POST['nama_toko'];
    $no_toko = $_POST['no_toko'];
    $alamat_toko = $_POST['alamat_toko'];

    // buat query update
    $sql = "UPDATE user SET nama='$nama', nik='$nik', email='$email', notelp='$notelp', passwd='$passwd', nama_toko='$nama_toko', no_toko='$no_toko', alamat_toko='$alamat_toko' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>