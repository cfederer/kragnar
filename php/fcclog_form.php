<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>FCC Log</title>
    <link rel="stylesheet" href="../app.css" />
  </head>
  <body class="content">
   <a id="logo-wrapper_form" href="../home.html"><img src="../img/edge_logo.jpg" id="logo" alt="Edge Logo" height="80" width="200"></a> 
    <h1>Thanks for Submitting!</h1>
    <h3> <a href="../html/fcclog_form.html"> Submit Another </h3>
    <?php
  $name = $_POST['name'];
  $showtimes = $_POST['showtimes']; 
  $PA_Volts = '';
  $PA_I = '';
  $Pa_Watts = '';
  $Room_Temp = '';
  $time1 = '';
  $time2 = '';
  $time3 = '';
  $time4 = '';
  $time5 = '';
  $Notes = '';
  $Readings = 'No'; 
  if(isset($_POST['PA_Volts'])):
    $PA_Volts = $_POST['PA_Volts']; 
  endif;  
  if(isset($_POST['PA_I'])):
    $PA_I = $_POST['PA_I']; 
  endif;  
  if(isset($_POST['Pa_Watts'])):
    $Pa_Watts3 = $_POST['Pa_Watts']; 
  endif;  
  if(isset($_POST['Room_Temp'])):
    $Room_Temp = $_POST['Room_Temp']; 
  endif;  
  if(isset($_POST[':00'])):
    $time1 = $_POST[':00']; 
  endif;  
  if(isset($_POST[':12'])):
    $time2 = $_POST[':12']; 
  endif;  
  if(isset($_POST[':29'])):
    $time3 = $_POST[':29']; 
  endif;  
  if(isset($_POST[':46'])):
    $time4 = $_POST[':46']; 
  endif;  
  if(isset($_POST[':55'])):
    $time5 = $_POST[':55']; 
  endif;  
  if(isset($_POST['discrepancies'])):
    $discrepancies = $_POST['discrepancies']; 
  endif; 
  if(isset($_POST['ReadingsYes'])):
    $Readings = "Yes"; 
  endif; 
  $signature= $_POST['signature'];
  
  $to = 'calliefederer@gmail.com';
  $subject = "FCC Log for $name at $showtimes";
  $email = 'noreply@ktrm.com'; 
  $message = "$name at $showtimes\n" . 
    "Readings: \n" . 
    "PA Volts: $PA_Volts\n" . 
    "PA-I: $PA_I\n" . 
    "PA-Watts: $Pa_Watts\n" . 
    "Room_Temp: $Room_Temp\n" . 
    "Times: \n" . 
    ":00 $time1\n" . 
    ":12 $time2\n" . 
    ":29 $time3\n" . 
    ":46 $time4\n" . 
    ":55 $time5\n" . 
    "Notes: \n" .
    "$Notes\n" . 
    "Signature: $signature " . 
    "Readings OK?: $Readings "; 
   mail( $to, $subject, $message, 'From:' . $email );

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

  </body>
</html>


