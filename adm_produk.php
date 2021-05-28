<!-- <?php
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
?> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <link href="bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                            <a class="nav-link active" href="adm_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Produk
                            </a>
                            <a class="nav-link" href="adm_kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="cabang.php">
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
                        <h1 class="mt-4">Katalog Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="adm_produkadd.php" role="button">Tambah Produk Baru</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users mr-1"></i>
                                Produk
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        $selectprod = mysqli_query($link, "SELECT * FROM produk");
                                        $cek1 = mysqli_num_rows($selectprod);
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
                                                        <th scope="col" class="text-center">Nama Produk</th>
                                                        <th scope="col" class="text-center">Kategori</th>
                                                        <th scope="col" class="text-center">Sub Kategori</th>
                                                        <th scope="col" class="text-center">Harga</th>
                                                        <th scope="col" class="text-center">Stok</th>
                                                        
                                                        <th scope="col" class="text-center">Min. Beli</th>
                                                        <th scope="col" class="text-center">Deskripsi</th>
                                                        <th scope="col" class="text-center">Vendor</th>
                                                        <th scope="col" class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            ';
                                            while($produk = mysqli_fetch_assoc($selectprod)){
                                                $selectkat = mysqli_query($link, "SELECT * FROM kategori, subkategori WHERE kategori.id_kat='".$produk['id_kat']."' AND subkategori.id_subkat='".$produk['id_subkat']."'");
                                                $kat = mysqli_fetch_assoc($selectkat);
                                                echo "
                                                <tr>
                                                    <th scope='row'class='text-center'>".$i."</th>
                                                ";
                                                echo '
                                                    <td>'.$produk['nama_produk'].'</td>
                                                    <td>'.$kat['nama_kat'].'</td>
                                                    <td>'.$kat['nama_subkat'].'</td>
                                                    <td>Rp'.$produk['harga'].'</td>
                                                    <td>'.$produk['stok'].'</td>
                                                    <td>'.$produk['min_beli'].'</td>
                                                    <td width="200">'.$produk['desk_produk'].'</td>
                                                    <td>'.$produk['vendor'].'</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="adm_produkedit.php?id='.$produk['id_produk'].'" role="button"><i class="far fa-edit"></i></a>
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
        <script src="scripts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="datatables-demo.js"></script> 
    </body>
</html>
