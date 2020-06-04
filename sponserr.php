<?php
session_start();
if(!isset($_SESSION['UserId'])){
header('Location:login.php');
}

require 'admin/db/conn.php';
$ticket = $pdo->prepare('SELECT * FROM ticket');
$ticket->execute();

if(isset($_POST['save'])){
$stmt = $pdo->prepare("insert into 
      ticket(no_of_adult,no_of_child,booked_date,total) values(:no_of_adult  ,:no_of_child,:booked_date,:total)");

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
      <form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
              <div class="form_details">
                <h3>Tickets form</h3> 
                <br><br>
                <label>Add Image</label>
                <input type="file" class="form-control-file" name="image">
                <br>
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
                <label for="status" class="col-md-1 control-label" name="">Existing Customer</label>
                <br> <br>exiting_customer
                <input  type="radio" checked="" name="exiting_customer" value="yes"/>yes
                <input  type="radio" name="exiting_customer" value="no"/>no
                <label>Number of Adult</label>
                <input name="primary_phone_number" class="form-control" required="" autofocus="" />
                <br>
                <label>No of child</label>
                <input name="sec_phone_number" class="form-control" required="" autofocus="">
                <br>
                <label>Date Of booking</label>
                <input name="contact_details" class="form-control" required="" autofocus="">
                <br>
                <label>Date Of booking</label>
                <input name="animal_sponser_name" class="form-control" required="" autofocus="">
                <br>
                <label>Date Of booking</label>
                <input name="signature_area" class="form-control" required="" autofocus="">
                <br>
                <label>Total</label>
                <input name="total" class="form-control" required="" autofocus="">
                <br>
              <div class="form-group">
                <input type="submit" name="save" class="btn btn-dark" value="Save">
                <!-- <a href="animaltype.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a> -->
              </div>
        </form>


      <div class="clearfix"> </div>
     
    </div>
</div>
    
    <!-- dynamic content ends -->

    <!-- footer -->
<?php require 'includes/footer.php'; ?>
<!-- end of footer -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
