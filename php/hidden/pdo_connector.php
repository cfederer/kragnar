<?php 
/*
 * Author   => Sean Hellebusch | sahellebusch@gmail.com
 * Date     => 11.30.2014
 *
 * PHP class to abstract out DB connection
 */
class PDO_Connector {
    
    public function connect() {
        try {
            // Database login
            $dbuser = 'sah7817';
            $dbpass = '40307817';
            // Connect to DB
            $pdo = new PDO("mysql:host=borax.truman.edu;dbname=sah7817;charset=utf8", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            return $pdo;
        } catch(PDOException $e) {
            echo 'error: ' . $e->getMessage();
        }
    }
}
?>