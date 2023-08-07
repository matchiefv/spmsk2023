<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("penjual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<div class="carian">
    <form class="carian" action="produk_senarai.php" method="post">
       <label>Harga Maksima<input class="carian" type="text" name="maksima"></label>
       <label>Jenama<input class="carian" type="text" name="jenama"></label>
       <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th colspan="3">Tindakan</th>
    </tr>

    <?php
        $syarat = "";
        $tajuk = "SEMUA JENAMA";
        if (isset($_POST["submit"])) {    
            $jenama = $_POST["jenama"];
            $maksima = $_POST["maksima"];
            if ($jenama != NULL && $maksima == NULL) {
                $tajuk = "JENAMA $jenama";
                $syarat = "where namaproduk like '%$jenama%'";
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
        while($produk = mysqli_fetch_array($result)) {
         $idproduk = $produk["idproduk"];   
         echo "<tr> <td>$produk[idproduk]</td>
                    <td>$produk[namaproduk]</td>
                    <td><img width= 100 src= 'imej/$produk[gambar]'></td>   
                    <td>$produk[keterangan]</td>
                    <td>RM $produk[harga]</td>
                    <td>
                        <a href='produk_update.php?idproduk=$idproduk' title='update'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
					<td>
                        <a href='javascript:padam(\"$idproduk\");' title='delete'>
                            <img src='imej/delete.png'>
                        </a>
                    </td>
                    <td>
                        <a href='produk_maklumat.php?idproduk=$idproduk' title='maklumat'>
                             <img src='imej/info2.png'>
                        </a>
                    </td>
               </tr>";
        }
    ?>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>

<script>
    function padam(id)    {
        if (confirm("Adakah anda ingin padam") == true) {
            window.location = "produk_delete.php?idproduk=" + id;
        }
    }
</script>