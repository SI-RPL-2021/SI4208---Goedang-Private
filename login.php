<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <style>
      .bg-image {
        background-image: url('img/dus.jpg');
        background-size: cover;
        background-position: center;
      }
  </style>
  </head>
  <body>
    <?php 

    require_once "config.php";
    
    $email = $passwd = $hashpass = '';
  
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $email = $_POST['email'];
      $passwd = $_POST['passwd'];
      
      $sql = mysqli_query($link, "SELECT * FROM user WHERE email = '".$email."'");
      $result = mysqli_fetch_assoc($sql);

      $id = $result['id'];
      $hashpass = $result['passwd'];

      if(password_verify($passwd, $hashpass)){
       
        session_start();
      
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        
        if($_POST['remember']=='Remember Me'){
          $hour = time() + 3600 * 24 * 30;
          setcookie('email', $email, $hour);
          setcookie('passwd', $hashpass, $hour);
        }
        
        if($_SESSION['id'] == 1){
          header("location: adm_registereduser.php");
        } else{
          header("location: landing.php");
        }
        
      } else{
        
        echo "The password you entered was not valid.";
      }
     
      mysqli_close($link);
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
                    <h3 class="login-heading mb-4">Selamat datang kembali!</h3>
                    <form action="" method="POST">
                      <div class="form-label-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                        <label for="email">Alamat Email</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" required>
                        <label for="passwd">Kata Sandi</label>
                      </div>
      
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="Remember Me">
                        <label class="custom-control-label" for="remember">Ingatkan saya</label>
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Masuk</button>
                    </div>
                      <div class="text-center">
                        <small>Belum daftar akun? <a href="Registrasi.php">Registrasi</a></small></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
