<?php 
session_start();
include_once('db.php');
$database = new database();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($username,$password,$remember))
    {
      header('location:login.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=" Bootstrap contributors">
    <title>Login Form</title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
 
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
 
    <style>
      .bd-placeholder-img {
        font-size: 1rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
 
      @media (min-width: 500px) {
        .bd-placeholder-img-lg {
          font-size: 1.5rem;
        }
      }
      #card {
        background: #fbfbfb;
        border-radius: 4px;
        box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.30);
        height: 470px;
        margin: 3rem auto 5.1rem auto;
        width: 350px;
}
      .satu {
        font-size: 12px;
        }
      .dua {
      font-size: 12px;
       }
       .tiga {
        font-size: 14px;
        }
      .empat {
      font-size: 14px;
       }
    </style>
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <div id="card">
  <div class="text-center">
    <img class="" src="logonew.png" alt="" width="100" height="100">
  <div class="text-left">
  <form class="form-signin" method="post" action="">
    <p class="font-weight-bold">Masuk<p>
    <p class="tiga">Nomor HP atau email<p>
    <label for="username" class="sr-only">Email</label>
    <input type="text" id="username" class="form-control" placeholder="email@goedang.com" name="username" required autofocus>
    
    <p class="empat">Password<p>
    <label for="password" class="sr-only">Password</label>
    <input type="text" id="password" class="form-control" placeholder="Password" name="password" required>
  <div class="dua">
    <label>
      <input type="checkbox" value="remember-me" name="remember" class="dua"> Ingatkan Saya
    </label>
    </br>
  <div class="text-center">
    <button class="btn btn-primary" type="submit" style.display='block'  name="login">Masuk</button>
  </br>
  </br>
  <div class="text-left">
    <p class="satu" style="text-muted" >Toko anda belum terdaftar di Goedang <a href="#"  class="w3-text-blue">Registrasi</a></p>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

<style type="text/css">
body {
background: url(storage.jpg) no-repeat fixed;
   -webkit-background-size: 100% 100%;
   -moz-background-size: 100% 100%;
   -o-background-size: 100% 100%;
   background-size: 100% 100%;
}
</style>


</body>
</html>