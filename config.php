<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "goedang";
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
            
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>