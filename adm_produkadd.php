<?php
  require_once "config.php";

  session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
  }

  // buat query untuk ambil data dari database
  $sql = "SELECT * FROM user WHERE id='".$_SESSION['id']."'";
  $query = mysqli_query($link, $sql);
  $user = mysqli_fetch_assoc($query);

  // jika data yang di-edit tidak ditemukan
  if( mysqli_num_rows($query) < 1 ){
      die("Data tidak ditemukan...");
  }

  if(isset($_POST['add_produk'])){
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $vendor = $_POST["vendor"];
    $kategori = $_POST["kategori"];
    $subkategori = $_POST["subkategori"];
    $stok = $_POST["stok"];
    $min_beli = $_POST["min_beli"];
    $berat = $_POST["berat"];
    $unit = $_POST["unit"];
    $desk_produk = $_POST["desk_produk"];


    $sqlkat = mysqli_query($link, "SELECT * FROM kategori WHERE nama_kat='".$kategori."'");
    $fetchkat = mysqli_fetch_assoc($sqlkat);
    $id_kat = $fetchkat['id_kat'];

    $sqlsubkat = mysqli_query($link, "SELECT * FROM subkategori WHERE nama_subkat='".$subkategori."'");
    $fetchsubkat = mysqli_fetch_assoc($sqlsubkat);
    $id_subkat = $fetchsubkat['id_subkat'];

    $query2 = "INSERT INTO produk (nama_produk, harga, vendor, id_kat, id_subkat, stok, min_beli, berat, unit, desk_produk) 
    VALUES ('$nama_produk', '$harga', '$vendor', '$id_kat', '$id_subkat', '$stok', '$min_beli', '$berat', '$unit', '$desk_produk')";
    
    mysqli_query($link, $query2);
    
    $cek = mysqli_affected_rows($link);
    if($cek > 0){
        $selectprod = mysqli_query($link, "SELECT * FROM produk WHERE nama_produk='".$nama_produk."'");
        $produk = mysqli_fetch_assoc($selectprod);

        $uploadsDir = "uploads/";
        $allowedFileType = array('jpg','png','jpeg');
        
        // Velidate if files exist
        if (!empty(array_filter($_FILES['img_produk']['name']))) {
            
            // Loop through file items
            foreach($_FILES['img_produk']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['img_produk']['name'][$id];
                $tempLocation    = $_FILES['img_produk']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $id_produk       = $produk['id_produk'];
                $uploadOk = 1;

                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$id_produk."', '".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $link->query("INSERT INTO produk_img (id_produk, images, date_time) VALUES $sqlVal");
                    if($insert) {
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }

        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
        echo '
            <script>
                alert("Produk baru berhasil ditambahkan.");
                document.location.href = "adm_produk.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Produk baru gagal ditambahkan.");
                document.location.href = "adm_produk.php";
            </script>
        ';
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
        <title>Tambah Produk | Admin Goedang</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    </head>
    <body class="sb-nav-fixed">
    <?php if(!empty($response)) {?>
        <div class="alert <?php echo $response["status"]; ?>">
           <?php echo $response["message"]; ?>
        </div>
    <?php }?>
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
                            <a class="nav-link" href="adm_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">User</div>
                            <a class="nav-link" href="adm_registereduser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data User
                            </a>
                            <a class="nav-link" href="adm_pesan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                                Pesan
                            </a>
                            <div class="sb-sidenav-menu-heading">Katalog</div>
                            <a class="nav-link" href="adm_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Produk
                            </a>
                            <a class="nav-link" href="adm_kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="data_cabang.php">
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
                        <h1 class="mt-4">Tambah Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="adm_produk.php">Produk</a></li>
                            <li class="breadcrumb-item active">Tambah Produk</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users mr-1"></i>
                                Informasi Produk
                            </div>
                            <div class="card-body">
                                <form class="p-3" action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="nama_produk">Nama Produk</label>
                                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="harga" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="vendor">Vendor</label>
                                                <input type="text" class="form-control" name="vendor" placeholder="Nama Vendor" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="kategori">Kategori</label>
                                                <select class="form-select" id="kategori" name="kategori">
                                                    <option selected disabled>Pilih...</option>
                                                    <?php
                                                        $selectkat = mysqli_query($link, "SELECT * FROM kategori");
                                                        while($kat = mysqli_fetch_assoc($selectkat)){
                                                            echo '
                                                            <option value="'.$kat['nama_kat'].'">'.$kat['nama_kat'].'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="subkategori">Subkategori</label>
                                                <select class="form-select" id="subkategori" name="subkategori">
                                                    <option selected disabled>Pilih...</option>
                                                    <?php
                                                        $selectkatif = mysqli_query($link, "SELECT * FROM kategori");
                                                        while($katif = mysqli_fetch_assoc($selectkatif)){
                                                            echo '
                                                            <optgroup label="'.$katif['nama_kat'].'">
                                                            ';
                                                            $selectsubkat = mysqli_query($link, "SELECT * FROM subkategori WHERE id_kat='".$katif['id_kat']."'");

                                                            while($subkat = mysqli_fetch_assoc($selectsubkat)){
                                                                echo '
                                                                <option value="'.$subkat['nama_subkat'].'">'.$subkat['nama_subkat'].'</option>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="stok">Stok</label>
                                                    <input type="number" class="form-control" placeholder="0" name="stok" value="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="min_beli">Min. Pembelian</label>
                                                    <input type="number" class="form-control" placeholder="1" name="min_beli" value="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="berat">Berat</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="0.00" aria-label="Berat bersih" min="0" step="0.01" name="berat">
                                                    <span class="input-group-text" id="basic-addon2">gr</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="unit">Unit</label>
                                                    <input type="text" class="form-control" placeholder="1 Karton (24pcs)" name="unit" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="desk_produk" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi Produk" name="desk_produk" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="img_produk" class="form-label">Upload Gambar</label>
                                                <input class="form-control" type="file" id="img_produk[]" name="img_produk[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary" name="add_produk">Tambah Baru</button>
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
