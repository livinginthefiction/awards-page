<?php
// Database configuration
$servername     = "localhost";
$username = "root";
$password = "";
$dbName     = "alyousufawards";

$db = new mysqli($servername, $username, $password,  $dbName);

if (!$db) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 
 exit;
}
?>