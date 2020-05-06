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
		$x = md5($p);
    $stmt->bind_param("ss", $u, $x);
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

		$select = "select * from employees";
		$result = $conn->query($select);

		$employees = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$employees[] = $row;
		}
		return $employees;
	}

	function deleteEmployee($name) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}
		$delete = "delete from employees where name = ?";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("s", $name);
		$stmt->execute();
	}

	function addEmployee($name, $email, $address) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}

		$insert = "insert into employees(name, email, address, phone) values(?, ?, ?, ?)";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ssss", $name, $email, $address, $phone);
		$stmt->execute();
	}

	function getEmployeeByName($name) {
		$hn = "localhost";
		$db = "employees";
		$username = "root";
		$password = "";

		$conn = new mysqli($hn, $username, $password, $db);

		if($conn->connect_error) {
			return false;
		}
		$delete = "select * from employees where id = ? ";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("s", $name);
		$stmt->execute();

		$result = $stmt->get_result();

		$Employee = $result->fetch_assoc();
		return $Employee;
	}

?>
