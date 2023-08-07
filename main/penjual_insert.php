<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpenjual = $_POST["idpenjual"];
		$password = $_POST["password"];
		$namapenjual = $_POST["namapenjual"];
		
		$sql = "insert into penjual values('$idpenjual', '$password', '$namapenjual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<br><center>Berjaya tambah</center>";
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH PENJUAL</h3>
<form class="panjang" action="penjual_insert.php" method="post">
    <table>
        <tr>
            <td>ID Penjual</td>
            <td><input required type="text" name="idpenjual"></td>
        </tr>
        <tr>
            <td>Nama Penjual</td>
            <td><input type="text" name="namapenjual"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="max: 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>