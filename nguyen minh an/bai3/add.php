<?php
  
  include "dbconnect.php";


  if(isset($_POST['sbm'])) {
    // gọi hàm thực hiện update vào db, sau đó chuyển lại trang danh sách
    addEmp($_POST['Name'], $_POST['Email'], $_POST['Address'], $_POST['Phone']);    
    header("Location:emp.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Add employees</h2>
    <div>
      <form action="add.php" method="post" enctype="multipart/form-data">       
        Name : <input type="text" name="Name" value=""> </br>
        Eamil : <input type="text" name="Email" value="" > </br>
        Address : <input type="text" name="Address" value="" > </br>
        Phone : <input type="text" name="Phone" value="" > </br>		     
        <button type="submit" name="button" value="sbm">Tạo</button>
      </form>
    </div>
  </body>
</html>