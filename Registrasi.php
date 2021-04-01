

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body> 
    <div class="container">
        <!--Image-->
        <span class="image"><img src="regist.jpg" class="img" alt="Warehouse Picture"></span>
        <!--Form-->
        <div class="form">
            <div class="heading">
                <h1>Registration</h1>
                <p>Silahkan Masukan Data Diri Anda</p>
                <hr/>
                <p> Identitas Diri </p>
            </div>
            <form action="config.php" method="post">
            <div class="warp">
                <div class="f1">
                    <h3 class="name">Nama Lengkap</h3>
                    <input class="nama" name = "nama" type="text" >
                    <span class="focus-input"></span>
                </div>
                <div class="f2">
                    <h3 class="name">Email</h3>
                    <input class="email" name = "email"type="email">
                    <span class="focus-input"></span>
                </div>
                <div class="f3">
                    <h3 class="name">Nomor Telepon</h3>
                    <input class="nomor" name = "notelp" type="text">
                    <span class="focus-input"></span>
                </div>
                <div class="f4">
                    <h3 class="name">Kata Sandi</h3>
                    <input class="password" name = "passwd" type="password">
                    <span class="focus-input"></span>
                </div>
                <div class="f5">
                    <h3 class="name">Nomor KTP</h3>
                    <input class="ktp" name = "nik" type="number">
                    <span class="focus-input"></span>
                </div>
            </div>
            <p class="Profil">Profil Toko</p>
            <div class="warp2">
                <div class="g1">
                    <h3 class="name">Nama Toko</h3>
                    <input class="toko" name = "nama_toko" type="text">
                    <span class="focus-input"></span>
                </div>
                <div class="g2">
                    <h3 class="name">Nomor Induk Toko</h3>
                    <input class="induk" name = "no_toko" type="text">
                    <span class="focus-input"></span>
                </div>
                <div class="g3">
                    <h3 class="name">Alamat</h3>
                    <input class="alamat" name = "alamat_toko" type="text">
                    <span class="focus-input"></span>
                </div>
            </div>

            <!--Button-->
            <button class="btn">Daftar</button>
            <div class="login">
                <p>Sudah Mempunyai Akun ? <a class="masuk" href="Login.html">Masuk</a></p>
            </div>
        </div>
    </div> 
</form> 
</body>
</html>