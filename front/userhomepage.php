<?php
session_start();
  if(!isset($_SESSION['UserId'])){
    header('Location:login.php');
  }
require '../admin/db/conn.php';
 $eventList = $pdo->prepare("select * from event");
  $eventList->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>this is the homepage</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<div class="header-banner">
	<div class="container">
		<div class="head-banner">
			<h3>Dave Zucconi Conservation Center</h3>
			<p>Donec dui velit, hendrerit id pharetra nec, posuere porta nisl. Donec magna nulla, commodo in ultrices faucibus lacus aliquet.Donec dui velit, hendrerit id pharetra nec</p>
		</div>
		<div class="banner-grids">
			<!-- <div class="col-md-8 banner-grid">
				
			</div> -->
			<div class="col-md-12 banner-grid">
				<ul class="nav navbar-nav">
								<li><a href="buyticket.php" class="sponser">Buy Tickets</a></li>
								<li><a href="sponser.php" class="tickets">Sponser</a></li>
								
																
							</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- hadder banner ends -->
<div class="events">
	<div class="container">
		<h3>events</h3>
         <!-- <div class = "row"> -->
        <div class="events-grids">
        <div class = "col-md-12 ">
          
           <?php 
            if($eventList->rowCount() > 0){
              foreach ($eventList as $evenT) {?>
                <!-- list car -->
                <!-- <div class="col-md-3 ">
                  <div class="card info" style="color:black;">   -->    
                  <div class="col-md-3 event-grid">
				<a href="#" class="mask">
				<img src ="http://localhost/zooassignment/admin/image/<?php echo $evenT['image'];?>"></a>
			    </div>             
                    <div class="col-md-3 event-grid1">
				<h4><?php echo $evenT['event_name'] ?></h4>
				<h5><?php echo $evenT['date_of_event'];?></h5>
				<h5><?php echo $evenT['location'];?></h5>
				<p><?php echo $evenT['description'];?></p>
			</div>
                    
                  </div>
                </div>
               </div> 
                <!-- list car ends -->
             <?php }
            }else{?>
              <div>Soory we couldnot find animals you are searching.</div>
            <?php }?>
          </div>
        </div>
      </div>
	</div>
</div>
<!--events ends-->
				
<?php require 'includes/footer.php'; ?>
</body>
</html>