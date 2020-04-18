<?php
function login ($user,$pass)
{
	$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}

    $select = "select * from user where user = ? and pass = ? ";
		$stmt = $conn->prepare($select);		
    	$stmt->bind_param("ss", $user, $pass);
		$stmt->execute();

		$result = $stmt->get_result();

		$num_row = $result->num_rows;

		if($num_row == 1) {
			return true;
		}
		return false;
}
function seclectAllEmp()
{
	$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}

	$select ="select * from employes";
	$result = $conn->query($select);

	$employees = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$employees[] = $row;
		}
		return $employees; 
}
function deleteEmp($id) {
		$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}
		
		$delete = "delete from employes where id = ?";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
	}

	function addEmp($name, $email, $address, $phone) {
		$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}

		$insert = "insert into employes(name, email, address, phone) values(?, ?, ?, ?)";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ssss", $name, $email, $address, $phone);
		$stmt->execute();
	}

	function getEmpById($id) {
		$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}
		$selectid = "select * from employes where id = ? ";
		$stmt = $conn->prepare($selectid);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		$result = $stmt->get_result();

		$emp = $result->fetch_assoc();
		return $emp;
	}


	function updateEmp($name, $email, $address, $phone, $id) {
		$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}
		$update = "update employes set name = ?, email = ?, address = ?, phone = ? where id = ?";
		$stmt = $conn->prepare($update);
		$stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);
		$stmt->execute();
	}

?>
