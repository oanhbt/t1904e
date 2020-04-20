<?php
  $id = $_GET['id'];
  include "dbConnection.php";
  delEP($id);
  header("Location: ASMPHP.php");
?>

