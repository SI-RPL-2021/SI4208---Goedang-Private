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

    <div class="wrapper">
    <?php $link = mysqli_connect("localhost", "root", "", "goedang");
        if (!ISSET($_POST['cari'])){
      $sql ="SELECT*FROM produk";
      $result= mysqli_query($link,$sql);
   
      while ($data = mysqli_fetch_assoc($result)):?>
        <section id="home">
            <img class="product" src="oreo.jpg" alt="Product">
            <div class="kolom">
                <div class="deskripsi">
                    <h2><?php echo $data['nama_produk']; ?> </h2>
                    <br>
                    <section>
                        <h1>Rp.<?php echo $data['harga']; ?></h1>
                        <p>/pcs</p><br>
                    </section>
                    <hr class="pendek">
                    <br>
                    <p>Rp.<?php echo $data['vendor']; ?></p>
                    <br>
                    <br>
                    <p><a href="" class="tbl-detail">Detail</a></p>
                </div>
            </div>
        </section>
    </div>
    <?php endwhile; }?>


    <hr/ class="garis">
        </div>
        <div class="wrapper">
        <?php $link = mysqli_connect("localhost", "root", "", "goedang");
        if (ISSET($_POST['cari'])){
        $cari = $_POST['cari'];
    $sql ="SELECT*FROM produk WHERE nama_produk LIKE '%$cari%'";
      $result= mysqli_query($link,$sql);
   
      while ($data = mysqli_fetch_assoc($result)):?>
        <section id="home">
            <img class="product" src="oreo.jpg" alt="Product">
            <div class="kolom">
                <div class="deskripsi">
                    <h2><?php echo $data['nama_produk']; ?> </h2>
                    <br>
                    <section>
                        <h1>Rp.<?php echo $data['harga']; ?></h1>
                        <p>/pcs</p><br>
                    </section>
                    <hr class="pendek">
                    <br>
                    <p>Rp.<?php echo $data['vendor']; ?></p>
                    <br>
                    <br>
                    <p><a href="" class="tbl-detail">Detail</a></p>
                </div>
            </div>
        </section>
    </div>
    <?php endwhile; }?>
        <hr/ class="garis">
</body>

</html>