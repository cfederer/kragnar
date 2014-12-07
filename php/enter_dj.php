<!DOCTYPE html>
<html>

	<head>
    <meta charset="utf-8" />
    <meta name="author" content="Callie Federer, Sean Hellebusch" />
    <link rel="stylesheet" href="../app.css">
    <title>Enter DJ</title>
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
    	<?php
    	  error_reporting(E_ALL);
        ini_set('display_errors', '1');

        include( 'hidden/pdo_connector.php' );

        $connector = new PDO_Connector();
        $pdo = $connector->connect();
        $query = ( "select distinct concat_ws(' ', first_name, last_name) 
              from DJ as name order by last_name asc");
        try {
           $stmnt = $pdo->prepare($query);
           $stmnt->execute();
           $djs = $stmnt->fetchAll();
         } catch(PDOException $e) {
          echo 'error: ' . $e->getMessage();
         } 
        ?>
        <form action="fcclogs_by_dj.php" method="post">
          <select name="djs">
            <?php foreach($djs as $djrow ): ?>
              <option value="<?=$djrow[0]?>"><?= $djrow[0] ?>
                      </option>
            <?php endforeach; ?>
          </select>
          <button type="submit" > View FCC Logs </button>
        </form>
      </div>
  </body>
</html>
        
        
    
    
    
