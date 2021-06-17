<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "goedang";
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
            
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // function upload(){
    //     $filename = $_FILES['img_produk']['name'];
    //     $filesize = $_FILES['img_produk']['size'];
    //     $error = $_FILES['img_produk']['error'];
    //     $tmpname = $_FILES['img_produk']['tmp_name'];
    
    //     if($error === 4){
    //         echo "
    //         <script> 
    //             alert('Pilih gambar untuk diunggah');
    //         </script>
    //         ";
    //         return false;
    //     }

    //     $validextension = ['jpg', 'jpeg', 'png'];
    //     $ekstensigambar = explode('.' , $filename);
    //     $ekstensigambar = strtolower(end($ekstensigambar));
    
    //     if(!in_array($ekstensigambar, $validextension)){
    //         echo "
    //         <script> 
    //             alert('Jenis file yang dipilih tidak valid');
    //         </script>
    //         ";
    //         return false;
    //     }
    
    //     if($filesize > 10000000) {
    //         echo "
    //         <script> 
    //             alert('File terlalu besar');
    //         </script>
    //         ";
    //         return false;
    //     }

    //     $filenamenew = uniqid();
    //     $filenamenew .= '.';
    //     $filenamenew .= $ekstensigambar;
        
    //     move_uploaded_file($tmpname, 'img/' . $filenamenew);
    
    //     return $filenamenew;
    // }
?>