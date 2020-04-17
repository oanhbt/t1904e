<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
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
<?php
require_once 'connect.php';
	$id	= $_GET['id'];
	$query = "SELECT * FROM `group`  WHERE `id`=$id";
    $result =  $database->query($query);
    $item = $database->singleRecord($result);

if (isset( $_POST['id']))  $idDelete = $_POST['id'];

    $notice='';
    if (!empty($item)){
        $idItem = $item['id'];
        $itemStatus = $item['status'];
        $itempName =  $item['name'];
        $itempOrdering = $item['ordering'];

        $xhtml = "  <div class='row'>
                            <p>ID: $idItem</p> 
                        </div>
                        <div class='row'>
                            <p>group name: $itempName</p>
                        </div>
                        <div class='row'>
                            <p>status:$itemStatus</p>
                        </div>
                        <div class='row'>
                            <p>ordering:$itempOrdering</p>
                        </div>
                                     
                         <div class='row'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='Delete' name='submit'>
                        <input type='button' value='Cancel' name='cancel' id='cancel-button'>
                    </div>

    ";
    }else{
        $xhtml = 'ko co noi dung nay';
    }
    if (isset($_POST['submit'])){
        $query = "DELETE  FROM `group`  WHERE `id`=$idDelete";
        $database->query($query);
        $notice='success';

    }
    ?>
	<div id="wrapper">
    	<div class="title"ID</div>
        <div id="form">
            <?php
            if ($notice ==null) {
                ?>
                <form action="" method="post" name="main-form">
                    <?php echo $xhtml ;
                    ?>
                </form>
                <?php
            }else{
                echo $notice ;
            }
            ?>
        </div>
        
    </div>
</body>
</html>
