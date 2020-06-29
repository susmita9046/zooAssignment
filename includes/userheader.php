<?php
$user = $pdo->prepare("select * from user where u_id = :UserId");
$user->execute(['UserId' => $_SESSION['UserId']]);
$user = $user->fetch();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Zoo Website</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="zoo website" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
	<!--header-->
	<div class="header" style="background-color: #eee  !important">
		<div class="container">
			<div class="header-top" style="background-color: #eee">
				<nav class="navbar navbar-default" style="background-color: #eee; border: none;">
					<div class="container">
						
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand">
								<a href="index.php">
								<img src="images/logo.jpg" style="width: 70px; height: 65px; border-radius: 50%; margin-left: -15px;">
								</a>
							</div>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  		<ul class="nav navbar-nav">
								<li><a href="userhomepage.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="contact.php">Contact</a></li>
								<?php if(isset($_SESSION['UserId'])){
									$userId = $_SESSION['UserId'];
									$user = $pdo->prepare("select * from user where u_id = '$userId'");
									$user->execute();
									$user = $user->fetch();
									// print_r($user); die();
									?>
									<li class="dropdown">
										<a href="usermanage.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-user"><?php echo $user['username']; ?></i> 
											<span class="caret"></span>
									    </a>
		                                <ul class="dropdown-menu">
											<li><a href="ticketlist.php">Your Tickets List</a></li>
											<li><a href="sponserlist.php">Your Sponser List</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
								<?php }
								else {?>
									<li><a href="login.php">Login</a></li>
									<li><a href="register.php">Register</a></li>
								<?php }?>
							</ul>
						</div>
					
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>
	<!-- end header -->
