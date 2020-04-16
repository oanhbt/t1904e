<?php
$id = $_GET['id'];
  include "dbconnection.php";
  $product = getProductByID($id);

  if(isset($_POST['title'])) {
    // gọi hàm thực hiện update vào db, sau đó chuyển lại trang danh sách
    updateProduct($_POST['title'], $_POST['price'], $_POST['des'], $_POST['id']);
    header("Location: index.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Cập nhật dữ liệu sản phẩm</h2>
    <div>
      <form action="edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        Tên sản phẩm : <input type="text" name="title" value="<?php echo $product['title'] ?>"> <br>
        Giá sản phẩm : <input type="text" name="price" value="<?php  echo $product['price'] ?>"> <br>
        Nội dung : <textarea name="des" rows="8" cols="80"><?php echo $product['des']?></textarea>
		    Img : <input type="file" name="file"><br>
        <button type="submit" name="button" value="submit">Tạo</button>
      </form>
    </div>
  </body>
</html>
