<?php
	$id = $_GET['id'];
	include "dbconnection.php";
	deleteEmployee($id);
	header("Location: index.php");
?>
