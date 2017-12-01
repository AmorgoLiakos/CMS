<?php
	include_once("config.php");
	include_once("functions.php");

	$newName=trim($_POST["category"]);

	createCategory($con,$newName);
	header("Location:../first.php");
?>