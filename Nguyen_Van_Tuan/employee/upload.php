<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Nhập dữ liệu sản phẩm</h2>
    <div>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        Name : <input type="text" name="name" value=""> <br>
        Email : <input type="text" name="email" value=""> <br>
        Address : <input type="text" name="address" value=""> <br>
		    Phone : <input type="text" name="phone" value=""> <br>
        <button type="submit" name="button" value="submit">Tạo</button>
      </form>
    </div>
  </body>
</html>
<?php
  session_start();
  if (isset($_POST['name'])) {
    include "dbconnection.php";
    addProduct($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone']);
    header("Location: index.php");
  }

 ?>
