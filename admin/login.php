<?php 
  session_start();
  if(isset($_SESSION['AUserId'])){
    header('Location:index.php');
  }
  require 'db/conn.php';
  if(isset($_POST['login'])){
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email and role =:role');
    $criteria = [
      'email' => $_POST['email'],
      'role' =>1
    ];
    $stmt->execute($criteria);
    if($stmt->rowCount() > 0){
      $user = $stmt->fetch();
      if(password_verify($_POST['password'],$user['password'])){
        $_SESSION['AUserId'] = $user['u_id'];
        header('Location:index.php');
      }else{
        header('Location:login.php');
      }
    }
    else{
      echo 'Invalid Credentials. Please try again';
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style type="text/css">
      body {
        background: #eee;
      }
      .wrapper {
        margin: 80px;
      }
      .form-signin {
        max-width: 380px;
        margin: 0 auto;
        background-color: #fff;
        padding: 15px 40px 50px;
        border: 1px solid #e5e5e5;
        border-radius: 10px;
      }
      .form-signin .form-signin-heading, .form-signin .checkbox {
        margin-bottom: 30px;
      }
      .form-signin input[type="text"], .form-signin input[type="password"] {
        margin-bottom: 20px;
      }
      .form-signin .form-control {
        padding: 10px;
      }
    </style>
  </head>
<body>

<div class="wrapper">

<form class="form-signin" autocomplete="off" method="post" action="">
  <h3 class="form-signin-heading text-center">Admin Login Panel</h3>
  <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
  <input type="password" class="form-control" name="password" placeholder="Password" required="" />
  <button class="btn btn-lg btn-primary btn-block" name="login" >Login</button>
</form>

</div>

</body>
</html>











