<?php
require_once 'class/Database.class.php';
$param  = array(
    'server'=>'localhost',
    'username'=>'root',
    'password'=>'',
    'database'=>'manage_employee',
    'table'=>'employee'
);

$database = new Database($param);
$query = "select * from `employee`";
$result = $database->query($query);
$list = $database->listRecord($result);
$xhtml = "";

if (!empty($list)){
    $i = 0;
    foreach ($list as $item){

 $row = ($i%2 ==0) ? 'odd' :'even';
 $id = $item['id'];
 $name = $item['name'];
 $email = $item['email'];
 $adress = $item['adress'];
 $phone= $item['phone'];
        $xhtml .= "<div class='row ".$row."' >
	            	<p class='no'><input type='checkbox' name='checkbox[]' value='$id'></p>
	                <p class='name'>$name </p>
	                <p class='email'>$email</p>
	                <p class='adress'>$adress</p>
	                <p class='phone'>$phone</p>
	                <p class='action'>
	                    <a href='edit.php?id=$id'>Edit |</a>
	                    <a href='delete.php?id=$id'>Delete</a>
</p>
	            </div>";
        $i++;
    }
}else{
    $xhtml .= "du lieu dang cap nhat";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Index</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/myjs.js">
</script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP FILE - Index</div>
        <div class="list">   
			<form action="multy-delete.php" method="post" name="main-form" id="main-form">
<?php
//	require_once 'functions.php';
//
//	$data	= scandir('./files');
//
//	$i = 0;
//	foreach ($data as $key => $value){
//		if($value == '.' || $value == '..' || preg_match('#.txt$#imsU',$value) == false) continue;
//		$class		= ($i % 2 == 0) ? 'odd' : 'even';
//		$content	= file_get_contents("./files/$value");
//		$content	= explode('||', $content);
//		$tile				= $content[0];
//		$description		= $content[1];
//		$id			= substr($value, 0, 5);
//		$size		= convertSize(filesize("./files/$value"));
//?>
	         	<div class="row" style="text-align: center;font-weight: bold">
	            	<p class="no"><input type="checkbox" name="check-all" id="check_all"> </p>
	                <p class="name">Name</p>
	                <p class="email">Email</p>
	                <p class="adress">Adress</p>
	                <p class="phone">Phone</p>
	                <p class="action">Action</p>
	            </div>
                <?php
                echo $xhtml ;
                ?>
<!--//--><?php
//		$i++;
//	}
//?>
	    	</form>
    	</div>
        
	        <div id="area-button">
	        	<a href="add.php">Add </a>
	        	<a id="multy-delete" href="#">Delete </a>
	        </div>
    
    </div>
</body>
</html>
