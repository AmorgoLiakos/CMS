<?php
	$host="localhost";
	$user="root";
	$pw="";
	$db="cms";

	$con=mysqli_connect($host, $user, $pw, $db);

	if(!$con){
		die("Error!".mysqli_connect_error());	
	}

	mysqli_set_charset($con,"utf8");
?>