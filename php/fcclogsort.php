<?php
/*
 * Author   => Sean Hellebusch | sahellebusch@gmail.com
 * Date     => 12.1.2014
 *
 * Script to sort users using the column headers as a GET sort option
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

include( 'hidden/pdo_connector.php' );

$connector = new PDO_Connector();
$pdo = $connector->connect();
$op_regex = "/^\w+$/";

if( !isset( $_GET["option"] ) || !preg_match( '/^[A-Za-z_]+$/', $_GET["option"] )):
  exit();
endif;

$option =  $_GET["option"];
$option = htmlspecialchars($option);

if(!preg_match($op_regex, $option)):
  exit();
endif;

$query = "SELECT * FROM fcclog ORDER BY " . $option;

try {
  $stmnt = $pdo->prepare($query);
  $stmnt->execute();
  $logs = $stmnt->fetchAll();
} catch(PDOException $e) {
    echo 'error: ' . $e->getMessage();
}

foreach( $logs as $row ): 
  ?>
  <tr>
    <td class="timestamp"><?= $row["timestamp"]?></td>
    <td class="dj"><?= $row["dj"] ?></td>
    <td class="showtime"><?= $row["showtime"]?></td>
    <td class="pavolts"><?= $row["pa_volts"]?></td>
    <td class="paamps"><?= $row["pa_volts"]?></td>
    <td class="fwrdpwr"><?= $row["fwrd_pwr"]?></td>
    <td class="readings"><?= $row["readings"]?></td>
    <td class="reading0"><?= $row["r_zero"]?></td>
    <td class="reading1"><?= $row["r_twelve"]?></td>
    <td class="reading2"><?= $row["r_twentynine"]?></td>
    <td class="reading3"><?= $row["r_fortysix"]?></td>
    <td class="reading4"><?= $row["r_fiftyfive"]?></td>
    <td class="notes"><?= $row["notes"] ?></td>
    <td class="signature"><?= $row["digital_signature"] ?></td>
  </tr>
<?php endforeach; ?>
