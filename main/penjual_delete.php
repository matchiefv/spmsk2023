<?php
    include("sambungan.php");
    include("penjual_menu.php");

    $idpenjual = $_GET["idpenjual"];

    $sql = "delete from penjual where idpenjual = '$idpenjual' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='penjual_senarai.php'</script>";
?>