<?php
    $host = "localhost";
    $user = "root";             
    $password = "";       
    $database = "kedai";                      

    $sambungan = mysqli_connect($host, $user, $password, $database)
    or die("Sambungan gagal");
?>