<html>
	<head>
		<title>Form PHP DEMO</title>
	</head>
	<body>

		<h2>New Product</h2>
		<div>
			<form action="add.php" method="POST" enctype="multipart/form-data">
				Name: <input type="text" name="name" /><br/>
				Email: <input type="text" name="email" /><br/>
				Address: <input type="text" name="address" /><br/>
				Phone: <input type="text" name="phone" /><br/>

				<input type="submit" value="Add"/>
			</form>
		</div>
	</body>
</html>

<?php
	session_start();
	if(isset($_POST['name'])) {
		$file = $_FILES['file1'];

		if($file['error'] == 0) {
			$name = $file['name'];
			$tmp = $file['tmp_name'];
			$currentTimeinSeconds = time();
			move_uploaded_file($tmp, "upload/$currentTimeinSeconds"."_"."$name");
		}

		//$products = $_SESSION['products'];
		//var_dump($products);
		/*$product = array(
					'title' => $_POST['title'],
					'price' => $_POST['price'],
					'des' => $_POST['des']
				);
		$products[] = $product;
		$_SESSION['products'] = $products;*/

		include "dbconnection.php";
		addEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone']);
		header("Location: index.php");
	}


?>
