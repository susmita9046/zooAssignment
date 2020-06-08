<?php
session_start();
if(!isset($_SESSION['AUserId'])){
        header('Location:login.php');
}
require 'db/conn.php';
    if(isset($_GET['eid'])){
    $events = $pdo->prepare('SELECT * FROM event WHERE e_id = :eid');
    $events->execute($_GET);
    $row = $events->fetch();
    }
if(isset($_POST['update'])){
    $stmt = $pdo->prepare("UPDATE event SET event_name = :event_name,image =:image,date_of_event =:date_of_event,end_of_event =:end_of_event,location =:location ,description =:description 
        WHERE e_id = :e_id");
    unset($_POST['update']);
    $stmt->execute($_POST);
    header('Location:event.php?success=Event Updated Successfully');
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
    <title>Edit Event</title>
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
        <div class="row mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5 align-items-center">
              <div class="col-xl-12 col-12 mb-4 mb-xl-0">
                <h4 class="text-muted mb-2">Add Event</h4>
                <hr>
                
                <form method="POST" action="" class="col-xl-6">
                    <input type="hidden" name="e_id" value="<?php echo $row['e_id'];?>">
                    <div class="form-group">
                        <br>
                        <label>Event Name</label>
                        <input name="event_name" value="<?php echo $row['event_name'];?>" class="form-control">
                        <br>
                        <label>Add Image</label>
                        <!-- <input type="file" class="form-control" name="image"> -->
                        <input name="image" value="<?php echo $row['image'];?>" class="form-control">
                        <br>
                        <label>Date of event</label>
                        <!-- <input name="date_of_event" class="form-control"> -->
                        <input name="date_of_event" value="<?php echo $row['date_of_event'];?>" class="form-control">
                        <br>
                        <label>End Of Event Date</label>
                        <!-- <input name="end_of_event" class="form-control"> -->
                        <input name="end_of_event" value="<?php echo $row['end_of_event'];?>" class="form-control">
                        <br>
                        <label>location</label>
                        <!-- <input name="location" class="form-control"> -->
                        <input name="location" value="<?php echo $row['location'];?>" class="form-control">
                        <br>
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5">
                            <?php echo $row['description'];?>"
                        </textarea>
                        <br> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-dark" value="Save">
                        <a href="event.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- dynamic content ends -->

    <!-- footer -->
    <!-- <?php require 'includes/footer.php'; ?> -->
    <!-- end of footer -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>








