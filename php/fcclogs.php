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

$query = "SELECT * FROM fcclog;";


try {
    $stmnt = $pdo->prepare($query);
    $stmnt->execute();
    $logs = $stmnt->fetchAll();
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
    
    <div class="logsmain logs content">
      <table>
        <tr>
          <th class="timestamp" id="timestamp">Submitted&uarr;&darr;</th>
          <th class="dj" id="dj">DJ&uarr;&darr;</th>
          <th class="showtime" id="showtime">Show Time&uarr;&darr;</th>
          <th class="pavolts" id="pavolts">PA Volts&uarr;&darr;</th>
          <th class="paamps" id="paamps">PA Amps&uarr;&darr;</th>
          <th class="fwrdpwr" id="fwrdpwr">FWRD PWR&uarr;&darr;</th>
          <th class="readings" id="readings">Readings OK?&uarr;&darr;</th>
          <th class="reading0" id="reading0">:00&uarr;&darr;</th>
          <th class="reading1" id="reading1">:12&uarr;&darr;</th>
          <th class="reading2" id="reading2">:29&uarr;&darr;</th>
          <th class="reading3" id="reading3">:46&uarr;&darr;</th>
          <th class="reading4" id="reading4">:55&uarr;&darr;</th>
          <th class="notes" id="notes">Notes&uarr;&darr;</th>
          <th class="signature" id="signature">Signature&uarr;&darr;</th>
        </tr>
      </table>      

      <table id="logstable" class="logs">
    <?php
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
    </table>
    </div>
    <script src="../js/fcclogs.js"></script>
  </body>
</html>
