<?php
session_start();
if(!isset($_SESSION['UserId'])){
header('Location:login.php');
    }
require 'admin/db/conn.php';
$sponsercat = $pdo->prepare("select * from sponsership");
$sponsercat->execute();

if(isset($_POST['save'])){
    $stmt = $pdo->prepare("INSERT INTO
            sponshership_form(company_name,exiting_customer,primary_phone_number,sec_phone_number,contact_details,animal_sponser_name,animal_sponser_name,start_date_spon,signature_area,sponsershipCat) values(:company_name,:exiting_customer,:primary_phone_number,:sec_phone_number,:contact_details,:animal_sponser_name,:animal_sponser_name,:start_date_spon,:signature_area,:sponsershipCat)");
   
    unset($_POST['save']);
    // echo '<pre>'; print_r($_POST); die();
    $stmt->execute($_POST);
    // hader('Location:contact.php?success=contacts Added Successfully');
    echo "Tickets added Successfully";
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

<div class="wrapper">
  <div class="container">
  
  </div>
</div>
<!--header-->
 <div class="content">
        <form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
              <div class="form_details">
                <h3>Sponser form</h3> 
                <br><br>
                <label>Company Name</label>
                <input name="company_name" class="form-control" required="" autofocus="" />
                <br>
                <label>Existing Customer</label>
                <input name="exiting_customer" class="form-control" required="" autofocus="">
                <br>
                <label>Primary Phone Number</label>
                <input name="primary_phone_number" class="form-control" required="" autofocus="">

                <br>
                <label>Secondary Phone Number</label>
                <input name="sec_phone_number" class="form-control" required="" autofocus="">

                <label>Contact Details</label>
                <input name="contact_details " class="form-control" required="" autofocus="">

                <label>Animals Sponser Name</label>
                <input name="animal_sponser_name" class="form-control" required="" autofocus="">

                <label>Start Date Sponser</label>
                <input name="start_date_spon" class="form-control" required="" autofocus="">

                <label>Signature Area</label>
                <input name="signature_area" class="form-control" required="" autofocus="">

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
              <div class="form-group">
                <input type="submit" name="save" class="btn btn-dark" value="Save">
                <!-- <a href="animaltype.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a> -->
              </div>
        </form>
        </div>
      </div>  
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
        
<?php require 'includes/footer.php'; ?>