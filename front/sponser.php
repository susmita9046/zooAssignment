<?php
session_start();
  if(!isset($_SESSION['UserId'])){
    header('Location:login.php');
  }
require '../admin/db/conn.php';
$sponsercat = $pdo->prepare("select * from sponsership");
$sponsercat->execute();
$image ="";
if(isset($_POST['save'])){
if(isset($_FILES['image'])){
    
            $image = $_FILES['image']['name'];
            $tmp_loc = $_FILES['image']['tmp_name'];
            $perm_loc = 'image/' . $image;
            copy($tmp_loc, $perm_loc);
        }
        $stmt = $pdo->prepare("insert into 
                event(event_name,image,date_of_event,end_of_event,location,description) values(:event_name,:image,:date_of_event,:end_of_event,:location,:description)");
        // $_POST['userId']= $_SESSION['aUserId'];
        unset($_POST['save']);
         $_POST['image'] = $image;
        
        // echo '<pre>'; print_r($_POST); die();
        $stmt->execute($_POST);
        header('Location:event.php?success=Events Added Successfully');
    }
?>
<?php require 'includes/header.php'; ?>
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
		 			
				  	<div class="wrapper">
                    <form class="form-signin" autocomplete="off" method="post" action="">
                    <h3 class="form-signin-heading text-center">sponser form</h3>
                    <label>Add Image</label>
                    <input type="file" class="form-control-file" name="image">
                     <br>
                      
                    <input type="text" class="form-control" name="company_name" placeholder="Company Name" required="" autofocus="" />
                     <label for="status" class="col-md-1 control-label" name="exiting_customer">Existing Customer</label>
                                <br><br>
                                <input  type="radio" checked="" name="gender" value="yes"/>Yes
                                <input  type="radio" name="gender" value="no"/>No <br> <br>
                    <input type="text" class="form-control" name="primary_phone_number" placeholder="Primary Phone Number" required="" />
                    <input type="text" class="form-control" name="sec_phone_number" placeholder="Secondary Phone Number" required="" />
                    <input type="text" class="form-control" name="contact_details" placeholder="Contact Details" required="" />
                    <input type="text" class="form-control" name="animal_sponser_name" placeholder="Animal Sponser Name" required="" />
                    <label>Select Sponser Type</label>
                        <select name="sponsershipCat"  class="form-control grey-glow">
                            <option value="">Select One</option>
                            <?php 
                            foreach ($sponsercat as $sponsers) {?>
                                <option value="<?php echo $sponsers['s_id'];?>">
                                    <?php echo $sponsers['band'];?>
                                </option>
                            <?php }?>
                        </select>
                        <br>
                    <!-- <input type="text" class="form-control" name="	sponsership_brand" placeholder="Sponseship" required="" /> -->
                    <input type="text" class="form-control" name="start_date_spon" placeholder="Start Date Sponser" required="" />
                    <input type="text" class="form-control" name="total" placeholder="Total Amount" required="" />
                    <input type="text" class="form-control" name="signature_area" placeholder="Signature Area" required="" />
                    	
                    <button class="btn btn-lg btn-primary btn-block" name="sponser" >Add Sponser</button>
                    </form>
                    </div>
		 		</div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
				
<?php require 'includes/footer.php'; ?>