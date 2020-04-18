<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="css/ex3.css">
    </head>
    <body>
        <h2>Nhập thông tin nhân viên</h2>
        <div>
            <form action="add.php" method="POST" enctype="multipart/form-data">
                Tên: <input type="text" name="name" value=""/><br/>
                Email: <input type="email" name="email" value=""/><br/>
                Địa chỉ: <input type="text" name="address" value=""/><br/>
                SĐT: <input type="text" name="phone" value=""/><br/>
                <input type="submit" value="ADD"/>
            </form>
        </div>
    </body>
</html>

<?php
session_start();
if (isset($_POST['name'])) {
    include "dbconnection.php";
    addEmployee($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone']);
    header("Location: index.php");
}
?>

