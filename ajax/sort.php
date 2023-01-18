 <?php
    require '../connection.php';

    $SQL = "SELECT prevoz.*, kamion.tablice FROM prevoz JOIN kamion ON prevoz.kamion_id = kamion.id ORDER BY cena " . $_POST['asc_desc'];
    $result = $connection->query($SQL);
    while ($truck = mysqli_fetch_assoc($result)) {
    ?>
     <tr>
         <td>
             <?php echo $truck['tablice'] ?>
         </td>
         <td>
             <?php echo $truck['datum'] ?>
         </td>
         <td>
             <?php echo $truck['cena'] ?>
         </td>
         <td>
             <?php echo $truck['polazak'] ?>
         </td>
         <td>
             <?php echo $truck['dolazak'] ?>
         </td>
     </tr>
 <?php
    }
    ?>