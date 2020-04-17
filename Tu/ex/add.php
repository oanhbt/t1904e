
<?php
        require_once 'connect.php';
        require_once 'class/Validate.class.php';
        require_once 'class/HTMLclass.php';
$error = "";
$outValidate = [];
$success = '';
 if (!empty($_POST)){
$validate = new Validate($_POST);
$validate->addRule("name",'string',2,50);
$validate->addRule("email",'string',1,100);
$validate->addRule("adress",'string',1,100);
$validate->addRule("phone",'string',1,10);
$validate->run();
    $outValidate = $validate->getResult();
if (!$validate->isValid()){
    $error =  $validate->showErrors();
}else{
    $database ->insert($outValidate);
    $success= 'success';
}
    header('location: index.php');

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - ADD</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP FILE - ADD</div>
        <div> <?php  echo $success ;?></div>
        <div id="form">
            <?php
echo $error;
?>
			<form action="#" method="post" name="add-form">
				<div class="row">
					<p>Name</p>
					<input type="text" name="name" value="">
				</div>

                <div class="row">
                    <p>Email</p>
                    <input type="text" name="email" value="">
                </div>
                <div class="row">
                    <p>Adress</p>
                    <input type="text" name="adress" value="">
                </div>
                <div class="row">
                    <p>Phone</p>
                    <input type="text" name="phone" value="">
                </div>

                <div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>
			</form>
        </div>

    </div>
</body>
</html>
