<?php
    // session_start();
	require 'admin/db/conn.php';
    if(!isset($_SESSION['UserId'])){
        header('Location:login.php');
    }
?>
<?php
require 'constants.php';
  $eventList = $pdo->prepare("select * from event");
  $eventList->execute();

if(isset($_POST['keyword'])){
	// print_r($_POST); die();
	$keyword = $_POST['keyword'];
    $search_animals = $pdo->prepare("SELECT * from animals WHERE name like '%$keyword%'");
	$search_animals->execute();
}
?>
<?php require 'includes/userheader.php'; ?>

<?php if(!isset($search_animals)){?>
	<!-- header banner -->
	<div class="header-banner">
		<div class="container">
			<div class="head-banner">
				<h3>Claybrook Zoo </h3>
			</div>
			<div class="banner-grids">
				<!-- <div class="col-md-8 banner-grid">
					
				</div> -->
				<div class="col-md-12 banner-grid">
					<ul class="nav navbar-nav">
									<li><a href="buytickets.php" class="sponser">Buy Tickets</a></li>
									<li><a href="sponserr.php" class="tickets">Sponser</a></li>
									
																	
								</ul>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- hadder banner ends -->
<?php }?>

<!--content-->	

	<!-- welcome -->
	<div class="welcome">
		<div class="content">
			<div class="container">
				<h2>welcome to zoo planet</h2>
				<div class="filtersec">
		            <div class="col-md-9" >
		             	<ul class="categorylist">
		             		<?php 
							$cat = $pdo->prepare('select * from animal_category');
							$cat->execute();
							foreach($cat as $row) {?>
		             			<li style="cursor:pointer" onclick="getAnimals(<?php echo $row['ac_id']?>)"><?php echo $row['type'];?></li>
		             		<?php }?>
		             	</ul>
		            </div>
            	<div class ="col-md-3">
					<form method="post" action="">
		    			<input class="form-control" type="text" name="keyword" placeholder="Search by Name">
					</form>
        		</div>
    		</div>
			<div class="welcome-grids">
				<?php 
				if(isset($search_animals)){
					$animals = $search_animals;
				}
				else{
					$animals = $pdo->prepare('select * from animals where animalcategoryId = ' . MAMMALS);
					$animals->execute();
				}
				foreach($animals as $row) {?>
					<div class="col-md-3 welcome-grid">
						<img src="uploads/<?php echo $row['image'];?>" alt=" " class="img-responsive" />
						<div class="wel-info">
							<h4><?php echo $row['name'];?></h4>
							<h4><?php echo $row['date_of_birth'];?></h4>
							<div>
								<a href="animaldisplay.php?id=<?php echo $row['a_id'];?>" class="btn viewbtn">VIEW MORE</a>
							</div>
						</div>
					</div>
				<?php }?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
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
                
                <div class="col-md-3 event-grid">
				<a href="#" class="mask">
				<img height="300" src  ="http://localhost/zooassignment/admin/image/<?php echo $evenT['image'];?>"></a>
			    </div>             
                <div class="col-md-3 event-grid1">
				<h4><?php echo $evenT['event_name'] ?></h4>
				<h5><?php echo $evenT['date_of_event'];?></h5>
				<h5><?php echo $evenT['location'];?></h5>
				<p><?php echo $evenT['description'];?></p>
			</div>
                    
                  
                <!-- list car ends -->
             <?php }
             }?>
          </div>
        </div>
      </div>
	</div>
</div>
<!--events ends-->
<div class="map">
	<div class="container" style="width: 100%; padding: 0; margin: 0;">
		<div class="row" style="margin: 0;">
			<div class="col-md-4">
				<div class="para">
					<br>
					<h1>Plan Your Visit</h1><br>
				    <h4>visit Our Map  To know more About zoo location</h4>
			    </div>
			</div>
			<div class="col-md-8" style="margin-right: 0; padding-right: 0;">
				<img src="images/map.bmp" style="width: 100%; height: 450px;" class="img-responsive">
			</div>
		</div>
	</div>
</div>
<!-- map block ends -->
				
<?php require 'includes/footer.php'; ?>


<script type="text/javascript">
	function getAnimals(id){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.open('GET', 'ajax/ajaxanimal.php?id=' + id, true);
		xmlHttp.send();

		if(xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState == 4){
				// document.getElementsByClassName('welcome-grids')[0].innerHTML = xmlHttp.reponseText;
				$('.welcome-grids').html(xmlHttp.responseText);
				// alert(xmlHttp.responseText);
			}
		});
	}
</script>