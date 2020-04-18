<?php

	function login($u, $p) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}

		$select = "select * from users where username = ? and password = ? ";
		$stmt = $conn->prepare($select);
		$a = md5($p);
		$stmt->bind_param("ss", $u, $a);
		$stmt->execute();

		$result = $stmt->get_result();

		$num_row = $result->num_rows;

		if($num_row == 1) {
			return true;
		}
		return false;
	}

	function getAllEmployees() {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}

		$select = "select * from employee";
		$result = $conn->query($select);

		$employee = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$employee[] = $row;
		}
		return $employee;
	}

	function deleteEmployee($id) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}
		$delete = "delete from employee where id = ?";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
	}

	function addEmployee($name, $email, $address, $phone) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}

		$insert = "insert into employee(Name, Email, Address, Phone) values(?, ?, ?, ?)";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ssss", $name, $email, $addrees, $phone);
		$stmt->execute();
	}

	function getEmployeeById($id) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}
		$delete = "select * from employee where id = ? ";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		$result = $stmt->get_result();

		$product = $result->fetch_assoc();
		return $product;
	}

	function updateEmployee($name, $email, $address, $phone, $id) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}

		$insert = "update employee set name = ?, email = ?, address = ?, phone = ?, id = ?";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);
		$stmt->execute();
	}

?>
