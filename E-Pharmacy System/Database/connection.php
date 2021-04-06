<?php
include 'server_configuration.php';
$conn = new mysqli($host, $username, $passwrd, "PROJECTDB"); //store new conn, connect to database myDB
if ($conn->connect_error) { // if there is error
    die("Connection failed: " . $conn->connect_error); // print the error and kill connection
}
?>