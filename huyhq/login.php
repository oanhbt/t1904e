<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
	include "dbconnection.php";
    $check_session = isset($_SESSION['user_name']) ? true : false;

    if ($check_session) {
      header("Location: index.php");
    } else {
      $username = isset($_POST['username']) ? $_POST['username'] : "";
      $password = isset($_POST['password']) ? $_POST['password'] : "";

      if(login($username, $password)) {
        $_SESSION['user_name'] = $username;
        header("Location: index.php");
      } else {
        echo "nhập thông tin đăng nhập";
      }
    }
     ?>
    <h2>Login</h2>
    <div class="">
      <form action="login.php" method="post">
        Username : <input type="text" name="username" value=""><br>
        Pass : <input type="password" name="password" value="">
        <input type="submit" name="" value="Login">
      </form>
    </div>
  </body>
</html>
