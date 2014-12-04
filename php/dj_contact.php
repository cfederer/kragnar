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

$query = "SELECT first_name, last_name, email FROM dj;";


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
        <li><a href="lyrics.html">Lyric Checker</a></li>
        <li><a href="../html/calendar.html">Calendar</a></li>
        <li>
          <a href="">Resources &#x25bc;</a>
          <ul>
            <li><a href="how_to_itunes.html">iTunes Tips</a></li>
            <li><a href="how_to_simian_format.html">Simian Format</a></li>
            <li><a href="how_to_simian_liner.html">Simian Liner</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    
    <div class="main content">
      <table>
        <tr>
          <th id="first_name">First&uarr;&darr;</th>
          <th id="last_name">Last&uarr;&darr;</th>
          <th id="email">Email&uarr;&darr;</th>
        </tr>
      </table>      
    </div>
  </body>
</html>
