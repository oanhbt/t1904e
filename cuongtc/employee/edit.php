<?php
	$id = isset($_GET['id']) ? ($_GET['id']) : ($_POST['id']);
	include "dbconnection.php";

	$emp = getEmployeeById($id);
	if(isset($_POST['name'])) {
		// gọi hàm thực hiện update vào db, sau đó chuyển lại trang danh sách
		updateEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone']);
		header("Location: index.php");
	}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Cập nhật dữ liệu nhân viên</h2>
    <div>
      <form action="edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        <!--<input type="hidden" name="id" value="<?php echo $id ?>"/>-->
        Tên Nhân Viên: <input type="text" name="name" value="<?php echo $stu['name'] ?>"/> </br>
        Email : <input type="text" name="email" value="<?php echo $stu['email'] ?>" /> </br>
        Address : <input type="text" name="address" value="<?php echo $stu['address'] ?>" /> </br>
        Phone : <input type="text" name="phone" value="<?php echo $stu['phone'] ?>" /> </br>

		    <input type="submit" value="UPDATE"/>
      </form>
    </div>
  </body>
</html>
