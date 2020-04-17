<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
<?php
require_once 'connect.php';

	$checkbox	= isset($_POST['checkbox']) ? $_POST['checkbox'] : '';
$result = '';
$total = '';
	if(!empty($checkbox)){
	    echo '<pre>';
	    print_r($checkbox);
	    echo '</pre>';
	  $result =   $database->delete($checkbox);
	  $total = mysqli_affected_rows($database->connect) ;
	}
	$result = $total.'<p>Dữ liệu đã được xóa thành công! Click vào <a href="index.php">đây</a> đê quay về trang chủ.</p>    ';
?>
	<div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">   
            <?php
            echo $result ;
            ?>
        </div>
    </div>
</body>
</html>
