<?php
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
			<div class="contact-detail">
				<h3>Contact Info</h3>
				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</p> -->
      			<address>
					 <p>Email : <a href="claybrookzoo@mail.com">claybrookzoo@gmail.com</a></p>
					 <p>Phone : 2.234.444.444</p>
					 <p>222 2nd Ave South</p>
					 <p>Northwest,England 1T6</p>
				</address>
			</div>	
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 contact_left">
 			<h3>Contact Form</h3>

			<form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
        		<div class="form_details">
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
	              <label>Message</label><br>
	              <textarea name="message" class="form-control" required="" autofocus=""></textarea>
	              <!-- <input name="message" class="form-control" required="" autofocus=""> -->
	              
	              <input type="submit" name="save" class="btn btn-dark" value="Save">
	         	 	<div class="form-group">
		              <!-- <input type="submit" name="save" class="btn btn-dark" value="Save"> -->
		              <!-- <a href="animaltype.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a> -->
	          		</div>
	          	</div>
    		</form>
 		</div>
 		<div class="contact-map col-md-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1222898.9729967888!2d-3.55072739827423!3d53.227269000000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487add9d7c4b2fe7%3A0x1458b55b7024e327!2sChester%20Zoo!5e0!3m2!1sen!2snp!4v1592031657925!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
</div>

				
<?php require 'includes/footer.php'; ?>