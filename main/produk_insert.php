<?php
    include("keselamatan.php");
	include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idproduk = $_POST["idproduk"];
        $namaproduk = $_POST["namaproduk"];
		$harga = $_POST["harga"];
		$keterangan = $_POST["keterangan"];
	       
        $idpenjual = $_POST["idpenjual"];
        
        $namafail = $idproduk.".png";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "imej/".basename($namafail));
        
		$sql = "insert into produk values('$idproduk', '$namaproduk', '$keterangan', '$namafail', $harga, '$idpenjual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<br><center>Berjaya tambah</center>";
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH PRODUK</h3>
<form class="panjang" action="produk_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
           <td>ID Produk</td>
           <td><input required type="text" name="idproduk"></td>
        </tr>
        <tr>
            <td>Nama produk</td>
            <td><input type="text" name="namaproduk"></td>
        </tr>
        <tr>
            <td>Gambar 500x500</td>
            <td><input type="file" name="namafail" accept=".png"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><textarea name="keterangan" cols="24" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>Penjual</td>
            <td>
                <select name="idpenjual">
                <?php
                    $sql = "select * from penjual";
                    $data = mysqli_query($sambungan, $sql);
                    while($penjual = mysqli_fetch_array($data)){
                    echo "<option value='$penjual[idpenjual]'>$penjual[namapenjual]</option>";
                    }
                ?>
                </select>
            </td>
        </tr>     
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>