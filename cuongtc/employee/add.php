<html>
	<head>
		<name>Form PHP DEMO</name>
	</head>
	<body>

		<h2>New Employee</h2>
		<div>
			<form action="add.php" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Name: </td>
						<td><input type="text" name="name" /></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td>Adress: </td>
						<td><textarea name="address"></textarea></td>
					</tr>
					<tr>
						<td>Phone: </td>
						<td><input type="text" name="phone" /></td>
					</tr>
				</table>

				<input type="submit" value="Add"/>
			</form>
		</div>
	</body>
</html>

<?php
	session_start();
	if(isset($_POST['name'])) {
		include "dbconnection.php";
		addEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone']);
		header("Location: index.php");
	}


?>
