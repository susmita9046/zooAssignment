<?php
require '../admin/db/conn.php';
$error='';
if(isset($_POST['register'])){
    
    $user = $pdo->prepare('select * from user where email = :email');
    $criteria = [
        'email' => $_POST['email']
    ];
    $user->execute($criteria);
    if($user->rowCount() > 0){
        $emailError = 'Supplied email already exists';
    }
    else{
        $registe = $pdo->prepare("INSERT INTO user(username,email,password,location,phone_number,role) VALUES (:username,:email,:password,:location,:phone_number,:role)");
         $criteria = [
            'username'=> $_POST['username'],
            'email'  => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'location' => $_POST['location'],
            'phone_number' => $_POST['phone_number'],
            'role' => 0
          ];
        // echo '<pre>'; print_r($_POST); die();
        if($registe->execute($criteria))  {
           $msg = 'User Register';
            header('Location:login.php');
        }
        else{
            echo 'Not registered';
        }
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
  <h3 class="form-signin-heading text-center">Register</h3>
  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />

  <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />

  <input type="password" class="form-control" name="password" placeholder="Password" required="" />

  <input type="text" class="form-control" name="location" placeholder="location" required="" autofocus="" />

  <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required="" autofocus="" />

  <button class="btn btn-lg btn-primary btn-block" name="register" >Register</button>
</form>

</div>

</body>
</html>