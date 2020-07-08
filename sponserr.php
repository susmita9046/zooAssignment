<?php
// session_start();
require 'admin/db/conn.php';
if(!isset($_SESSION['UserId'])){
  header('Location:login.php');
}

$sponsercat = $pdo->prepare("select * from sponsership");
$sponsercat->execute();

$animalList = $pdo->prepare("select * from animals");
$animalList->execute();
if(isset($_POST['save'])){
  if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $tmp_loc = $_FILES['image']['tmp_name'];
            $perm_loc = 'uploads/' . $image;
            copy($tmp_loc, $perm_loc);
    }
    else{
         $image = '';
    }
    $stmt = $pdo->prepare("INSERT INTO
            sponshership_form(userId,image,company_name,exiting_customer,primary_phone_number,sec_phone_number,contact_details,animal_sponser_id,start_date_spon,signature_area,sponsershipCat) values(:userId,:image,:company_name,:exiting_customer,:primary_phone_number,:sec_phone_number,:contact_details,:animal_sponser_id,:start_date_spon,:signature_area,:sponsershipCat)");
    unset($_POST['save']);
    $_POST['userId'] = $_SESSION['UserId'];
    $_POST['image'] = $image;
    // echo '<pre>'; print_r($_POST); die();
    $stmt->execute($_POST);
    header('Location:sponserr.php?success=sponsers Added Successfully');
    }
?>
<?php require 'includes/userheader.php'; ?>

<style type="text/css">
      body {
        background: #eee;
      }
      .wrapper {
        /*margin: 80px;*/
      }
       .contact{
        background:#fbf7ef;
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
        /*padding: 10px;*/
      }
</style>

<div class="content">
  <div class="contact">
    <div class="container">
      <div class="wrapper">
        <form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
            <div class="form_details">
               <?php
                    if(isset($_GET['success'])){
                      echo ' | <span class="error">' . $_GET['success'] . '</span>';
                    }
                    ?>
              <h3>Sponser form</h3> 
              <br><br>
              <label>Add Image</label>
              <input type="file" class="form-control-file" name="image"><br>
              <label>Company Name</label>
              <input name="company_name" class="form-control" required="" autofocus="" />
              <br>
              <label>Existing Customer</label>
              <br><br>
              <input  type="radio" checked="" name="exiting_customer" value="yes"/> Yes 
              <input  type="radio" name="exiting_customer" value="No"/> No <br> <br>
              <label>Primary Phone Number</label>
              <input name="primary_phone_number" class="form-control" required="" autofocus="">

              <br>
              <label>Secondary Phone Number</label>
              <input name="sec_phone_number" class="form-control" required="" autofocus="">
              <br>
              <label>Contact Details</label>
              <input name="contact_details" class="form-control" required="" autofocus="">
              <br>
              <label>Animals Sponser Name</label>
              <select name="animal_sponser_id" class="form-control" required="">
                <option value="">Select One</option>
                <?php foreach ($animalList as $animal) {?>
                  <option value="<?php echo $animal['a_id'];?>"><?php echo $animal['name'];?></option>
                <?php } ?>

              </select>
              <br>
              <label>Start Date Sponser</label>
              <input name="start_date_spon" type="date" class="form-control" required="" autofocus="">
              <br>
              <label>Signature Area</label>
              <input name="signature_area" class="form-control" required="" autofocus="">
              <br>
              <label>Select Sponser Type</label>
              <select name="sponsershipCat"  class="form-control grey-glow" required="">
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
        
<?php require 'includes/footer.php'; ?>