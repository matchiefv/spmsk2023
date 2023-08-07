<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("pembeli_menu.php");
	
	$idpembeli = $_SESSION["idpengguna"];
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<table>
    <caption>PERBANDINGAN PRODUK</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th>Tindakan</th>
    </tr>

    <?php
        $sql = "select * from bandingan 
                join produk on bandingan.idproduk = produk.idproduk
                where idpembeli = '$idpembeli' ";
        $result = mysqli_query($sambungan, $sql);
        while($produk = mysqli_fetch_array($result)) {
         echo "<tr> <td>$produk[idproduk]</td>
                    <td>$produk[namaproduk]</td>
                    <td><img width=150 src='imej/$produk[gambar]'></td>   
                    <td>$produk[keterangan]</td>
                    <td>RM $produk[harga]</td>
					<td>
                        <a href='bandingan_delete.php?idbandingan=$produk[idbandingan]'>
                             <img src='imej/delete.png'>
                        </a>
                     </td>
               </tr>";
        }
    ?>
</table>

<center><button class="cetak" onclick="window.print()">Cetak</button></center>