<?php  
 include"dbconnect.php";
  deleteEmp($_GET['id']);
  header("Location: index.php");
?>