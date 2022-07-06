<?php
// Database configuration
$servername     = "localhost";
$username = "alyousuf";
$password = "alyousuf@870";
$dbName     = "alyousufawards";

$db = new mysqli($servername, $username, $password,  $dbName);

if (!$db) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 
 exit;
}
?>