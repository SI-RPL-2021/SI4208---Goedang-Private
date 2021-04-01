<?php
// konfigurasi server
$server="localhost"; /*local server localhost*/
$user="root"; /*User server mysql anda*/
$pass=""; /*password server mysql anda*/
$database="goedang"; /*Nama database yang dikoneksikan, sesuaikan dengan
nama database anda*/

// koneksi ke server
$con = mysqli_connect($server,$user,$pass,$database) or die('Error Connection Network');

?>