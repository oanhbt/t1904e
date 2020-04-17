<?php 
// $query = mysqli_query($conn,$sql);


// $total_rows = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM product"));
// $total_pages = ceil($total_rows / $rows_per_page);
session_start();

include_once("connect.php");
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
            <a href="index.php?page_layout=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Add new employee
            </a>
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
						        <th data-field="id" data-sortable="true">Name</th>
						        <th data-field="name"  data-sortable="true">Email</th>
                                <th data-field="price" data-sortable="true">Address></th>
                                <th>phone</th>
                                <th>Acctions</th>
						    </tr>
                            </thead>
                            <tbody>

                                <!-- <?php 
                                    // while($row = mysqli_fetch_array($query))
                                    // {

                                
                                ?> -->

                                    <tr>
                                        <td style="">Thomeasl </td>
                                        <td style="">nguyenminhan696@gamil.com</td>
                                        <td style="">209 an duong vuong</td>
                                        <td style="">01234567989</td>
                                        
                                       
                                        <td class="form-group">
                                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>


                                <!-- <?php 
                                    // }
                                ?> -->
                                   
                                 </tbody>
						</table>
                    </div>
                   </div>
			</div>
		</div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
</body>
</html>