<?php
session_start();
if(!isset($_SESSION['UserId'])){
header('Location:login.php');
}
require 'admin/db/conn.php';
$ticket = $pdo->prepare('SELECT * FROM ticket');
$ticket->execute();
if(isset($_POST['save'])){
        $day = $daysDifference->format("%a");
        $total = $day * $_POST['rate'];
        $stmt = $pdo->prepare("insert into 
                ticket(no_of_adult,no_of_child,day,booked_date,total) values(:no_of_adult  ,:no_of_child,:booked_date,:day,:total)");
        unset($_POST['save']);
        unset($_POST['calculate']);
        unset($_POST['rate']);
        $_POST['day'] = $day;
        $_POST['total'] = $total;
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
<script type="text/javascript">
        function calculateDaysNCostNValidateDates(){
            var start = document.getElementById('rent_start').value;
            var end = document.getElementById('rent_end').value;
            var startDate = new Date(start);
            var endDate = new Date(end);

            if(startDate >= endDate){
                alert('Start Date is greater or equal to end date');
                return false;
            }
            curDate = new Date();
            if(startDate < curDate){
                alert('Start date is past date');
                    return false;
            }
            if(endDate < curDate){
                alert('End date is past date');
                return false;
            }
            var diffTime = Math.abs(endDate - startDate);
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            if(diffDays > 15){
                alert('Date range should be less or equal to 15');
                return false;
            }

            var diff = endDate.getTime() - startDate.getTime();
            var days = diff / (1000 * 3600 * 24);
            var rate = document.getElementById('rate');
            var cost = days * rate.innerHTML;
            document.getElementById('days').innerHTML = days;
            document.getElementById('cost').innerHTML = cost;
        }
        function loadFunction(){
            var element = document.getElementById('calculate');
            element.addEventListener('click', calculateDaysNCostNValidateDates);
        }
        document.addEventListener('DOMContentLoaded', loadFunction);
</script>
<div class="wrapper">
  <div class="container">
  </div>
</div>
<!--header-->
 <div class="content">
  <!-- <div class="contact">
    <div class="container">
      <div class="contact_top"> -->
        <form class="form-signin"  method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
              <div class="form_details">
                <h2>Per Person Adult $2</h2>
                <h2>Per Person Child $1</h2><br>
                <h3>Tickets form</h3> 
                <br><br>
                <label>Number of Adult</label>
                <input name="no_of_adult" class="form-control" required="" autofocus="" />
                <br>
                <label>No of child</label>
                <input name="no_of_child" class="form-control" required="" autofocus="">
                <br>
                <label>Number of day</label>
                <input name="day" class="form-control" required="" autofocus="">
                <br> 
                <label>Date Of booking</label>
                <input name="booked_date" class="form-control" required="" autofocus="">
                <br>                    
                <label>Total</label>
                <input name="total" class="form-control" required="" autofocus="">
                <br>
                <input type="button" id="calculate" value="Total money" name="calculate" />
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