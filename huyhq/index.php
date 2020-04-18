<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Manage Employees</title>
        <title></title>
        <link href="css/ex3.css">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        $check_session = isset($_SESSION['user_name']) ? true : false;
        if (!$check_session) {
            header("Location:login.php");
        }
        ?>

        <!-- Menu --> 
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container">
                <div class="col-4">
                    <h3 style="color: white;">Manager <b>Employee</b></h3>
                </div>
                <div class="col-8">

                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="add.php"><button type="button" class="btn btn-success">Add new Employee</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Content -->     
        <div class="container" style="margin-top: 100px;">
            <div class="row"> 
                <div class="container">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        include "dbconnection.php";
                        $employees = getAllEmployees();

                        $item_per_page = 5;
                        $total_page = count($employees) / $item_per_page;

                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                        $start = $item_per_page * ($current_page - 1);
                        $end = $start + $item_per_page;

                        for ($i = $start; $i < $end && $i < count($employees); $i++) {
                            $employee = $employees[$i];
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $employee['name']; ?></td>
                                    <td><?php echo $employee['email']; ?></td>
                                    <td><?php echo $employee['address']; ?></td>
                                    <td><?php echo $employee['phone']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $employee['id'] ?>">Sửa</a> 
                                        <form method="GET" action="delete.php" onsubmit="return confirm('Sure ?');">
                                            <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">
                                            <input type="submit" value="Xóa">
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                        <?php } ?> 
                    </table>
                </div>           
            </div>
        </div>

        <!-- Pagination -->  
        <div class="container">
            <ul class="pagination justify-content-end" style="margin: 20px 0;">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php
                for ($p = 0; $p < $total_page; $p++) {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?php echo $p + 1 ?>"> <?php echo $p + 1 ?></a>
                    </li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </body>
</html>
