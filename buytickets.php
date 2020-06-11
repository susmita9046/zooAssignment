<?php
session_start();
if(!isset($_SESSION['UserId'])){
header('Location:login.php');
}
require 'admin/db/conn.php';
// $ticket = $pdo->prepare('SELECT * FROM ticket');
// $ticket->execute();

if(isset($_POST['save'])){
        $stmt = $pdo->prepare("insert into ticket(userId,no_of_adult,no_of_child,booked_date,total,booking_status) values(:userId, :no_of_adult, :no_of_child, :booked_date, :total, :booking_status)");
        unset($_POST['save']);
        $_POST['booking_status'] = 0;
        $_POST['userId'] = $_SESSION['UserId'];
         // echo '<pre>'; print_r($_POST); die();
        $stmt->execute($_POST);
        header('Location:buytickets.php?success=tickets Added Successfully');
        // echo "Ticket added Successfully";
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

<script type="text/javascript">
  function getTotal(){
    var adults = document.getElementById('adult_number').value;
    var childs = document.getElementById('child_number').value;
    var total =  adults * 2 + childs * 1;
    document.getElementById('total').value = '$' + total;
    document.getElementById('save').style.display = 'block';
  }
  function loadFunction(){
      var element = document.getElementById('calculate');
      element.addEventListener('click', getTotal);
  }
  document.addEventListener('DOMContentLoaded', loadFunction);
</script>

<div class="content">
    <div class="contact">
      <div class="container">
        <div class="wrapper">
          <div class="container">
            <form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
              <div class="form_details">
                 <?php
                    if(isset($_GET['success'])){
                      echo ' | <span class="error">' . $_GET['success'] . '</span>';
                    }
                    ?>
                <h2>Per Person Adult $2</h2>
                <h2>Per Person Child $1</h2><br>
                <h3>Tickets form
                
                </h3> 
                <br><br>
                <label>Number of Adult</label>
                <input name="no_of_adult" class="form-control" id="adult_number" required="" autofocus="" />
                <br>
                <label>No of child</label>
                <input name="no_of_child" class="form-control" id="child_number" required="" autofocus="">
                <br>
          
                <label>Date Of booking</label>
                <input name="booked_date" class="form-control" required="" type="date" autofocus="">
                <br>                    
                <label>Total</label>
                <input name="total" class="form-control" required="" id="total" readonly="" autofocus="">
                <br>
                <input type="button" id="calculate" value="Total money" />
                <br>  
              <div class="form-group">
                <input type="submit" name="save" class="btn btn-dark" value="Save" style="display: none;" id="save">
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