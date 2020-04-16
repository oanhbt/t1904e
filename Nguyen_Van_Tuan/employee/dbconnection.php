<?php
  function login($u, $p)
  {
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $select = "select * from users where username = ? and password = ?";
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

  function getAllstudent(){
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $select = "select * from student";
    $result = $conn->query($select);
    $student = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $student [] = $row;
    }
    return $student;
  }

  function deleteProduct($id){
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $delete = "delete from student where id = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();

  }

  function addProduct($name, $email, $address, $phone){
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $insert = "insert into student(name, email, address) values(?, ?, ?, ?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("ssss", $name, $email, $address, $phone);
    $stmt->execute();
  }

  function getProductByID($id) {
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $delete = "select * delete from student where id = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    return $product;
  }


  function updateProduct($title, $price, $des, $id){
    $hn = "localhost";
    $db = "employee";
    $username = "root";
    $password = "";
    $conn = new mysqli($hn, $username, $password, $db);
    if($conn->connect_error){
      return false;
    }

    $insert = "update student set title = ?, price = ?, des = ?, id = ?";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("sdsd", $title, $price, $des, $id);
    $stmt->execute();
  }

?>
