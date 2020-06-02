<?php
session_start();
if(!isset($_SESSION['UserId'])){
header('Location:login.php');
    }

require 'admin/db/conn.php';
$contacts = $pdo->prepare('SELECT * FROM contact');
$contacts->execute();

if(isset($_POST['save'])){
        $stmt = $pdo->prepare("insert into 
                contacts(username,email,phone_number,subject,message) values(:username,:email,:phone_number,:subject,:message)");
        // $_POST['userId']= $_SESSION['aUserId'];
        unset($_POST['save']);
        // echo '<pre>'; print_r($_POST); die();
        $stmt->execute($_POST);
        header('Location:contact.php?success=Events Added Successfully');
    }
?>
<?php require 'includes/header.php'; ?>
	
<div class="banner-header">
	<div class="container">
		<h2>contact</h2>
	</div>
</div>
<!--header-->
 <div class="content">
	<div class="contact">
		<div class="container">
	 		<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1431587453420"></iframe>
			</div>
			<div class="contact_top">
	 			<div class="col-md-8 contact_left">
		 			<h3>Contact Form</h3>
		 			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt dolor et tristique bibendum. Aenean sollicitudin vitae dolor ut posuere.</p>
				  	<form>
					 	<div class="form_details">
					 		<form class="form-signin" autocomplete="off" method="post" action="">
					        <input type="text" class="text" name="username" placeholder="User Name" required="" autofocus="" />
					        <input type="text" class="text" name="email" placeholder="Email" required="" autofocus="" />
					        <input type="text" class="text" name="phone_number" placeholder="Phone Number" required="" autofocus="" />
					        <input type="text" class="text" name="subject" placeholder="Subject" required="" autofocus="" />
					        <textarea name="messsage" placeholder="Message" class="text" rows="5"></textarea>
                            <br> 
							<div class="clearfix"> </div>
						 	<div class="sub-button"><input type="submit" name="save" value="Send message"></div>
					  	</div>
				  	</form>
		 		</div>
	    		<div class="col-md-4 company-right">
			   		<div class="company_ad">
					<h3>Contact Info</h3>
					 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</p>
	      			<address>
						 <p>Email : <a href="mailto:example@mail.com">example@mail.com</a></p>
						 <p>Phone : 1.306.222.4545</p>
						 <p>222 2nd Ave South</p>
						 <p>Saskabush, SK   S7M 1T6</p>
					</address>
				</div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
				
<?php require 'includes/footer.php'; ?>