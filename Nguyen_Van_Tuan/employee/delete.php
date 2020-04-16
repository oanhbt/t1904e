<?php
  $id = $_GET['id'];
  include "delete.php";
  deleteProduct($id);
  header("Location: index.php");
?>
