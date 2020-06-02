<?php
require 'admin/db/conn.php';
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

<?php require 'includes/header.php'; ?>
	
<!--header-->
 <div class="content">
	<div class="contact">
		<div class="container">

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
			<!-- <div class="contact_top" style="padding: 0;">
	 			<div class="col-md-5 contact_left" style="float: none; margin: 0 auto"> -->
		 			<!-- <h3>Register Here</h3> -->

				  	<form class="form-signin" autocomplete="off" method="post" action="">
                    <h3 class="form-signin-heading text-center">Register</h3><br>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                    <br>
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    <br>
                    <input type="text" class="form-control" name="location" placeholder="location" required="" autofocus="" />
                    <br>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required="" autofocus="" />
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" name="register" >Register</button>
</form>
		 		</div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
				
<?php require 'includes/footer.php'; ?>