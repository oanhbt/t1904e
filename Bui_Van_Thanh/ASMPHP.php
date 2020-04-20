

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-2 offset-md-10 text-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus mr-1"></i> Add employee</button>
                </div>
            </div>   
            <?php
            include 'dbConnection.php';
            $lstEmployee = getAllEP();
            $item_per_page = 6;
            $total_page = count($lstEmployee) / $item_per_page;
            $curent_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = $item_per_page * ($curent_page - 1);
            $end = $start + $item_per_page;
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    for ($i = $start; $i < $end && $i < count($lstEmployee); $i ++) {
                        $ep = $lstEmployee[$i];
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $ep['Name']; ?></td>
                            <td><?php echo $ep['Phone']; ?></td>
                            <td><?php echo $ep['Address']; ?></td>
                            <td class="width2btn">
                                <a href="edit.php?id=<?php echo $ep['ID']; ?>" onclick="" data-toggle="tooltip" data-placement="top" title="Employee detail" class="cursor-pointer">
                                    <i class="btnEdit fa fa-fw fa-edit"></i>
                                </a>
                                <a href="deleteEp.php?id =<?php echo $ep['ID']; ?>" data-toggle="tooltip" data-placement="top" title="Delelte employee." class="cursor-pointer">
                                    <i class="btnDelete fa fa-fw fa-trash-o text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; ?> 
                    <?php } ?>
                </tbody>
            </table>
            <div class="row mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>				
                        <?php
                        for ($p = 0; $p < $total_page; $p++) {
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="ASMPHP.php?page=<?php echo $p + 1 ?>">  <?php echo $p + 1 ?> </a>
                            </li>
                            <?php
                        }
                        ?>				
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add employee</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                        // include 'dbConnection.php';
                        if (isset($_POST['button'])) {
                            //Gọi hàm thêm mới nhân viên
                            addEmployee($_POST['Name'], $_POST['Address'], $_POST['Phone']);
                            header("Location: ASMPHP.php");
                        }
                        ?>

                        <form action="ASMPHP.php" method="post" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col-md-12">
                                    Name : <input class="form-control" type="text" name="Name" value="">
                                </div> 
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    Address : <input class="form-control" type="text" name="Address" value="" >
                                </div> 
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    Phone : <input class="form-control" type="text" name="Phone" value="" > 
                                </div> 
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-success" name="button" value="sbm"><i class="fa fa-save mr-1"></i>Save</button> 
                                </div> 
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>