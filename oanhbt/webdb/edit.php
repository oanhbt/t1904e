<?php
	$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
	include "dbconnection.php";
	$product = getProductById($id);	
	
	if(isset($_POST['title'])) {
		// gọi hàm thực hiện update vào db, sau đó chuyển lại về trang danh sách
		updateProduct($_POST['title'], $_POST['price'], $_POST['des'], $id);
		header("Location: index.php");
	}
?>

<html>
	<head>
		<title>Form PHP DEMO</title>
	</head>
	<body>
		
		<h2>Update Product</h2>
		<div>
			<form action="edit.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
				<!--<input type="hidden" name="id" value="<?php echo $id?>"/>-->
				Title: <input type="text" name="title" value="<?php echo $product['title'] ?>" /><br/>
				Price: <input type="text" name="price" value="<?php echo $product['price'] ?>"/><br/>
				Des: <textarea name="des"><?php echo $product['des'] ?></textarea><br/>
				
				<input type="submit" value="Update"/>
			</form>
		</div>
	</body>
</html>