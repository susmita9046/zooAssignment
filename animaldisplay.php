<?php
// require 'constants.php';
require 'admin/db/conn.php';
$id = $_GET['id'];
 $animal = $pdo->prepare("select * from animals where a_id = '$id'");
  $animal->execute();
  $row = $animal->fetch();
  // echo '<pre>'; print_r($row);
?>

<?php require 'includes/header.php'; ?>
	
<!--content-->	

	<!--single animal display-->
	<div class="content">
		<div class="about-section">
			<div class="container">
				<div class="about-grids">
					<div class="col-md-6 about-grid">
						<h3><?php echo $row['name'];?></h3>
						<img src="uploads/<?php echo $row['image'];?>" class="img-responsive" alt="<?php echo $row['name'];?>">
						<div class="about1">
							<h4>Praesent justo dolor, lobortis</h4>
							<p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet.</p>
						</div>
						<div class="about2">
						<h4>Sed in lacus ut enim</h4>
						<p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl.</p>
						</div>
						</div>
					<div class="col-md-6 about-grid">
						<h3>history</h3>
						<div class="history">
							<h5>1997-2001</h5>
							<p>Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis.</p>
						</div>
						<div class="history1">
							<h5>2003-2005</h5>
							<p>Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis.</p>
						</div>
						<div class="history2">
							<h5>2007-2009</h5>
							<p>Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis.</p>
						</div>
						<div class="history3">
							<h5>2011-20014</h5>
							<p>Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- single animal display ends -->
	<!--about-->

<!--events ends-->
				
<?php require 'includes/footer.php'; ?>