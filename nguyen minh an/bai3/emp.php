<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/home.css">
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Manage Employee</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="add.php" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Add new employee
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <table 
                                data-toolbar="#toolbar"
                                data-toggle="table">

                                <thead>
                                <tr>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="email"  data-sortable="true">Email</th>
                                    <th data-field="address" data-sortable="true">Address></th>
                                    <th>phone</th>
                                    <th>Acctions</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    include"dbconnect.php";
                                        $abc = seclectAllEmp();                      
                                      
                                            
                                            $item_per_page = 3;
                                            $total_page = count($abc) / $item_per_page;
                                            $curent_page = isset($_GET['page']) ? $_GET['page'] : 1;

                                            $start = $item_per_page * ($curent_page - 1);
                                            $end = $start + $item_per_page;
                                        for($i = $start; $i < $end && $i < count($abc); $i++) {
                                            $emp = $abc[$i];
                                    ?>

                                        <tr>
                                            <td style=""><?php echo $emp['name'];?> </td>
                                            <td style=""><?php echo $emp['email'];?></td>
                                            <td style=""><?php echo $emp['address'];?></td>
                                            <td style=""><?php echo $emp['phone'];?></td>
                                        
                                    
                                            <td class="form-group">
                                                <a href="edit.php?id=<?php echo $emp['id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>sửa</a>
                                                <a href="delete.php?id=<?php echo $emp['id'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>xóa</a>
                                            </td>
                                        </tr>       
                                    <?php } ?>                                                                
                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>