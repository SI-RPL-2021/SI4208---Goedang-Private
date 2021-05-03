<?php
require_once "config.php";

session_start();

$id = $_SESSION['id'];

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $passwd = $_POST['passwd'];
    $hashpass = password_hash($passwd, PASSWORD_DEFAULT);
    $nama_toko = $_POST['nama_toko'];
    $no_toko = $_POST['no_toko'];
    $alamat_toko = $_POST['alamat_toko'];

    // buat query update
    $sql = "UPDATE user SET nama='$nama', nik='$nik', email='$email', notelp='$notelp', passwd='$hashpass', nama_toko='$nama_toko', no_toko='$no_toko', alamat_toko='$alamat_toko' WHERE id=$id";
    $query = mysqli_query($link, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo "<script>alert('Profil berhasil diperbaharui.');document.location='edit akun profil.php'</script>";
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
?>