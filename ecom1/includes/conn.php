<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ecomm";
 	$conn = mysqli_connect($server, $username, $password, $dbname);
	if($conn -> connect_error){
		die("Connection failed : ".$conn->connect_error);
	}
?>