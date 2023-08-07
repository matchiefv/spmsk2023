<?php
    include("keselamatan.php");
	include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpembeli = $_POST["idpembeli"];
		$password = $_POST["password"];
		$namapembeli = $_POST["namapembeli"];

		$sql = "insert into pembeli values('$idpembeli', '$password', '$namapembeli')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<br><center>Berjaya tambah</center>";
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH PEMBELI</h3>
<form class="panjang" action="pembeli_insert.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Pembeli</td>
            <td><input required type="text" 
            name="idpembeli" placeholder="cth: P065"  
            pattern="[A-Z0-9]{4}" 
            oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
            oninput="this.setCustomValidity('')">
            </td>
        </tr>
        <tr>
            <td class="warna">Nama Pembeli</td>
            <td><input type="text" name="namapembeli" placeholder="cth: Hajar"></td>
        </tr>    
        <tr>
            <td class="warna">Password</td>
            <td><input type="text" name="password" placeholder="cth: 123"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

<br>
<center>
    <button class="biru"  onclick="tukar_warna(0)">Biru</button>
    <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
    <button class="merah" onclick="tukar_warna(2)">Merah</button>
    <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>

<script>
    function tukar_warna(n) {
        var warna = ["Blue", "Green", "Red", "Black"];
        var teks = document.getElementsByClassName("warna");
        for(var i=0; i<teks.length; i++)
            teks[i].style.color=warna[n];
    }
</script>