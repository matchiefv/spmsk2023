<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpenjual = $_POST["idpenjual"];
		$namapenjual = $_POST["namapenjual"];
		$password = $_POST["password"];

		$sql = "update penjual 
                set namapenjual = '$namapenjual', password = '$password' 
                where idpenjual = '$idpenjual' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<br><center>Berjaya kemaskini</center>";
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}

	if (isset($_GET['idpenjual']))
        $idpenjual = $_GET['idpenjual'];

	$sql = "select * from penjual where idpenjual = '$idpenjual' ";
	$result = mysqli_query($sambungan, $sql);
	while($penjual = mysqli_fetch_array($result)) {
		$password = $penjual['password'];
		$namapenjual = $penjual['namapenjual'];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PENJUAL</h3>
<form class="panjang" action="penjual_update.php" method="post">
    <table>
        <tr>
            <td>ID Penjual</td>
            <td><input type="text" name="idpenjual" value="<?php echo $idpenjual; ?>" ></td>
        </tr>
        <tr>
            <td>Nama Penjual</td>
            <td><input type="text" name="namapenjual" value="<?php echo $namapenjual; ?>" ></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>" ></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>