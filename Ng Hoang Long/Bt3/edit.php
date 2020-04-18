<?php
	$id = $_GET['id'];
	include "dbconnection.php";

	$product = getEmployeeById($id);

	if(isset($_POST['name'])) {
		updateEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], $id);
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
				Name: <input type="text" name="name" value="<?php echo $emp1['name']?>" /><br/>
				Email: <input type="text" name="email" value="<?php echo $emp1['email']?>" /><br/>
				Address: <input type="text" name="address" value="<?php echo $emp1['address']?>" /><br/>
				Phone: <input type="text" name="phone" value="<?php echo $emp1['phone']?>" /><br/>

				<input type="submit" value="Update"/>
			</form>
		</div>
	</body>
</html>
