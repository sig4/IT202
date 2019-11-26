<?php

$server = "sql1.njit.edu"; /* Host name */
$username = "sig4"; /* User */
$password = "mBQAtXXH"; /* Password */
$dbname = "sig4"; /* Database name */


try{
  $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  die('Unable to connect with the database');
}
			

