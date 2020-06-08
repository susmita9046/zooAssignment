<?php
  session_start();
  if(!isset($_SESSION['AUserId'])){
    header('Location:login.php');
  }
   require 'db/conn.php';
  // $admins = $pdo->prepare('select * from user where type = 2');
  // $admins->execute();
  // $adminCount = $admins->rowCount();

  $animalCategory = $pdo->prepare('select * from animal_category');
  $animalCategory->execute();
  $animalCategoryCount = $animalCategory->rowCount();

  $animal = $pdo->prepare('select * from animals');
  $animal->execute();
  $animalCount = $animal->rowCount();

  $users = $pdo->prepare('select * from user where role = 0');
  $users->execute();
  $userCount = $users->rowCount();

  $events = $pdo->prepare('select * from event');
  $events->execute();
  $eventCount = $events->rowCount();
  
  $tickets = $pdo->prepare('select * from ticket');
  $tickets->execute();
  $ticketCount = $tickets->rowCount();

  $sponsers = $pdo->prepare('select * from sponshership_form');
  $sponsers->execute();
  $sponserCount = $sponsers->rowCount();

  $contacts = $pdo->prepare('select * from contact');
  $contacts->execute();
  $contactCount = $contacts->rowCount();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="title icon" href="images/title-img.png"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Dashboard</title>
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
    <section style="height: 90vh">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                        <div>
                        <a href="usermanage.php">
                            <i class="fas fas"></i><br>
                            <h5>User<h5>
                            <h4><?php echo $userCount;?></h4>
                        </a>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-cat fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                        <div>
                          <a href="animaltype.php">
                          <i class="fas fas "></i><br>
                          <h5>Animal Category</h5>
                          <h4><?php echo $animalCategoryCount;?></h4>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-cat fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                          <a href="animals.php">
                          <i class="fas fas "></i><br>
                          <h5>Total Animals</h5>
                          <h4><?php echo $animalCount;?></h4>
                        </a>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-ticket-alt fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                        <a href="manageticket.php">
                          <i class="fas fas "></i><br>
                          <h5>Total Tickets</h5>
                          <h4><?php echo $ticketCount;?></h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user-clock fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                         <div>
                          <a href="event.php">
                          <i class="fas fas "></i><br>
                          <h5>Total Events</h5>
                          <h4><?php echo $eventCount;?></h4>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user-clock fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                         <div>
                          <a href="managesponser.php">
                          <i class="fas fas "></i><br>
                          <h5>Total Sponser</h5>
                          <h4><?php echo $sponserCount;?></h4>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user-clock fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                         <div>
                          <a href="managecontact.php">
                          <i class="fas fas "></i><br>
                          <h5>Total Contact</h5>
                          <h4><?php echo $contactCount;?></h4>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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






