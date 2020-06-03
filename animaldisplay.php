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

						<!-- <h3>Animal Name</h3> -->
						<h3><?php echo $row['name'];?></h3>
						<img src="uploads/<?php echo $row['image'];?>" class="img-responsive" alt="<?php echo $row['name'];?>">
						
						<div class="about2">
					        <h2>Species Name:</h2>
						<h3><?php echo $row['species_name'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Date Of Birth:</h2>
						<h3><?php echo $row['date_of_birth'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Gender:</h2>
						<h3><?php echo $row['gender'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Average Life Span:</h2>
						<h3><?php echo $row['avg_life_span'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Species Category/Classification:</h2>
						<h3><?php echo $row['species_category'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Dietary Requirements:</h2>
						<h3><?php echo $row['dietary'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Natural Habitat Description:</h2>
						<h3><?php echo $row['natural_habitat'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Global Population Distribution:</h2>
						<h3><?php echo $row['global_population'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Date animal joined the zoo</h2>
						<h3><?php echo $row['date_of_joined'];?></h3>
						
						</div>
						<div class="about3">
							<h2>Typical animal dimensions (e.g. height, weight)</h2>
						<h3><?php echo $row['dimension'];?></h3>
					
						</div>
						<div class="about3">
							<h2>Gestational Period:</h2>
						<h3><?php echo $row['gestational_period'];?></h3>
					
						</div>
						</div>
					<div class="col-md-6 about-grid">
						    <h2>Mammal Category :</h2>
						<div class="history">
							<h3><?php echo $row['mammal_category'];?></h3>
							
						</div>
						<div class="history1">
							<h2>Average body temperature:</h2>
							<h3><?php echo $row['avg_body_temp'];?></h3>
							
						</div>
						<div class="history2">
							<h2>Reproduction type:</h2>
							<h3><?php echo $row['reproduction_type'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Reproduction type:</h2>
							<h3><?php echo $row['avg_clutch_size'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Average number of offspring:</h2>
							<h3><?php echo $row['avg_offspring'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Nest Construction Method:</h2>
							<h3><?php echo $row['nest_const_metd'];?></h3>
						
						</div>
						<div class="history3">
							<h2>Clutch size:</h2>
							<h3><?php echo $row['aclutch_size'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Wing Span:</h2>
						    <h3><?php echo $row['wing_span'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Ability to fly (Yes/No):</h2>
							<h3><?php echo $row['ability_to_fly'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Plumage colour variants (possibly by gender):</h2>
							<h3><?php echo $row['birds_color_variant'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Average body temperature:</h2>
							<h3><?php echo $row['fish_avg_body_temp'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Water Type :</h2>
							<h3><?php echo $row['water_type'];?></h3>
							
						</div>
						<div class="history3">
							<h2>Fishes Color variants:</h2>
							<h3><?php echo $row['fishes_color_variant'];?></h3>
							
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