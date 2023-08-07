<?php
    include("keselamatan.php");
    include("sambungan.php");

    $idbandingan = $_GET["idbandingan"];

    $sql = "delete from bandingan where idbandingan = '$idbandingan'"; 
    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='bandingan_senarai.php'</script>";
?>