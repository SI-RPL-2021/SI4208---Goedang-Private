<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Status Pemesanan</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow mb-5 bg-body rounded">
            <div class="container-fluid d-flex justify-content-around">
              <a class="navbar-brand" href="#">
                <img src="[logo].png" alt="" height="40">
              </a>
              <form class="w-50">
                <div class="input-group border rounded-pill">
                  <input type="search" placeholder=" Cari Produk atau Nama Brand" aria-describedby="button-addon3" class="form-control bg-none border-0">
                  <div class="input-group-append border-0">
                    <button id="button-addon3" type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
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
                    <a class="nav-link" href="#">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                  </li>
                </ul>
              
            </div>
          </nav>
          <br><br><br><br><br>
        <div class="card">
            <h5 class="card-header" style="font-family: 'Courier New', Courier, monospace;">NO. PESANAN <strong>20211803BBH56</strong></h5>
            <div class="card-body">
              <h4 class="card-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Status Pesanan</h4>
              <br>
              <center><div class="d-grid gap-2 d-md-block">
                  <div class="badge bg-primary text-wrap" style="width: 8rem; font-size: large;">
                    Pesanan Dibuat
                  </div>
                  <div class="badge bg-primary text-wrap" style="width: 8rem; font-size: large;">
                    Pesanan Dibayar
                  </div>
                  <div class="badge bg-secondary text-wrap" style="width: 8rem; font-size: large;">
                    Pesanan Dikirim
                  </div>
                  <div class="badge bg-secondary text-wrap" style="width: 8rem; font-size: large;">
                    Pesanan Sampai
                  </div>
              </div></center>
              <br>
              <div class="container">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID Status</th>
                      <th scope="col">ID Order</th>
                      <th scope="col">Keterangan Status</th>
                      <th scope="col">Timestamp</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  <?php
                  $sql = "SELECT * FROM pesanan_status";
                  $query = mysqli_query($db, $sql);

                  while($status = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$status['id_status']."</td>";
                    echo "<td>".$status['id_order']."</td>";
                    echo "<td>".$status['ket_status']."</td>";
                    echo "<td>".$status['timestamp']."</td>";

                  }
                  ?>

                  </tbody>
                </table>
              </div>
              <br>
              <p class="fw-light" style="color: gray;">______________________________________________________________________________________________________________________________________________________________________________________________</p>
              <h4 class="card-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Detail Produk</h4>
              <div class="mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-3">
                    <img src="oreo.jpg" style="width: 8rem;" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif;"><strong>Oreo 137g</strong></h5>
                      <p class="card-text" style="font-family: 'Times New Roman', Times, serif;">x1 Box Varian Original</p>
                    </div>
                  </div>
                </div>
              </div>
              <p class="fw-light" style="color: gray;">______________________________________________________________________________________________________________________________________________________________________________________________</p>
              <h4 class="card-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Detail Pengiriman</h4>
              <p class="card-text" style="font-family: 'Times New Roman', Times, serif;"><strong>Nama Pembeli :</strong> Muhammad Budi</p>
              <p class="card-text" style="font-family: 'Times New Roman', Times, serif;"><strong>Nama Toko :</strong> Toko Kuningan</p>
              <p class="card-text" style="font-family: 'Times New Roman', Times, serif;"><strong>No. Telp :</strong> (+62) 85123456789</p>
              <p class="card-text" style="font-family: 'Times New Roman', Times, serif;"><strong>Alamat :</strong> Alamat : Jl. Lele Kuning No. 33, Kelurahan Margaasih, Kecamatan Margaasih, Kabupaten Bandung, Jawa Barat, Kode Pos 40215</p>
              

              
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>