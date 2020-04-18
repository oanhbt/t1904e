<?php
$id = isset($_GET['id']) ? ($_GET['id']) : ($_POST['id']);
include "dbconnection.php";
$employee = getEmployeeById($id);

if(isset($_POST['name'])) {
    updateEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], $id);
    header("Location: index.php");
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/ex3.css">
  </head>
  <body>
      <h2>Nhập dữ liệu update</h2>
      <form action="edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
          Tên: <input type="text" name="name" value="<?php echo $employee['name'] ?>"/><br/>
          Email: <input type="email" name="email" value="<?php echo $employee['email'] ?>"/><br/>
          Địa chỉ: <input type="text" name="address" value="<?php echo $employee['address'] ?>"/><br/>
          SĐT: <input type="text" name="phone" value="<?php echo $employee['phone'] ?>"/><br/>
          <input type="submit" value="UPDATE"/>
      </form>
  </body>
</html>

