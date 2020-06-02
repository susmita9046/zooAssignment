<?php
require '../admin/db/conn.php';
 $eventList = $pdo->prepare("select * from event");
  $eventList->execute();
?>

<?php require 'includes/header.php'; ?>
	
<!-- header banner -->
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
								<li><a href="sponser.php" class="sponser">Buy Tickets</a></li>
								<li><a href="about.php" class="tickets">Sponser</a></li>
								
																
							</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- hadder banner ends -->

<!--content-->	

	<!-- welcome -->
	<div class="welcome">
		<div class="content">
	
		<div class="container">
			<h2>welcome to zoo planet</h2>
			<div class="filtersec">
             <div class="col-md-9" >
             	<ul class="categorylist">
             		<li id="reptiles" class="active">Reptiles / Amphibians</li>
             		<li id="fishes">Fishes</li>
             		<li id="mammals">Mammals</li>
             		<li id="birds">Birds</li>
             	</ul>
             </div>
             <div class ="col-md-3">
<form method="post" action="">
    <input class="form-control" type="text" name="keyword" placeholder="Search Here">
</form>
        </div>
    </div>
			<div class="welcome-grids">
				<div class="col-md-3 welcome-grid">
					<img src="images/p1.jpg" alt=" " class="img-responsive" />
					<div class="wel-info">
						<h4>Assumenda est</h4>
						<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
						<div class="text-center">
                        <button class="btn viewbtn" onclick="popUpCar('<?php echo $evenT['e_id'];?>')">
                          VIEW MORE
                        </button>
                      </div>
					</div>

				</div>
				<div class="col-md-3 welcome-grid">
					<img src="images/p2.jpg" alt=" " class="img-responsive" />
					<div class="wel-info">
						<h4>Assumenda est</h4>
						<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
					</div>
				</div>
				<div class="col-md-3 welcome-grid">
					<img src="images/p3.jpg" alt=" " class="img-responsive" />
					<div class="wel-info">
						<h4>Assumenda est</h4>
						<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
					</div>
				</div>
				<div class="col-md-3 welcome-grid">
					<img src="images/p4.jpg" alt=" " class="img-responsive" />
					<div class="wel-info">
						<h4>Assumenda est</h4>
						<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--welcome ends-->
	
	<!--feature-->
	<!-- <div class="feature">
		<div class="container">
			<h3>Our Features</h3>
			<div class="feature-grids">
				<div class="col-md-4 feature-grid">
					<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
					<h4>Earum Rerum</h4>
					<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
				</div>
				<div class="col-md-4 feature-grid">
					<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
					<h4>Itaque Earum</h4>
					<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
				</div>
				<div class="col-md-4 feature-grid">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<h4>Assumenda est</h4>
					<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div> -->
	<!--feature ends-->
</div>
<!--content ends-->


<!--events-->
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
