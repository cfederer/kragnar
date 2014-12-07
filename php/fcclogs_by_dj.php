<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Callie Federer, Sean Hellebusch" />
    <link rel="stylesheet" href="../app.css">
    <title>KTRM DJ Website</title>
  </head>
  <body> 
      <a id="logo-wrapper" href="../home.html"><img src="../img/edge_logo.jpg" 
      id="logo" alt="Edge Logo" height="80" width="200"></a>  
      <nav>
        <ul>
            <li><a href="../html/schedule.html">Schedule</a></li>
            <li><a href="../html/lyrics.html">Lyric Checker</a></li>
            <li><a href="../html/calendar.html">Calendar</a></li>
            <li><a href="">Resources &#x25bc;</a>
              <ul class="links">
                <li><a href="../html/how_to_itunes.html">iTunes Tips</a></li>
                <li><a href="../html/how_to_simian_format.html">Simian Format</a></li>
                <li><a href="../html/how_to_simian_liner.html">Simian Liner</a></li>
                <li><a href="../html/how_to_news.html">News at &#58;55</a></li>
              </ul>
            </li>
        </ul>
      </nav>

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include( 'hidden/pdo_connector.php' );

$connector = new PDO_Connector();
$pdo = $connector->connect();
$op_regex = "/^\w+$/";


if( !isset( $_POST['djs'] )|| !preg_match( '/^[A-Za-z_\s]+$/', $_POST["djs"] )):
  exit();
endif;

 
$dj =  $_POST['djs'];
$dj = htmlspecialchars($dj);
/*$djarray = explode(" ", $dj);
$first_name = $djarray[0];
$last_name = $djarray[1]; */

$query = 'SELECT timestamp, dj, showtime, pa_volts, pa_amps, fwrd_pwr, 
            readings, r_zero, r_twelve, r_twentynine, r_fortysix, r_fiftyfive, 
            notes, digital_signature from dj_fcclogs where dj = :dj
            order by timestamp';

try {
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':dj', $dj, PDO::PARAM_INT );
  $stmt->execute();
  $logs = $stmt->fetchAll();
} catch(PDOException $e) {
    echo 'error: ' . $e->getMessage();
}
?>
    <div class="logsmain logs content">
      <table>
        <tr>
          <th class="timestamp" id="timestamp">Submitted</th>
          <th class="dj" id="dj">DJ&uarr;&darr;</th>
          <th class="showtime" id="showtime">Show Time</th>
          <th class="pavolts" id="pavolts">PA Volts</th>
          <th class="paamps" id="paamps">PA Amps</th>
          <th class="fwrdpwr" id="fwrdpwr">FWRD PWR</th>
          <th class="readings" id="readings">Readings OK?</th>
          <th class="reading0" id="reading0">:00</th>
          <th class="reading1" id="reading1">:12</th>
          <th class="reading2" id="reading2">:29</th>
          <th class="reading3" id="reading3">:46</th>
          <th class="reading4" id="reading4">:55</th>
          <th class="notes" id="notes">Notes</th>
          <th class="signature" id="signature">Signature</th>
        </tr>
      </table> 
      <table id="logstable" class="logs">
      <?php foreach( $logs as $row ): ?>
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
  </body>
</html>
