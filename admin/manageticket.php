<?php
  session_start();
  if(!isset($_SESSION['AUserId'])){
  header('Location:login.php');
  }
  require 'db/conn.php';
  $tickets = $pdo->prepare("select ticket.*, user.username   
                          from ticket 
                          join user on ticket.userId = user.u_id
                          ");
  $tickets->execute();


    if(isset($_GET['did'])){
    $tickets = $pdo->prepare('select * from tickets where t_id = :did');
    $tickets ->execute($_GET);
      if($tickets->rowCount() == 0) {
        $stmt = $pdo->prepare('DELETE FROM ticket WHERE t_id = :did');
        $stmt->execute($_GET);
        header('Location:manageticket.php?success=manage Deletted Successfully');
        }
        else{
        $_GET['success'] = 'Can not be deleted because there are Animals under this AnimalType';
            }
                         }
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
    <title>Manage ticket</title>
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
                  <div class="col-xl-6"><h4 class="text-muted mb-2">Manage Tickets</h4></div>
                  <!-- <div class="col-xl-6 text-right"><a href="addevent.php" class="btn btn-info btn-sm">Add New</a></div> -->
                </div>
                <table class="table table-striped bg-light text-center">
                  
                  <thead>
                    <tr class="text-muted">
                      <th>S.N</th>
                      <th>user name</th>
                      <th>No Of Adult</th>
                      <th>No Of Child</th>
                      <th>Booked Date</th>
                      <th>Total Amount</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                       
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tickets as $tickett) {?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $tickett['username'] ?></td>
                        <td><?php echo $tickett['no_of_adult'] ?></td>
                        <td><?php echo $tickett['no_of_child'];?></td> 
                        <td><?php echo $tickett['booked_date'];?></td> 
                        <td><?php echo $tickett['total'];?></td> 
                        <td>
                            <?php 
                                  if($tickett['booked'] == 0){
                                      echo 'Not Confirmed';
                                  }
                                  else{
                                      echo 'Confirmed';
                                  }
                              ?>
                                  
                        </td>
                        <td>
                        <!-- <a href="editEvent.php?eid=<?php ;?>" class="btn btn-info btn-sm">Edit</a> -->
                        <?php if($tickett['booked'] == 0){?>
                                                <a href="manageticket.php?eid=<?php echo $tickett['t_id'];?>" class="btn btn-sm btn-icon btn-primary">Confirm</a>
                                            <?php }?>
                        <a href="manageticket.php?did=<?php echo $tickett['t_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
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


