<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Email</th>
            <th>No. Telp</th>
            <th>Password</th>
            <th>Nama Toko</th>
            <th>No. Toko</th>
            <th>Alamat Toko</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM user";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['nik']."</td>";
            echo "<td>".$siswa['email']."</td>";
            echo "<td>".$siswa['notelp']."</td>";
            echo "<td>".$siswa['passwd']."</td>";
            echo "<td>".$siswa['nama_toko']."</td>";
            echo "<td>".$siswa['no_toko']."</td>";
            echo "<td>".$siswa['alamat_toko']."</td>";

            echo "<td>";
            echo "<a href='edit akun profil.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>