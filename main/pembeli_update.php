<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("penjual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="pembeli">
    <caption>SENARAI NAMA PEMBELI</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from pembeli";
        $result = mysqli_query($sambungan, $sql);
        while($pembeli = mysqli_fetch_array($result)) {
        $idpembeli = $pembeli["idpembeli"];
        echo "<tr>  <td>$pembeli[idpembeli]</td>
                    <td class='nama'>$pembeli[namapembeli]</td>
                    <td>$pembeli[password]</td>
                    <td>
                        <a href='pembeli_update.php?idpembeli=$idpembeli'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
                    <td>
                        <a href='javascript:padam(\"$idpembeli\");'>
                            <img src='imej/delete.png'>
                        </a>
                    </td>
               </tr>";
        }
    ?>
</table>

<script>
    function padam(id)    {
        if (confirm("Adakah anda ingin padam") == true) {
            window.location="pembeli_delete.php?idpembeli=" + id;
        }
    }
</script>