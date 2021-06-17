<?php


require_once "config.php";

session_start();

$id = $_GET["id"];

$getdata = mysqli_query($link, "SELECT * FROM cabang_gudang WHERE id='".$id."'");
$pilih = mysqli_fetch_assoc($getdata);


if(isset($_POST['update'])){

    $alamat = $_POST["alamat_gudang"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $instagram = $_POST["akuInstagram"];
    $buka = $_POST["jamBuka"];
    $tutup = $_POST["jamTutup"];

    
    $sqlproduk = mysqli_query($link, "UPDATE cabang_gudang SET 
    alamat='$alamat', 
    email='$email', 
    no_hp='$telephone', 
    akun_instagram='$instagram', 
    jam_buka='$buka', 
    jam_tutup='$tutup'

    WHERE id='".$id."'");
    
                if ( $sqlproduk) {
                    echo "<script>alert('Update berhasil');</script>";
                    echo "<script>location='data_cabang.php';</script>";
                } else {
                    echo "<script>alert('gagal');</script>";
                }


}




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Informasi Cabang Gudang | Admin Goedang</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    </head>
    <body class="sb-nav-fixed">
 
  </div>
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <a class="navbar-brand" href="index.html"><img src="img/[logo].png" alt="" style="display: block;" class="mx-auto" height="42"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Profil</a></li>
                      <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="landing.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">User</div>
                            <a class="nav-link" href="adm_registereduser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data User
                            </a>
                            <a class="nav-link" href="adm_profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Profil
                            </a>
                            <div class="sb-sidenav-menu-heading">Katalog</div>
                            <a class="nav-link " href="adm_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Produk
                            </a>
                            <a class="nav-link" href="adm_kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link active" href="data_cabang.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                                Cabang
                            </a>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="adm_pesanan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                                Pesanan
                            </a>
                            <a class="nav-link" href="adm_pembayaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div>
                                Pembayaran
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk sebagai:</div>
                        <!-- <?php echo $user['nama'] ?> -->
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-5">
                        <h1 class="mt-4">Edit Informasi Gudang </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="data_cabang.html">Data Cabang</a></li>
                            <li class="breadcrumb-item active">Edit Informasi Gudang</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users mr-1"></i>
                                Informasi Gudang
                            </div>
                            <div class="card-body">
                                <form class="p-3" action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="nama_produk">Alamat Gudang</label>
                                                <input type="text" class="form-control" name="alamat_gudang" placeholder="Alamat Gudang" value="<?php echo $pilih["alamat"] ?>">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="vendor">E-Mail Cabang</label>
                                                <input type="text" class="form-control" name="email" placeholder="e-mail" value="<?php echo $pilih["email"] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group mb-3">
                                                <label for="vendor">Nomor Telephone</label>
                                                <input type="text" class="form-control" name="telephone" placeholder="nomor telephone" value="<?php echo $pilih["no_hp"] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="vendor">Akun Instagram</label>
                                                <input type="text" class="form-control" name="akuInstagram" placeholder="akun instagram" value="<?php echo $pilih["akun_instagram"] ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3 ml-5">
                                                <label for="min_beli">Jam Buka</label>
                                                <select class="form-select" id="inputGroupSelect01" name="jamBuka">
                                                    <option selected > <?php echo $pilih["jam_buka"] ?></option>
                                                    <option value="06.00">06.00</option>
                                                    <option value="07.00">07.00</option>
                                                    <option value="08.00">08.00</option>
                                                    <option value="09.00">09.00</option>
                                                    <option value="10.00">10.00</option>

                                                  </select>
                                            </div>
                                        </div>
    
                                        <div class="col">
                                            <div class="form-group mb-3 ml-5">
                                                <label for="unit">Jam Tutup</label>
                                                <select class="form-select" id="inputGroupSelect01" name="jamTutup">
                                                    <option selected><?php echo $pilih["jam_tutup"] ?></option>
                                                    <option value="16.00">16.00</option>
                                                    <option value="17.00">17.00</option>
                                                    <option value="18.00">18.00</option>
                                                    <option value="19.00">19.00</option>
                                                    <option value="20.00">20.00</option>
                                                  </select>
                                            </div>
                                        </div>

                                    
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Goedang 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<!-- 
        <script>
        $(document).ready(function(){
            var $optgroups = $('#subkategori > optgroup');
            
            $("#kategori").on("change",function(){
                var selectedVal = this.value;
                
                $('#subkategori').html($optgroups.filter('[label="'+selectedVal+'"]'));
            });  
        });
        </script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="css/scripts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="css/datatables-demo.js"></script> 
    </body>
</html>
