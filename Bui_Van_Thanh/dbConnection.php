<?php

//lấy list employee
function getAllEP() {
    $hn = "localhost";
    $db = "t1904e";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if ($conn->connect_error) {
        return FALSE;
    }
    $select = "select * from employee";
    $result = $conn->query($select);
    $lstEmployee = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $lstEmployee[] = $row;
    }
    return $lstEmployee;
}

//Thêm mới employee
function addEmployee($Name, $Address, $Phone) {
    $hn = "localhost";
    $db = "t1904e";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if($conn -> connect_error){
        return FALSE;
    }
    $insert = "insert into employee(Name, Address, Phone) values(?, ?, ?)";
    $stmt = $conn ->prepare($insert);
    $stmt ->bind_param(sss, $Name,$Address,$Phone);
    $stmt ->execute();
}

//Hàm load thông tin của nhân viên theo ID
function LoadEpInfo($id){
      $hn = "localhost";
    $db = "t1904e";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if($conn -> connect_error){
        return FALSE;
    }
    $selectEp = "select * from employee where id = ?";
    $stmt = $conn ->prepare($selectEp);
    $stmt ->bind_param("i", $id);
    $stmt ->execute();
    $result = $stmt ->get_result();
    $emp = $result ->fetch_assoc();
    return $emp;
}

//Hàm cập nhật dữ liệu nhân viên
function saveEditEP($Name,$Address,$Phone,$id){
       $hn = "localhost";
    $db = "t1904e";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if($conn -> connect_error){
        return FALSE;
    }
    $query = "update employee set Name = ?, Address = ?, Phone = ? where id = ?";
    $stmt = $conn->prepare($query);
    $stmt =$stmt ->bind_param("sssi",$Name,$Address,$Phone,$id);
    $stmt ->execute();
    
}

//Hàm xóa employee
function delEP($id){
          $hn = "localhost";
    $db = "t1904e";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if($conn -> connect_error){
        return FALSE;
    }
    $query = "delete from employee where id = ?";
    $stmt = $conn ->prepare($query);
    $stmt = $stmt ->bind_param("i", $id);
    $stmt ->execute();
}
?>

