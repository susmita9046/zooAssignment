<?php
	require '../admin/db/conn.php';
	 $id = $_GET['id'];
	 $animals = $pdo->prepare("select * from animals where animalcategoryId = '$id'");
	 $animals->execute();

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