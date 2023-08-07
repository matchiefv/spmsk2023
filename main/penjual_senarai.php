<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("penjual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="penjual">
    <caption>SENARAI NAMA PENJUAL</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>
    
    <?php
        $sql = "select * from penjual";
        $result = mysqli_query($sambungan, $sql);
        while($penjual = mysqli_fetch_array($result)) {
        $idpenjual = $penjual["idpenjual"];
        echo "<tr>  <td>$penjual[idpenjual]</td>
                    <td class='nama'>$penjual[namapenjual]</td>
                    <td>$penjual[password]</td>
					<td>
                        <a href='penjual_update.php?idpenjual=$penjual[idpenjual]'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
					<td>
                        <a href='javascript:padam(\"$idpenjual\");'>
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
            window.location = "penjual_delete.php?idpenjual=" + id;
        }
    }
</script>