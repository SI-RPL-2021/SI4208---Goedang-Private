<?php

require_once "config.php";

session_start();

$id = $_GET['id'];
mysqli_query($link, "DELETE FROM cabang_gudang WHERE id = $id");
$cek = mysqli_affected_rows($link);  

    if($cek > 0){
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'data_cabang.php';
            </script>
        ";
    }
 else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'data_cabang.php?id=".$id."';
        </script>
    ";
}


?>