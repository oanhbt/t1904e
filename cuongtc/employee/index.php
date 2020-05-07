<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Manager Employees</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
  <?php
	session_start();
	$check_session = isset($_SESSION['user_name']) ? true : false;

	if(!$check_session) {
		header("Location: login.php");
	}


	?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Manager Employees</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-12" style="margin-top: 25px">

        <h1 class="my-4">Manager Employee</h1>
        <table class="col-lg-12" border="1">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>

          <?php
    			include "dbconnection.php";
    			$employees = getAllemployees();

    			$item_per_page = 3;
    			$total_page = count($employees) / $item_per_page;

    			$curent_page = isset($_GET['page']) ? $_GET['page'] : 1;

    			$start = $item_per_page * ($curent_page - 1);
    			$end = $start + $item_per_page;


    			for($i = $start; $i < $end && $i < count($employees); $i++) {
    				$emp = $employees[$i];
    			?>

          <tr>
            <td><?php echo $emp['name'];?></td>
            <td><?php echo $emp['email'];?></td>
            <td><?php echo $emp['address'];?></td>
            <td><?php echo $emp['phone'];?></td>
            <td><a href="edit.php?id=<?php echo $emp['id']?>">Sửa</a></td>
            <td>
              <form class="" action="delete.php" method="get" onsubmit="return confirm('Sure ?');">
                <input type="hidden" name="id" value="<?php echo $emp['id'] ?>">
                <input type="submit" name="" value="Xóa">
              </form>
            </td>
          </tr>
          <?php } ?>
        </table>

        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php
				for($p = 0; $p < $total_page; $p++) {
				?>
            <li class="page-item">
              <a class="page-link" href="index.php?page=<?php echo $p + 1?>"> <?php echo $p + 1?> </a>
            </li>
            <?php
				}
				?>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>



      </div>
      <!-- /.col-lg-12 -->


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
