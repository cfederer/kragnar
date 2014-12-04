<?php
/*
 * Authors   => Callie Federer, Sean Hellebusch
 * Date      => 11.19.2014
 * Version   => 1
 *
 * This php script gets all the managers from a json file
 * and prints them to the management info page.
*/ 

error_reporting(E_ALL);
ini_set('display_errors', '1');

// split json file to get the managers array
$json = file_get_contents("../docs/managers.json");
$json = json_decode($json, true);
$json = $json["managers"];
$size = count($json);

// slice the array, ensuring that if an odd number, the left
// column will have the extra.
if($size % 2 == 0) {
  $mgmt1 = array_slice($json, 0, $size/2);
  $mgmt2 = array_slice($json, $size/2, $size);
} else {
  $mgmt1 = array_slice($json, 0, intval($size/2)+1);
  $mgmt2 = array_slice($json, intval($size/2), $size);
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
      <div class="main content" >
        <h1 class="title">Management Info</h1>
          <ul id="management">
          <?php foreach ($mgmt1 as $m): ?>
            <li class="emphasis"> <?= $m["name"]; ?>
              <ul class="normal">
                <li><?= $m["name"] ?></li>
                <li><?= $m["phone"] ?></li>
                <li><?= $m["email"] ?></li>
                <li>Office hours: <?= $m["office_hours"] ?></li>
              </ul>
              <?php endforeach; ?>
          </ul>
          <ul id="management2">
          <?php foreach ($mgmt2 as $m): ?>
            <li class="emphasis"> <?= $m["name"]; ?>
              <ul class="normal">
                <li><?= $m["name"] ?></li>
                <li><?= $m["phone"] ?></li>
                <li><?= $m["email"] ?></li>
                <li>Office hours: <?= $m["office_hours"] ?></li>
              </ul>
              <?php endforeach; ?>
          </ul>
      </div>
    </body>
</html>
