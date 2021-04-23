<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Registrasi | Goedang</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <style>
      .bg-image {
        background-image: url('img/regist.jpg');
        background-size: cover;
        background-position: center;
      }
    </style>

  </head>
  <body>
  <?php
    require_once "connect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $nama = $_POST['nama'];
      $nik = $_POST['nik'];
      $email = $_POST['email'];
      $passwd = $_POST['kataSandi'];
      $hashpass = password_hash($password, PASSWORD_DEFAULT);
      $notelp = $_POST['notelp'];
      $nama_toko = $_POST['nama_toko'];
      $no_toko = $_POST['nib'];
      $alamat_toko = $_POST['alamat_toko'];

      //Query input menginput data kedalam tabel user
      $sql = "INSERT INTO user (nama, nik, email, passwd, notelp, nama_toko, no_toko, alamat_toko) VALUES ('$nama','$nik','$email','$hashpass','$notelp','$nama_toko','$no_toko','$alamat_toko')";

      //Mengeksekusi/menjalankan query diatas 
      $hasil = mysqli_query($link,$sql);

      //Kondisi apakah berhasil atau tidak
      if ($hasil) {
        echo "
        <div class='alert alert-success' role='alert'>
        Registrasi berhasil!
      </div>";
        header("location: login.php");
        exit;
      } else{
        echo "
        <div class='alert alert-danger' role='alert'>
        Registrasi gagal. Coba lagi.
      </div>
        ";
      }
    }
    ?>
    <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4 text-center">Registrasi</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                      <h5 class="mb-3">Identitas Diri</h5>
                      <div class="form-label-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required autofocus>
                        <label for="nama">Nama Lengkap</label>
                      </div>
                      <div class="col form-label-group">
                        <input type="text" id="notelp" name="notelp" class="form-control" placeholder="Nomor Telepon" required >
                        <label for="notelp">Nomor Telepon</label>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Alamat Email" required >
                            <label for="email">Alamat Email</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-label-group">
                            <input type="password" id="kataSandi" name="kataSandi" class="form-control" placeholder="Password" required>
                            <label for="kataSandi">Kata Sandi</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-label-group">
                        <input type="text" id="nik" name="nik" class="form-control" placeholder="Nomor KTP" required>
                        <label for="nik">Nomor KTP</label>
                      </div>

                      <br>
                      <h5 class="mb-3">Profil Toko</h5>
                      <div class="row">
                        <div class="col">
                          <div class="form-label-group">
                            <input type="text" id="nama_toko" name="nama_toko" class="form-control" placeholder="Nama Toko" required>
                            <label for="nama_toko">Nama Toko</label>
                          </div>
                        </div>
                        

                        <div class="col">
                          <div class="form-label-group">
                            <input type="text" id="nib" name="nib" class="form-control" placeholder="Nomor Induk Berusaha">
                            <label for="nib">Nomor Induk Berusaha</label>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-label-group">
                        <textarea class="form-control" placeholder="Alamat Toko" id="alamat_toko" name="alamat_toko" style="height: 75px" required></textarea>
                        <label for="alamat_toko">Alamat Toko</label>
                      </div>
  
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="submit">Registrasi</button>
                      </div>
                      <div class="text-end">
                        <small>Sudah memiliki akun? <a href="#">Masuk</a></small>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  </body>
</html>
