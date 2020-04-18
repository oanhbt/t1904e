<?php
	$id = $_GET['id'];
	include "dbconnection.php";

	$product = getProductById($id);

	if(isset($_POST['title'])) {
		updateProduct($_POST['title'], $_POST['price'], $_POST['des'], $id);
	}
	header("Location: index.php");

?>

<html>
	<head>
		<title>Form PHP DEMO</title>
	</head>
	<body>

		<h2>Update Product</h2>
		<div>
			<form action="edit.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
				Title: <input type="text" name="title" value="<?php echo $product['title'] ?>"/><br/>
				Price: <input type="text" name="price" value="<?php echo $product['price'] ?>"/><br/>
				Des: <textarea name="des"><?php echo $product['des'] ?></textarea><br/>

				<input type="submit" value="Update"/>
			</form>
		</div>
	</body>
</html>
