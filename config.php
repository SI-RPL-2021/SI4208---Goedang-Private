<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "goedang";
    $config = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
            
    if (!$config) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>