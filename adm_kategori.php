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

    if(isset($_POST['addKat'])){
        $desk_kat = $_POST["desk_kat"];
        $nama_kat = $_POST["nama_kat"];
        
        $query3 = "INSERT INTO kategori (nama_kat, desk_kat) VALUES ('$nama_kat', '$desk_kat')";
        
        mysqli_query($link, $query3);
        
        $cek = mysqli_affected_rows($link);
        if($cek > 0){
            echo '
                <script>
                    alert("Kategori baru berhasil ditambahkan.");
                    document.location.href = "adm_kategori.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Kategori baru gagal ditambahkan.");
                    document.location.href = "adm_kategori.php";
                </script>
            ';
        }
    }

    if(isset($_POST['addSubkat'])){
        $pilih_kat = $_POST["pilih_kat"];
        $sqlpilihkat = mysqli_query($link, "SELECT * FROM kategori WHERE nama_kat='".$pilih_kat."'");
        $pilihkat = mysqli_fetch_assoc($sqlpilihkat);

        $id_kat = $pilihkat["id_kat"];
        $desk_subkat = $_POST["desk_subkat"];
        $nama_subkat = $_POST["nama_subkat"];
        
        $query3 = "INSERT INTO subkategori (id_kat, nama_subkat, desk_subkat) VALUES ('$id_kat', '$nama_subkat', '$desk_subkat')";
        
        mysqli_query($link, $query3);
        
        $cek = mysqli_affected_rows($link);
        if($cek > 0){
            echo '
                <script>
                    alert("Kategori baru berhasil ditambahkan.");
                    document.location.href = "adm_kategori.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Kategori baru gagal ditambahkan.");
                    document.location.href = "adm_kategori.php";
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
        <title>Admin Dashboard</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/3dd6eb1413.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    </head>
    <body class="sb-nav-fixed">
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
                        <?=$user['nama']?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-5">
                        <h1 class="mt-4">Kategori Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kategori Produk</li>
                        </ol>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p>Tambah main kategori baru</p>
                                            </div>
                                            <div class="col">
                                                <div class="d-grid d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addCat">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-users mr-1"></i>
                                        Main Kategori
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                                $sqlkat = mysqli_query($link, "SELECT * FROM kategori");
                                                $cek1 = mysqli_num_rows($sqlkat);
                                                $i=1;
                                                if($cek1==0){
                                                echo '
                                                    <div class="container" style="margin-top: 70px; margin-bottom: 70px;">
                                                    <p class="lead" style="text-align: center;">No category data.</p>
                                                    </div>
                                                ';
                                                } else{
                                                echo '
                                                    <table class="table table-hover table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">Nama Kategori</th>
                                                        <th scope="col" class="text-center">Deskripsi</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    ';
                                                while($kat = mysqli_fetch_assoc($sqlkat)){
                                                    $namakat = $kat['nama_kat'];
                                                    $deskkat = $kat['desk_kat'];

                                                    echo "
                                                    <tr>
                                                    <th scope='row'class='text-center'>".$i."</th>";
                                                    echo '
                                                    <td>'.$namakat.'</td>
                                                    <td width="220">'.$deskkat.'</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="adm_kategoriedit.php?id='.$kat['id_kat'].'" role="button"><i class="far fa-edit"></i></a>
                                                    </td>
                                                    </tr>
                                                    ';
                                                    $i==$i++;
                                                }
                                                echo '
                                                    </tbody>
                                                    </table>
                                                ';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p>Tambah sub kategori baru</p>
                                            </div>
                                            <div class="col">
                                                <div class="d-grid d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addSubCat">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-users mr-1"></i>
                                        Sub Kategori
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                                $sqlsubkat = mysqli_query($link, "SELECT * FROM subkategori");
                                                $cek2 = mysqli_num_rows($sqlsubkat);
                                                $i=1;
                                                if($cek2==0){
                                                echo '
                                                    <div class="container" style="margin-top: 70px; margin-bottom: 70px;">
                                                    <p class="lead" style="text-align: center;">No subcategory data.</p>
                                                    </div>
                                                ';
                                                } else{
                                                echo '
                                                    <table class="table table-hover table-bordered align-middle" id="subKat" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">Subkategori</th>
                                                        <th scope="col" class="text-center">Kategori</th>
                                                        <th scope="col" class="text-center">Deskripsi</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    ';
                                                while($subkat = mysqli_fetch_assoc($sqlsubkat)){
                                                    $sqlkatif = mysqli_query($link, "SELECT * FROM kategori WHERE id_kat='".$subkat["id_kat"]."'");
                                                    $tarikkat = mysqli_fetch_assoc($sqlkatif);
                                                    echo "
                                                    <tr>
                                                    <th scope='row' class='text-center'>".$i."</th>";
                                                    echo '
                                                    <td>'.$subkat['nama_subkat'].'</td>
                                                    <td>'.$tarikkat['nama_kat'].'</td>
                                                    <td>'.$subkat['desk_subkat'].'</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="adm_kategorisubedit.php?id='.$subkat['id_subkat'].'" role="button"><i class="far fa-edit"></i></a>
                                                    </td>
                                                    </tr>
                                                    ';
                                                    $i==$i++;
                                                }
                                                echo '
                                                    </tbody>
                                                    </table>
                                                ';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addCat" tabindex="-1" aria-labelledby="addCat" aria-hidden="true">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Main Kategori</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="p-2" action="" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="nama_kat" class="col-sm-4 col-form-label">Nama Kategori</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama_kat" name="nama_kat">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="desk_kat" class="col-sm-4 col-form-label">Deskripsi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="desk_kat" name="desk_kat" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-secondary" name="cancel" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="addKat">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addSubCat" tabindex="-1" aria-labelledby="addSubCat" aria-hidden="true">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Sub Kategori</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    <form class="p-2" action="" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="nama_subkat" class="col-sm-4 col-form-label">Subkategori</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama_subkat" name="nama_subkat">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pilih_kat" class="col-sm-4 col-form-label">Main Kategori</label>
                                            <div class="col-sm-8">
                                                <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                                                <select class="form-select" id="pilih_kat" name="pilih_kat">
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
                                        <div class="row mb-3">
                                            <label for="desk_subkat" class="col-sm-4 col-form-label">Deskripsi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="desk_subkat" name="desk_subkat" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" name="cancel" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="addSubkat">Simpan</button>
                                    </form>
                                </div>
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


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="css/scripts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="css/datatables-demo.js"></script> 
    </body>
</html>
