<?php
  $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
  include "dbConnection.php";
  $emp = LoadEpInfo($id);

  if(isset($_POST['Name'])) {
    // gọi hàm thực hiện update vào db, sau đó chuyển lại trang danh sách
    saveEditEP($_POST['Name'], $_POST['Address'], $_POST['Phone'], $id);
    header("Location: ASMPHP.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Update infomation employee</h2>
    <div>
      <form action="edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        Name : <input type="text" name="Name" value="<?php echo $emp['Name'] ?>"/> </br>
        Address : <input type="text" name="Address" value="<?php $emp['Address'] ?>" /> </br>
        Phone : <input type="text" name="Phone" value="<?php echo $emp['Phone'] ?>" /> </br>

        <button type="submit" name="button" value="submit">Save</button>
      </form>
    </div>
  </body>
</html>
