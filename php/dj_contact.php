<?php
/*
 * Author   => Sean Hellebusch | sahellebusch@gmail.com
 * Date     => 12.1.2014
 *
 * Script to retrieve all the users from the database and present
 * them in a table.  The user can click the column headers to sort
 * the table using asynchronous AJAX.
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

include( 'hidden/pdo_connector.php' );
$connector = new PDO_Connector();
$pdo = $connector->connect();

$query = "SELECT first_name, last_name, email FROM DJ;";


try {
    $stmnt = $pdo->prepare($query);
    $stmnt->execute();
    $djs = $stmnt->fetchAll();
  } catch(PDOException $e) {
      echo 'error: ' . $e->getMessage();
} 
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Callie Federer, Sean Hellebusch" />
    <link rel="stylesheet" href="../app.css">

    <title>KTRM DJ Website</title>
  </head>
  <body>
    <a id="logo-wrapper" href="../home.html"><img src="../img/edge_logo.jpg" id="logo" alt="Edge Logo" height="80" width="200"></a>  
    <nav class="links">
      <ul>
        <li><a href="../php/management.php">Management Info</a></li>
        <li><a href="../html/schedule.html">Schedule</a></li>
        <li><a href="../html/lyrics.html">Lyric Checker</a></li>
        <li><a href="../html/calendar.html">Calendar</a></li>
        <li>
          <a href="">Resources &#x25bc;</a>
          <ul>
            <li><a href="../html/how_to_itunes.html">iTunes Tips</a></li>
            <li><a href="../html/how_to_simian_format.html">Simian Format</a></li>
            <li><a href="../html/how_to_simian_liner.html">Simian Liner</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    
    <div class="main content">
      <table class="djs">
        <tr>
          <th class="first_name" id="first">First&uarr;&darr;</th>
          <th class="last_name" id="last">Last&uarr;&darr;</th>
          <th class="email" id="email">Email&uarr;&darr;</th>
          <th>Action</th>
        </tr>
      </table>      

      <table id="dj" class="djs">
    <?php
        $i = 0;
        foreach( $djs as $row ): 
          $i++;
    ?>
      <tr>
        <td class="first_name"><?= $row["first_name"] ?></td>
        <td class="last_name"><?= $row["last_name"] ?></td>
        <td class="email"><?= $row["email"] ?></td>
        <td class="action">
          <button id="djlog<?=$i?>">FCC Logs</button>
        </td>
      </tr>
    <?php endforeach; ?>      
    </table>
    </div>
    <script src="../js/djs.js"></script>
  </body>
</html>
