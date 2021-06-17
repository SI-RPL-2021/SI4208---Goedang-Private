<?php
require_once "config.php";

session_start();



$getdata = mysqli_query($link, "SELECT * FROM cabang_gudang");
$pilih = mysqli_fetch_assoc($getdata);


if(isset($_GET['alamat'])){
    $id = $_GET['alamat'];

    //ambil data dari database, dimana pencarian sesuai dengan variabel cari
    $data = mysqli_query($link, "SELECT * FROM cabang_gudang WHERE id='".$id."'");
    $ini = mysqli_fetch_assoc($data);
    
}else{
    
    $data = mysqli_query($link, "SELECT * FROM cabang_gudang ORDER BY `id` DESC limit 1");
    $ini = mysqli_fetch_assoc($data);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Goedang</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
            <div class="container-fluid d-flex justify-content-around">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" alt="" height="40">
                </a>
                <form class="w-50" method="post">
                    <div class="input-group border rounded-pill">
                        <input type="search" placeholder=" Cari Produk atau Nama Brand" name ="cari"aria-describedby="button-addon3" class="form-control bg-none border-0">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="button" class="btn btn-link text-primary" value = "cari"><i class="fa fa-search"></i></button>
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
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    <!--Isi Web-->
    <div class="containerisi">
        <div class="elementisi">
            <div class="boxcontainerisi">
                <table class="isitable">
                <br>
                    <tr> 
                    
                        <td></td>
                        <td></td>
                        <td class="kirim" >Kirimkan Kami Sebuah Pesan</td>
                    </tr>
                    <tr>
                        <td class="hub" colspan="2">HUBUNGI KAMI</td>
                        <td><input type="text" placeholder="Nama Lengkap" class="nama"></td>
                    </tr>
                    
                    <!--Baris 1-->

                    <tr>
                    <td class="loc"><img src="img/location.svg" alt="location"></td>
                        <td>
                        <form action="mengirim pesan.php" method="GET" id="form_id">
                        <select class="form-control" name="alamat" aria-label="Default select example" style="max-width:75%;" onChange="document.getElementById('form_id').submit();">
                            <option selected value = "1"><?php echo $ini["alamat"]; ?></option>
                            <?php   while($d = mysqli_fetch_array($getdata)){ ?>
                            <option value="<?php echo $d["id"];?>">
                            <?php echo $d["alamat"]; ?></option>

                            <?php }; ?>
                            </select> </td>
                        </form>
                        <td><input type="text" placeholder="Email" class="nama"></td>

                    </tr>
                    <!--Baris 2-->
                    <tr>
                        <td class="email"><img src="img/email.svg" alt="Email"></td>
                        <td class="isi"><?php echo $ini["email"]; ?></td>
                        <td><input type="text" placeholder="Nomor Telephone" class="nama"></td>
                    </tr>

                    <!--Baris 3-->
                    <tr>
                        <td class="ig"><img class="ig" width="20px" src="img/ig.png" alt="Instagram"></td>
                        <td class="isi"><?php echo $ini["akun_instagram"]; ?></td>
                        <td rowspan="3"><input type="text" placeholder="Isi Pesan" class="pesan" ></td>
                    </tr>

                    <!--Baris 4-->
                    <tr>
                        <td class="hp"><img src="img/hp.svg" alt="Telp"></td>
                        <td class="isi"><?php echo $ini["no_hp"]; ?></td>
                        
                    </tr>

                    <!--Baris 5-->
                    <tr>
                        <td class="jadwal"><img src="img/jadwal.svg" alt="Jam"></td>
                        <td class="isi"><?php echo $ini["jam_buka"]; ?>- <?php echo $pilih["jam_tutup"]; ?></td>
                    </tr>

                    <!--Baris 6-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="button2">
                                <a href="#">SEND</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>