<?php
    include("keselamatan.php");
    include("sambungan.php");
    
    $status = $_SESSION["status"];
    if ($status == "pembeli") 
        include("pembeli_menu.php");
    else
        include("penjual_menu.php");

	if (isset($_GET["idproduk"]))
        $idproduk = $_GET["idproduk"];

	$sql = "select * from produk where idproduk = '$idproduk'";


	$result = mysqli_query($sambungan, $sql);
	while($produk = mysqli_fetch_array($result)) {
        $gambar = $idproduk.".png";
        $namaproduk = $produk["namaproduk"];
        $harga = $produk["harga"];
        $keterangan = $produk["keterangan"];
	}
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<table class="maklumat">
<caption>MAKLUMAT PRODUK</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="maklumat">ID Produk</td>
    <td class="maklumat"><?php echo $idproduk; ?></td>
</tr>     
<tr>
    <td class="maklumat">Gambar</td>
    <td class="maklumat"><?php echo "<img width=300 src='imej/".$gambar."'>";?></td>
</tr>
<tr>
    <td class="maklumat">Nama</td>
    <td class="maklumat"><?php echo $namaproduk; ?></td>
</tr>
<tr>
    <td class="maklumat">Harga</td>
    <td class="maklumat">RM <?php echo $harga; ?></td>
</tr>
<tr>
    <td class="maklumat">Keterangan</td>
    <td class="maklumat"><?php echo $keterangan; ?></td>
</tr>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>