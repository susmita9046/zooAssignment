<?php 
  require 'admin/db/conn.php';
  if(isset($_SESSION['UserId'])){
    header('Location:userhomepage.php');
  }
if(isset($_POST['login'])){
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email and role =:role');
    $criteria = [
      'email' => $_POST['email'],
      'role' =>0
    ];
    $stmt->execute($criteria);
    if($stmt->rowCount() > 0){
      $user = $stmt->fetch();
      if(password_verify($_POST['password'],$user['password'])){
        $_SESSION['UserId'] = $user['u_id'];
        header('Location:userhomepage.php');
      }else{
        header('Location:login.php');
      }
    }
    else{
      echo 'Invalid Credentials. Please try again';
    }
  }
 ?>
<?php require 'includes/header.php'; ?>
	
<!--header-->
<div class="content" style="background-color: #fbf7ef;>
	<div class="contact">
	<div class="container">
	 <style type="text/css">
      body {;
        background: #fbf7ef;
      }
      .wrapper {
        /*margin: 80px;*/
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
			<!-- <div class="contact_top" style="padding: 0;">
	 			<div class="col-md-5 contact_left" style="float: none; margin: 0 auto"> -->
		 			<br><br>
				  	<div class="wrapper">
                    <form class="form-signin" autocomplete="off" method="post" action="">
                    <h3 class="form-signin-heading text-center">User Login Panel</h3>
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    <button class="btn btn-lg btn-primary btn-block" name="login" >Login</button>
                    </form>
                    </div>
		 		</div>
			</div>	<br><br><br>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
				
<?php require 'includes/footer.php'; ?>