<?php
// session_start();
// require 'admin/db/conn.php';
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
	<div class="header" style="background-color: lightblue !important">
		<div class="container">
			<div class="header-top" style="background-color: lightblue">
				<nav class="navbar navbar-default" style="background-color: lightblue; border: none;">
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
								<h1><a href="index.php">zoo planet</a></h1>
							</div>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  		<ul class="nav navbar-nav">
								<li><a href="userhomepage.php">Home</a></li>
								<!-- <li><a href="about.php">About</a></li>
								<li><a href="contact.php">Contact</a></li> -->
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
								<!-- <li><a href="login.php">Login</a></li> -->
							</ul>
						</div><!-- /.navbar-collapse -->
					
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>
	<!-- end header -->
