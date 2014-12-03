<?php
/*
 * Authors   => Callie Federer, Sean Hellebusch
 * Date      => 10.28.2014
 * Version   => 1
 *
 * This php script processes and validates the form
 * date from fcclog_form.html.
 */
include( 'hidden/pdo_connector.php' );

error_reporting(E_ALL);
ini_set('display_errors', '1');

$showtime_pattern = '/((0?[1-9]|1[0-2])(\:[0-5][0-9])?(am|pm)?)\-((0?[1-9]|1[0-2])(\:[0-5][0-9])?(am|pm)?)/';
$name_pattern     = '/[\w\s\-]*/';
$readings_pattern = '/([a-zA-Z]|\d)*/';
$PA_Volts  = '';
$PA_I      = '';
$Pa_Watts  = '';
$Room_Temp = '';
$time1     = '';
$time2     = '';
$time3     = '';
$time4     = '';
$time5     = '';
$Notes     = '';
$Readings  = 'No';

if( isset($_POST['submit'])):
  $missing = !isset($_POST['name']) ||
             !isset($_POST['showtimes']) ||
             !isset($_POST['signature']);

  $error = !preg_match($name_pattern, $_POST['name']) ||
           !preg_match($showtime_pattern, $_POST['showtimes']) ||
           !preg_match($name_pattern, $_POST['signature']);

  if( !$error && !$missing ):
    $name      = htmlspecialchars($_POST['name']);
    $showtimes = htmlspecialchars($_POST['showtimes']);
    if(isset($_POST['PA_Volts'])):
      $PA_Volts = htmlspecialchars($_POST['PA_Volts']);
    endif;
    if(isset($_POST['PA-I'])):
      $PA_I = htmlspecialchars($_POST['PA-I']);
    endif;
    if(isset($_POST['PA-Watts'])):
      $Pa_Watts = htmlspecialchars($_POST['PA-Watts']);
    endif;
    if(isset($_POST['Room_Temp'])):
      $Room_Temp = htmlspecialchars($_POST['Room_Temp']);
    endif;
    if(isset($_POST[':00'])):
      $time1 = htmlspecialchars($_POST[':00']);
    endif;
    if(isset($_POST[':12'])):
      $time2 = htmlspecialchars($_POST[':12']);
    endif;
    if(isset($_POST[':29'])):
      $time3 = htmlspecialchars($_POST[':29']);
    endif;
    if(isset($_POST[':46'])):
      $time4 = htmlspecialchars($_POST[':46']);
    endif;
    if(isset($_POST[':55'])):
      $time5 = htmlspecialchars($_POST[':55']);
    endif;
    if(isset($_POST['Notes'])):
      $notes = htmlspecialchars($_POST['Notes']);
    endif;
    if(isset($_POST['ReadingsYes'])):
      $Readings = "Yes";
    endif;
    $signature= htmlspecialchars($_POST['signature']);
  endif;
endif;

$connector = new PDO_Connector();
$pdo = $connector->connect();

$query = "INSERT INTO fcclogtest (timestamp, showtime, dj, pa_volts, pa_amps, pa_pwr,
                                    room_temp, readings, r_zero, r_twelve, r_twentynine, 
                                    r_fortysix, r_fiftyfive, notes, digital_signature)
                                    VALUES (now(), :showtime, :dj, :pa_volts, :pa_amps, :pa_pwr,
                                    :room_temp, :readings, :r_zero, :r_twelve, :r_twentynine, 
                                    :r_fortysix, :r_fiftyfive, :notes, :digital_signature) ";
$stmnt = $pdo->prepare($query);

// bind values to query
$stmnt->bindValue(':showtime', $showtimes);
$stmnt->bindValue(':dj', $name);
$stmnt->bindValue(':pa_volts', $PA_Volts);
$stmnt->bindValue(':pa_amps', $PA_I);
$stmnt->bindValue(':pa_pwr', $Pa_Watts);
$stmnt->bindValue(':room_temp', $Room_Temp);
$stmnt->bindValue(':r_zero', $time1);
$stmnt->bindValue(':r_twelve', $time2);
$stmnt->bindValue(':r_twentynine', $time3);
$stmnt->bindValue(':r_fortysix', $time4);
$stmnt->bindValue(':r_fiftyfive', $time5);
$stmnt->bindValue(':notes', $notes);
$stmnt->bindValue(':digital_signature', $signature);
if($Readings == "Yes"): 
  $stmnt->bindValue(':readings', 1 );
else:
  $stmnt->bindValue(':readings', 0);
endif;

$stmnt->execute();  
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Callie Federer, Sean Hellebusch" />
    <link rel="stylesheet" href="../app.css" />
    <title>FCC Log</title>
  </head>
  <body class="content">
   <a id="logo-wrapper_form" href="../home.html">
    <img src="../img/edge_logo.jpg" id="logo" alt="Edge Logo" 
         height="80" width="200">
   </a>
    <?php
      if( isset( $_POST['submitted'] )):
        if($missing || $error):
    ?>
          <h2 class="problem">There was an error with your submission.</h2>
          <p>
            <a href="fcclog_form.html">
              Please fill out the form and submit again.
            </a> 
            Thank you.
          </p>
    <?php
        endif;
      endif;
    ?>
    <h1>Thanks for Submitting!</h1>
    <h3> <a href="../html/fcclog_form.html">Submit Another</a></h3>
  </body>
</html>
