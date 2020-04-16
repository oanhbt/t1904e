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
//    die ("xyz");
    if ($check_session) {
      header("Location: index.php");

    } else {
      $username = isset($_POST['username']) ? $_POST['username'] : "";
      $pass = isset($_POST['pass']) ? $_POST['pass'] : "";

      if(login($username, $pass)) {
        $_SESSION['user_name'] = $username;
        header("Location: index.php");
      } else {
        echo "Nhap thong tin dang nhap";
      }
    }



     ?>
    <h2>Login</h2>
    <div class="">
      <form action="login.php" method="post">
        Username : <input type="text" name="username" value=""><br>
        Pass : <input type="password" name="pass" value="">
        <input type="submit" name="" value="Login">
      </form>
    </div>
  </body>
</html>
