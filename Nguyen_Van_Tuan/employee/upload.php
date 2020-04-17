<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Nhập dữ liệu Sinh Viên</h2>
    <div>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        Tên Sinh Viên : <input type="text" name="Name" value=""> <br>
        Eamil : <input type="text" name="Email" value=""> <br>
        Address : <input type="text" name="Address" value=""> <br>
        Phone : <input type="text" name="Phone" value=""> <br>
       <button type="submit" name="button" value="submit">Tạo</button>
      </form>
    </div>
  </body>
</html>
<?php
  session_start();
  if (isset($_POST['Name'])) {
    include "dbconnection.php";
    addProduct($_POST['Name'], $_POST['Email'], $_POST['Address'], $_POST['Phone']);
    header("Location: index.php");
  }

 ?>
