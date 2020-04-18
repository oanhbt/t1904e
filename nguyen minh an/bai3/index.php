<?php 
// $query = mysqli_query($conn,$sql);


// $total_rows = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM product"));
// $total_pages = ceil($total_rows / $rows_per_page);
session_start();

include_once("connect.php");
include_once("login.php");
if(isset($_SESSION["mail"]) && isset($_SESSION["pass"])){
  
    

}else {
    include_once("logout.php");
  
}


?>

