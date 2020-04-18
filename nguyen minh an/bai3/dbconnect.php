<?php
function login ($user,$pass)
{
	include_one"connect.php";
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
	include_one"connect.php";

	$select ="select * from employes";
	$result = $conn->query($select);

	$employees = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$employees[] = $row;
		}
		return $employees; 
}
function deleteEmp($id) {
		include_one"connect.php";
		
		$delete = "delete from employes where id = ?";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
	}

	function addProduct($name, $email, $address, $phone) {
		include_one"connect.php";

		$insert = "insert into employes(name, email, address, phone) values(?, ?, ?, ?)";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ssss", $name, $email, $address, $phone);
		$stmt->execute();
	}

	function getEmpById($id) {
		include_one"connect.php";
		$selectid = "select * from employes where id = ? ";
		$stmt = $conn->prepare($selectid);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		$result = $stmt->get_result();

		$emp = $result->fetch_assoc();
		return $emp;
	}


	function updateEmp($name, $email, $address, $phone, $id) {
		include_one"connect.php";
		$update = "update employes set name = ?, email = ?, address = ?, phone = ? where id = ?";
		$stmt = $conn->prepare($update);
		$stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);
		$stmt->execute();
	}

?>
