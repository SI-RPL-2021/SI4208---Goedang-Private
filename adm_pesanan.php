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
        <link href="css/bootstrap.css" rel="stylesheet" />
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
                            <a class="nav-link" href="adm_produk.php">
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
                            <a class="nav-link active" href="adm_pesanan.php">
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
                        <h1 class="mt-4">Pesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pesanan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users mr-1"></i>
                                Informasi Pesanan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        $selectorder = mysqli_query($link, "SELECT * FROM pesanan");
                                        $i=1;
                                        // $cek1 = mysqli_num_rows($selectorder);
                                        // if($cek1==0){
                                        //     echo '
                                        //     <div class="container" style="margin-top: 70px; margin-bottom: 70px;">
                                        //     <p class="lead" style="text-align: center;">No category data.</p>
                                        //     </div>
                                        //     ';
                                        // } else{
                                            echo '
                                            <table class="table table-hover table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center" width="100">No. Pesanan</th>
                                                        <th scope="col" class="text-center">Nama</th>
                                                        <th scope="col" class="text-center">Alamat</th>
                                                        <th scope="col" class="text-center">Tanggal</th>
                                                        <th scope="col" class="text-center">Total</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col" class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            ';
                                            while($order = mysqli_fetch_assoc($selectorder)){
                                                $selectstatus = mysqli_query($link, "SELECT ket_status FROM pesanan_status WHERE no_order='".$order['no_order']."' ORDER BY id_status DESC LIMIT 1");
                                                $tarikstatus = mysqli_fetch_assoc($selectstatus);
                                                
                                                $selectuser = mysqli_query($link, "SELECT * FROM user WHERE user.id='".$order['id_user']."'");
                                                $tarikuser = mysqli_fetch_assoc($selectuser);
                                                echo "
                                                <tr>
                                                    <th scope='row'class='text-center'>".$i."</th>
                                                ";
                                                echo '
                                                    <td>'.$order['no_order'].'</td>
                                                    <td>'.$tarikuser['nama'].' ('.$tarikuser['nama_toko'].')</td>
                                                    <td>'.$tarikuser['alamat_toko'].' ('.$tarikuser['notelp'].')</td>
                                                    <td>'.$order['tgl_order'].'</td>
                                                    <td>Rp'.$order['total'].'</td>
                                                    <td>'.$tarikstatus['ket_status'].'</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="adm_pesanandetail.php?id='.$order['no_order'].'" role="button"><i class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                ';
                                                $i==$i++;
                                            }
                                            echo '
                                                    </tbody>
                                                </table>
                                            ';
                                        // }
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
        <script src="css/scripts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="css/datatables-demo.js"></script> 
    </body>
</html>