<?php
  session_start();
  if(!isset($_SESSION['AUserId'])){
  header('Location:login.php');
  }
  require 'db/conn.php';
  $sponsorList = $pdo->prepare("select sponshership_form.*, user.username, animals.name as animalName ,sponsership.yearly_fee   as yearlyFee  
                              from sponshership_form 
                              join user on sponshership_form.userId = user.u_id
                              join animals on sponshership_form.animal_sponser_id = animals.a_id 
                              join sponsership on sponshership_form.sponsershipCat = sponsership.s_id");
  $sponsorList->execute();
 ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Manage Sponsers</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <?php require 'includes/sidebar.php'; ?>
            <!-- end of sidebar -->

            <!-- top-nav -->
            <?php require 'includes/topnav.php'; ?>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->

    <!-- modal -->
    <?php require 'includes/logoutmodal.php'; ?>
    <!-- end of modal -->
    
    <!-- dynamic content -->
    <section>
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5 align-items-center">
              <div class="col-xl-12 col-12 mb-4 mb-xl-0">
                <div class="row">
                  <div class="col-xl-6"><h4 class="text-muted mb-2">Sponser</h4></div>
                  <div class="col-xl-6 text-right"><a href="addanimals.php" class="btn btn-info btn-sm">Add New</a></div>
                </div>
                <table class="table table-striped bg-light text-center">
                  
                  <thead>
                    <tr class="text-muted">
                      <th>S.N</th>
                      <th>User</th>
                      <th>Image</th>
                      <th>Company Name</th>
                      <th>existing Customer</th>
                      <th>Primary Phone Number</th>
                      <th>Secondary Phone Number</th>
                      <th>Contact Details</th>
                      <th>Sponsored Animal Name</th>
                      <th>Spomsership Yearly Fee</th>
                      <th>Sponser date</th>
                      <th>Signage % Area</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                      
                      <th></th>
                    </tr>
                  </thead>
                       
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sponsorList as $sponsers) {?>
                      <tr>
                        <td><?php echo $i++; ?></td> 
                        <td><?php echo $sponsers['username'] ?></td>
                        <td><?php echo $sponsers['image'] ?></td>
                        <td><?php echo $sponsers['company_name'] ?></td>
                        <td><?php echo $sponsers['exiting_customer'];?></td>
                        <td><?php echo $sponsers['primary_phone_number'];?></td>
                        <td><?php echo $sponsers['sec_phone_number'] ?></td>
                        <td><?php echo $sponsers['contact_details'];?></td>
                        <td><?php echo $sponsers['animalName'] ?></td>
                        <td><?php echo $sponsers['yearlyFee'] ?></td>
                        <td><?php echo $sponsers['start_date_spon'];?></td>
                        <td><?php echo $sponsers['signature_area'];?></td>
                      </tr>
                    <?php } ?> 
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- dynamic content ends -->

    <!-- footer -->
    <?php require 'includes/footer.php'; ?>
    <!-- end of footer -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>






