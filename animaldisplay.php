<?php
require 'constants.php';
require 'admin/db/conn.php';
$id = $_GET['id'];
 $animal = $pdo->prepare("select a.*, ac.type as animal_category from animals as a 
 						join animal_category as ac on a.animalcategoryId = ac.ac_id
 						 where a.a_id = '$id'");
  $animal->execute();
  $row = $animal->fetch();
  // echo '<pre>'; print_r($row); die();
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
							<h3>Animal Category : </h3>
							<h2><?php echo $row['animal_category'];?></h2>
						</div>

						<?php if($row['animalcategoryId'] == MAMMALS){?>
							<div class="about3">
								<h3>Gestational Period:</h3>
								<h2><?php echo $row['gestational_period'];?></h2>
							</div>
							<div class="col-md-6 about-grid">
								<h3>Mammal Category :</h3>
								<div class="history">
									<h2><?php echo $row['mammal_category'];?></h2>	
								</div>
							</div>
							<div class="history1">
								<h3>Average body temperature:</h3>
								<h2><?php echo $row['avg_body_temp'];?></h2>	
							</div>
						<?php }
						else if($row['animalcategoryId'] == REPTILES){?>
                            <div class="history2">
								<h3>Reproduction type:</h3>
								<h2><?php echo $row['reproduction_type'];?></h2>	
							</div>
							<div class="history3">
								<h3>Average Clutch Size:</h3>
								<h2><?php echo $row['avg_clutch_size'];?></h2>
								
							</div>
							<div class="history3">
								<h3>Average number of offspring:</h3>
								<h2><?php echo $row['avg_offspring'];?></h2>
								
							</div>
						<?php }
						else if($row['animalcategoryId'] == BIRDS){?>
							<div class="history3">
								<h3>Nest Construction Method:</h3>
								<h2><?php echo $row['nest_const_metd'];?></h2>
							</div>
							<div class="history3">
								<h3>Clutch size:</h3>
								<h2><?php echo $row['aclutch_size'];?></h2>
							</div>
							<div class="history3">
								<h3>Wing Span:</h3>
							    <h2><?php echo $row['wing_span'];?></h2>
							</div>
							<div class="history3">
								<h3>Ability to fly (Yes/No):</h3>
								<h2><?php echo $row['ability_to_fly'];?></h2>
							</div>
							<div class="history3">
								<h3>Plumage colour variants (possibly by gender):</h3>
								<h2><?php echo $row['birds_color_variant'];?></h2>
							</div>
					    <?php }
					    else if($row['animalcategoryId'] == FISH){?>
					    	<div class="history3">
								<h3>Average body temperature:</h3>
								<h2><?php echo $row['fish_avg_body_temp'];?></h2>
							</div>
							<div class="history3">
								<h3>Water Type :</h3>
								<h2><?php echo $row['water_type'];?></h2>
							</div>
							<div class="history3">
								<h3>Fishes Color variants:</h3>
								<h2><?php echo $row['fishes_color_variant'];?></h2>
							</div>
					    <?php }?>
					    <div class="about2">
					        <h3>Species Name:</h3>
						<h2><?php echo $row['species_name'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Date Of Birth:</h3>
						<h2><?php echo $row['date_of_birth'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Gender:</h3>
						<h2><?php echo $row['gender'];?></h2>
						
						</div>
                        </div>
                        <div class="col-md-6 about-grid">
						
						
						<div class="about3">
							<h3>Average Life Span:</h3>
						<h2><?php echo $row['avg_life_span'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Species Category/Classification:</h3>
						<h2><?php echo $row['species_category'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Dietary Requirements:</h3>
						<h2><?php echo $row['dietary'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Natural Habitat Description:</h3>
						<h2><?php echo $row['natural_habitat'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Global Population Distribution:</h3>
						<h2><?php echo $row['global_population'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Date animal joined the zoo</h3>
						<h2><?php echo $row['date_of_joined'];?></h2>
						
						</div>
						<div class="about3">
							<h3>Typical animal dimensions (e.g. height, weight)</h3>
						<h2><?php echo $row['dimension'];?></h2>
					    </div>
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