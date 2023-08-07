<?php
    include("keselamatan.php");
    include("sambungan.php");

    $idproduk = $_GET["idproduk"];

    $sql = "delete from produk where idproduk = '$idproduk' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='produk_senarai.php'</script>";
?>