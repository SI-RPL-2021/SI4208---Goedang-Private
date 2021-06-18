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

  $no_order = $_GET['id'];

  $selectorder = mysqli_query($link, "SELECT * FROM pesanan WHERE no_order='".$no_order."'");
  $order = mysqli_fetch_assoc($selectorder);

  $selectorderdetail = mysqli_query($link, "SELECT * FROM order_detail WHERE no_order='".$no_order."'");
  
  $selectcust = mysqli_query($link, "SELECT * FROM user WHERE id='".$order['id_user']."'");
  $cust = mysqli_fetch_assoc($selectcust);

  $selectstatus = mysqli_query($link, "SELECT * FROM pesanan_status WHERE no_order='".$order['no_order']."' ORDER BY id_status DESC");
  
  $selectstatuscurr = mysqli_query($link, "SELECT ket_status FROM pesanan_status WHERE no_order='".$order['no_order']."' ORDER BY id_status DESC LIMIT 1");
  $statuscurr = mysqli_fetch_assoc($selectstatuscurr);

  $selectpay = mysqli_query($link, "SELECT * FROM pembayaran WHERE no_order='".$no_order."'");
  $cek1 = mysqli_num_rows($selectpay);

  if(isset($_POST['validasi'])){
    $ket_status1 = "Pembayaran sudah Diverifikasi.";
    $ket_status = "Pembayaran sudah Diverifikasi. Pembayaran telah diterima Goedang dan pesanan akan diproses.";
    // $timestamp = date('Y-m-d H:i:s');

    $query3 = "UPDATE pembayaran SET status_bayar='$ket_status1' WHERE no_order='".$no_order."'";
    mysqli_query($link, $query3);
    $cek2 = mysqli_affected_rows($link);
    if($cek2 > 0){
      $querystatus = "INSERT INTO pesanan_status (no_order, ket_status) VALUES ('$no_order', '$ket_status')";
      mysqli_query($link, $querystatus);
      echo '
        <script>
            alert("Pembayaran sudah Diverifikasi");
            document.location.href = "adm_pesanandetail.php?id='.$no_order.'";
        </script>
        ';
    } else {
    echo '
        <script>
            alert("Pembayaran Gagal Diverifikasi");
            document.location.href = "adm_pesanandetail.php?id='.$no_order.'";
        </script>
    ';
    }
  }

  if(isset($_POST['update'])){
    $gantistat = $_POST['pilih_stat'];

    $querygstatus = "INSERT INTO pesanan_status (no_order, ket_status) VALUES ('$no_order', '$gantistat')";
    mysqli_query($link, $querygstatus);

    $cek = mysqli_affected_rows($link);

    if($cek > 0){
            echo "
                <script>
                    alert('Status Pesanan berhasil diupdate');
                    document.location.href = 'adm_pesanandetail.php?id=".$no_order."';
                </script>
            ";
        
    } else {
        echo "
            <script>
                alert('Status Pesanan gagal diupdate');
                document.location.href = 'adm_pesanandetail.php?id=".$no_order."';
            </script>
        ";
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  </head>
  
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
      <a class="navbar-brand" href="index.html"><img src="img/[logo].png" alt="" style="display: block;" class="mx-auto" height="42"></a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
      
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
          <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
      
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
                    <div class="container px-5">
                        <h1 class="mt-4">Detail Pesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="adm_pesanan.php">Pesanan</a></li>
                            <li class="breadcrumb-item active">Detail Pesanan</li>
                        </ol>
                        <div class="card mb-4">
                          <div class="card-header">
                            <i class="fas fa-users mr-1"></i>
                            NO. PESANAN <strong><?=$no_order?></strong>
                          </div>
                          <div class="card-body p-4">
                            <div class="row">
                              <div class="col">
                                <form class="px-4">
                                  <div class="row mb-3">
                                    <label for="tgl_beli" class="col-sm-4 col-form-label">Tanggal Pembelian</label>
                                    <div class="col-sm-8">
                                      <input type="text" readonly class="form-control-plaintext" id="tgl_beli" name="tgl_beli" value="<?=$order['tgl_order']?>">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="stats_curr" class="col-sm-4 col-form-label">Status Pesanan</label>
                                    <div class="col-sm-6">
                                      <textarea class="form-control-plaintext" readonly id="stats_curr" name="stats_curr" rows="2"><?=$statuscurr['ket_status']?></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addStatus">Update</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="col">
                                <form class="px-4">
                                  <div class="row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                      <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?=$cust['nama']?>">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="notelp" class="col-sm-2 col-form-label">No. Telp</label>
                                    <div class="col-sm-8">
                                      <input type="text" readonly class="form-control-plaintext" id="notelp" name="notelp" value="<?=$cust['notelp']?>">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                      <textarea class="form-control-plaintext" readonly id="alamat" name="alamat" rows="2"><?=$cust['alamat_toko']?></textarea>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            
                            <div class="row">
                              <h5 class="my-3">Detail Produk Pesanan</h5>
                              <div class="px-5">
                                <table class="table table-hover table-bordered">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="35">#</th>
                                      <th scope="col" colspan="2">Nama Produk</th>
                                      <th scope="col" width="90">Jumlah</th>
                                      <th scope="col" width="90">Berat</th>
                                      <th scope="col">Harga</th>
                                      <th scope="col" width="230">Subtotal Item</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $i=1;
                                    while($orderdetail = mysqli_fetch_assoc($selectorderdetail)){
                                      $selectprod = mysqli_query($link, "SELECT * FROM produk WHERE id_produk='".$orderdetail['id_produk']."'");
                                      $produk = mysqli_fetch_assoc($selectprod);

                                      $selectimg = mysqli_query($link, "SELECT images FROM produk_img WHERE id_produk='".$produk['id_produk']."'");
                                      $j = 0;
                                      while($img = mysqli_fetch_assoc($selectimg)){
                                        if($j==0){
                                          $produk_img = $img['images'];
                                        }
                                        $j == $j++;
                                      }

                                      echo "
                                      <tr>
                                        <th scope='row'class='text-center'>".$i."</th>
                                      ";
                                      echo '
                                        <td width="85"><img src="uploads/'.$produk_img.'" class="img-thumbnail" style="width: 70px;"></td>
                                        <td>'.$produk['nama_produk'].'</td>
                                        <td>'.$orderdetail['qty_order'].'</td>
                                        <td>'.$produk['berat'].' gr</td>
                                        <td>Rp '.$produk['harga'].'</td>
                                        <td>Rp '.$orderdetail['subtotal'].'</td>
                                      </tr>
                                      ';
                                      $i==$i++;
                                    }
                                    echo '
                                      <tr>
                                        <th scope="row" colspan="6" class="text-end table-primary">Total Belanja</th>
                                        <td class="table-primary"><strong>Rp '.$order['total'].'</strong></td>
                                      </tr>
                                    ';
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            
                            <div class="row">
                              <h5 class="my-3">Pembayaran</h5>
                              <div class="px-5">
                                <?php
                                if($cek1==0){
                                  echo '
                                  <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
                                    <p class="lead" style="text-align: center;">No category data.</p>
                                  </div>
                                  ';
                                } else{
                                  $pay = mysqli_fetch_assoc($selectpay);
                                  echo '
                                  <table class="table table-hover table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">Bank Asal</th>
                                        <th scope="col">Atas Nama</th>
                                        <th scope="col">Bank Tujuan</th>
                                        <th scope="col">Tanggal Transfer</th>
                                        <th scope="col">Jumlah Transfer</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" width="155">Action</th>
                                      </tr>
                                    </thead>  
                                    <tbody>
                                      <tr>
                                        <td>'.$pay['bank_asal'].'</td>
                                        <td>'.$pay['atas_nama'].'</td>
                                        <td>'.$pay['bank_tujuan'].'</td>
                                        <td>'.$pay['tgl_tf'].'</td>
                                        <td>'.$pay['jumlah_tf'].'</td>
                                        <td>'.$pay['status_bayar'].'</td>
                                        <td><form method="post">
                                          <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#buktiTf"><i class="fas fa-eye"></i> Bukti</button>
                                          
                                          <button type="submit" class="btn btn-primary btn-sm" id="validasi" name="validasi"
                                  ';
                                  if($pay['status_bayar']!=='Menunggu verifikasi'){
                                    echo'
                                    disabled
                                  ';
                                  }
                                  echo'>Validasi</button></form>
                                  </td>
                                        
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                  ';
                                }
                                ?>
                                
                              </div>
                            </div>

                            <div class="row">
                              <h5 class="my-3">Detail Status Pesanan</h5>
                              <div class="px-5">
                                <table class="table table-hover table-bordered">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="270">Tanggal, Waktu</th>
                                      <th scope="col">Keterangan Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    while($status = mysqli_fetch_assoc($selectstatus)){
                                      echo '
                                      <tr>
                                        <td class="table-secondary">'.$status['timestamp'].'</td>
                                        <td>'.$status['ket_status'].'</td>
                                      </tr>
                                      ';
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="addStatus" tabindex="-1" aria-labelledby="addStatus" aria-hidden="true">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Status Pesanan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    <form class="p-2" action="" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="pilih_stat" class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <label class="visually-hidden" for="pilih_stat">Status</label>
                                                <select class="form-select" id="pilih_stat" name="pilih_stat">
                                                    <option disabled>Pilih...</option>
                                                    <option value="Pesanan berhasil dibuat. Menunggu pembayaran." 
                                                    <?php if ($statuscurr['ket_status']=="Pesanan berhasil dibuat. Menunggu pembayaran."){
                                                      echo 'selected';
                                                    }?>
                                                    >Pesanan berhasil dibuat. Menunggu pembayaran.</option>
                                                    <option value="Pembayaran telah dilakukan. Menunggu verifikasi Pembayaran."
                                                    <?php if ($statuscurr['ket_status']=="Pembayaran telah dilakukan. Menunggu verifikasi Pembayaran."){
                                                      echo 'selected';
                                                    }?>
                                                    >Menunggu verifikasi Pembayaran</option>
                                                    <option value="Pembayaran sudah Diverifikasi. Pembayaran telah diterima Goedang dan pesanan akan diproses."
                                                    <?php if ($statuscurr['ket_status']=="Pembayaran sudah Diverifikasi. Pembayaran telah diterima Goedang dan pesanan akan diproses."){
                                                      echo 'selected';
                                                    }?>
                                                    >Pembayaran sudah Diverifikasi.</option>
                                                    <option value="Pesanan sedang diproses. Pesanan Anda dalam proses packing dan persiapan pengiriman."
                                                    <?php if ($statuscurr['ket_status']=="Pesanan sedang diproses. Pesanan Anda dalam proses packing dan persiapan pengiriman."){
                                                      echo 'selected';
                                                    }?>
                                                    >Pesanan sedang diproses.</option>
                                                    <option value="Pesanan telah dikirim. Pesanan Anda dalam proses pengiriman oleh kurir."
                                                    <?php if ($statuscurr['ket_status']=="Pesanan telah dikirim. Pesanan Anda dalam proses pengiriman oleh kurir."){
                                                      echo 'selected';
                                                    }?>
                                                    >Pesanan telah dikirim.</option>
                                                    <option value="Transaksi selesai. Pesanan telah diterima."
                                                    <?php if ($statuscurr['ket_status']=="Transaksi selesai. Pesanan telah diterima."){
                                                      echo 'selected';
                                                    }?>
                                                    >Transaksi selesai.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" name="cancel" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="buktiTf" tabindex="-1" aria-labelledby="addStatus" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Bukti Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <img src="uploads/<?=$pay['bukti_tf']?>" class="img-thumbnail" style="">
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
