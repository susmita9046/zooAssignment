<div class="events">
	<div class="container">
		<h3>Events Of Zoo</h3>
         <!-- <div class = "row"> -->
        <div class="events-grids">
        	<div class = "col-md-12 ">
           		<?php 
           	 	if($eventList->rowCount() > 0){
              		foreach ($eventList as $evenT) {?>   
		                <div class="col-md-3 event-grid">
							<a class="mask">
								<img height="200" src ="http://localhost/zooassignment/admin/image/<?php echo $evenT['image'];?>">
							</a>
							<div><br>
								<h5><b>Event Name :</b> <?php echo $evenT['event_name'] ?></h5>
								<br>
								<h5><b>Event Date :</b> <?php echo $evenT['date_of_event'];?></h5>
								<br>
								<h5><b>Location : </b> <?php echo $evenT['location'];?></h5>
								<br>
								<p><b>Description : </b> <?php echo $evenT['description'];?></p><br>
							</div>
					   	</div>             
             		<?php }
             	}?>
         	 </div>
        </div>
    </div>
</div>