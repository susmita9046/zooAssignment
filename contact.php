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
                contact(username,email,phone_number,subject,message) values(:username,:email,:phone_number,:subject,:message)");
       
        unset($_POST['save']);
         // echo '<pre>'; print_r($_POST); die();
        $stmt->execute($_POST);
        // hader('Location:contact.php?success=contacts Added Successfully');
        echo "contact added Successfully";
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

				<form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
	            <div class="form_details">
	            <h3>Sponsership form</h3>
           
	              <br><br>
	              <label>Name</label>
	              <input name="username" class="form-control" required="" autofocus="" />
	              <br>
	              <label>Email</label>
	              <input name="email" class="form-control" required="" autofocus="">
	              <br>
	              <label>Phone Number</label>
	              <input name="phone_number" class="form-control" required="" autofocus="">
	              <br>
	              <label>Subject</label>
	              <input name="subject" class="form-control" required="" autofocus="">
	              <br>
	              <label>Message</label>
	              <input name="message" class="form-control" required="" autofocus="">
	              <br>
	          <div class="form-group">
	              <input type="submit" name="save" class="btn btn-dark" value="Save">
	              <a href="animaltype.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a>
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