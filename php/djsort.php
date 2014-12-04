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

$query = "SELECT first_name, last_name, email FROM dj ORDER BY " . $option;

try {
  $stmnt = $pdo->prepare($query);
  $stmnt->execute();
  $djs = $stmnt->fetchAll();
} catch(PDOException $e) {
    echo 'error: ' . $e->getMessage();
}

foreach( $djs as $row ): 
  ?>
  <tr>
    <td class="first_name"><?= $row["first_name"] ?></td>
    <td class="last_name"><?= $row["last_name"] ?></td>
    <td class="email"><?= $row["email"] ?></td>
    <td class="action"><button>FCC Logs</button></td>
  </tr>
<?php endforeach; ?>
