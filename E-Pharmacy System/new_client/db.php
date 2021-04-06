<?php
include "../Database/server_configuration.php";
$con = mysqli_connect("localhost","root","","PROJECTDB");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>