<?php
	$name = $_GET['name'];
	include "dbconnection.php";

	$emp = getEmployeeByName($name);
	if(isset($_POST['Name'])) {
		// gọi hàm thực hiện update vào db, sau đó chuyển lại trang danh sách
		updateProduct($_POST['Name'], $_POST['Email'], $_POST['Address'], $_POST['Phone']);
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
        Tên Nhân Viên: <input type="text" name="Name" value="<?php echo $stu['Name'] ?>"/> </br>
        Email : <input type="text" name="Email" value="<?php echo $stu['Email'] ?>" /> </br>
        Address : <input type="text" name="Address" value="<?php echo $stu['Address'] ?>" /> </br>
        Phone : <input type="text" name="Phone" value="<?php echo $stu['Phone'] ?>" /> </br>

		     Img : <input type="file" name="file"><br>
        <button type="submit" name="button" value="submit">Tạo</button>
      </form>
    </div>
  </body>
</html>
