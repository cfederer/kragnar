<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>FCC Log</title>
    <link rel="stylesheet" href="app.css" />
  </head>
  <body>
    <h1>Thanks for Submitting!</h1>
    <h3> <a href="../html/fcclog_form.html"> Submit Another </h3>
    <?php
  $name = $_POST['name'];
  $showtimes = $_POST['showtimes']; 
  $reading1 = '';
  $reading2 = '';
  $reading3 = '';
  $reading4 = '';
  $time1 = '';
  $time2 = '';
  $time3 = '';
  $time4 = '';
  $time5 = '';
  $discrepancies = '';
  if(isset($_POST['reading1'])):
    $reading1 = $_POST['reading1']; 
  endif;  
  if(isset($_POST['reading2'])):
    $reading2 = $_POST['reading2']; 
  endif;  
  if(isset($_POST['reading3'])):
    $reading3 = $_POST['reading3']; 
  endif;  
  if(isset($_POST['reading4'])):
    $reading4 = $_POST['reading4']; 
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
  $signature= $_POST['signature'];
  
  $to = 'calliefederer@gmail.com';
  $subject = "FCC Log for $name at $showtimes";
  $email = 'noreply@ktrm.com'; 
  $message = "$name at $showtimes\n" . 
    "Readings: \n" . 
    "Reading1: $reading1\n" . 
    "Reading2: $reading2\n" . 
    "Reading3: $reading3\n" . 
    "Reading4: $reading4\n" . 
    "Times: \n" . 
    ":00 $time1\n" . 
    ":12 $time2\n" . 
    ":29 $time3\n" . 
    ":46 $time4\n" . 
    ":55 $time5\n" . 
    "Discrepancies: \n" .
    "$discrepancies\n" . 
    "Signature: $signature "; 
   mail( $to, $subject, $message, 'From:' . $email );

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

  </body>
</html>


