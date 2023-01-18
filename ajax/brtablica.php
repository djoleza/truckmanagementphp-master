<?php

require '../connection.php';

$SQL = "SELECT kamion.*, vozac.ime_prezime FROM kamion JOIN vozac ON kamion.vozac_id = vozac.id WHERE dostupnost='da'
AND tablice LIKE '%" . $_POST['tablice'] . "%'";
$result = $connection->query($SQL);

while ($truck = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td>
            <?php echo $truck['tablice'] ?>
        </td>
        <td>
            <?php echo $truck['ime_prezime'] ?>
        </td>
        <td>
            <?php echo $truck['model'] ?>
        </td>
        <td>
            <?php echo $truck['km'] ?>
        </td>
    </tr>
<?php
}
?>