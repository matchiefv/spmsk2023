<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("pembeli_menu.php");

    $idpembeli = $_SESSION["idpengguna"];
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<div class="carian">
    <form class="carian" action="pembeli_produk.php" method="post">
       <label>Harga Maksima<input class="carian" type="text" name="maksima"></label>
       <label>Jenama<input class="carian" type="text" name="jenama"></label>
       <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</div>

<table class="produk">
    <?php
        $syarat = "";
        $tajuk = "SEMUA JENAMA";
        if (isset($_POST["submit"])) {    
            $jenama = $_POST["jenama"];
            $maksima = $_POST["maksima"];
            if ($jenama != NULL && $maksima == NULL) {
                $tajuk = "JENAMA $jenama";
                $syarat = "where namaproduk like '%$jenama%' ";
            }
            else if ($jenama == NULL && $maksima != NULL) {
                $tajuk = "HARGA <= $maksima";
                $syarat = "where harga <= $maksima";
            }
            else if ($jenama != NULL && $maksima != NULL) {
                $tajuk = "JENAMA $jenama DAN HARGA <= $maksima";
                $syarat = "where namaproduk like '%$jenama%' and harga <= $maksima";
            } 
        }
        
        echo "<caption>SENARAI PRODUK $tajuk</caption>";
    
        $sql = "select * from produk ".$syarat;

        $result = mysqli_query($sambungan, $sql);
        $bilangan = 0;
        while($produk = mysqli_fetch_array($result)) {
            if ($bilangan % 3 == 0) {
                echo "<tr class='produk'>";
            }
            
            echo "<td class='produk'>
                        <img width=200 src='imej/".$produk['gambar']."'><br>     
                        $produk[namaproduk]<br>RM $produk[harga]<br><br>
                        <a class='maklumat' href='produk_maklumat.php?idproduk=$produk[idproduk]'>
                        Maklumat</a>
                        <a class='banding' href='bandingan_insert.php?idpembeli=$idpembeli
                        &&idproduk=$produk[idproduk]'>Banding</a>
                   </td>";
        
            $bilangan = $bilangan + 1;
            
            if ($bilangan % 3 == 0) {
                echo "</tr>";
            }
        }
?>
</table>

<center><button class="cetak" onclick="window.print()">Cetak</button></center>


