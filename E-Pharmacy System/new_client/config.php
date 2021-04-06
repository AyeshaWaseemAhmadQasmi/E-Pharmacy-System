<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include "../Database/server_configuration.php";
define('DB_NAME', 'PROJECTDB');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($host, $username, $passwrd, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>