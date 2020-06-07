<?php
session_start();
if(!isset($_SESSION['AUserId'])){
        header('Location:login.php');
}
require 'db/conn.php';
$animalTypeList = $pdo->prepare('SELECT * FROM animal_category');
$animalTypeList->execute();

if(isset($_GET['eid'])){
    $animals = $pdo->prepare('SELECT * FROM animals WHERE a_id = :eid');
    $animals->execute($_GET);
    $row = $animals->fetch();
}
if(isset($_POST['update'])){
    $stmt = $pdo->prepare("UPDATE animals SET animalcategoryId =:animalcategoryId,species_name =:species_name,name =:name,date_of_birth=:date_of_birth,gender =:gender,avg_life_span =:avg_life_span,species_category =:species_category,dietary =:dietary,natural_habitat =:natural_habitat,global_population =:global_population,date_of_joined =:date_of_joined,dimension =:dimension,image =:image,gestational_period =:gestational_period,mammal_category =:mammal_category,avg_body_temp =:avg_body_temp,reproduction_type =:reproduction_type,avg_clutch_size =:avg_clutch_size,avg_offspring =:avg_offspring,nest_const_metd =:nest_const_metd,aclutch_size =:aclutch_size,wing_span =:wing_span,ability_to_fly =:ability_to_fly,birds_color_variant =:birds_color_variant,fish_avg_body_temp =:fish_avg_body_temp,water_type =:water_type,fishes_color_variant =:fishes_color_variant

     WHERE a_id = :a_id");
    unset($_POST['update']);
    $stmt->execute($_POST);
    header('Location:animals.php?success=animals Updated Successfully');
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
    <title>Add Animal</title>
    <style type="text/css">
        .animalTypeRelatedFields{ margin-left: 5%;  }
        #mammals, #reptiles, #birds, #fishes{
            display: none;
        }
    </style>
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
                <h4 class="text-muted mb-2">Add Animal Type</h4>
                <hr>
                
                <form method="POST" action="" class="col-xl-6">
                    <!-- <input type="hidden" name="a_id" value="<?php echo $row['a_id'];?>"> -->
                    <input type="hidden" name="a_id" value="<?php echo $row['a_id'];?>">
                    <div class="form-group">
                        <label>Select Animal Type</label>
                        <select name="animalcategoryId" id="animalcategoryId" class="form-control grey-glow">
                            <option value="">Select One</option>
                            <?php 
                            foreach ($animalTypeList as $animaltype) {?>
                                <option value="<?php echo $animaltype['ac_id'];?>" >
                                    <?php echo $animaltype['type'];?>
                                </option>
                            <?php }?>
                        </select>

                        <div class="animalTypeRelatedFields">

                            <div id="mammals">
                                <br>
                                Gestational Period : <input class="form-control grey-glow" type="text" name="gestational_period" value="<?php echo $row['gestational_period'];?>"><br>
                                Mammal Category
                                <select name="mammal_category" class="form-control grey-glow">
                                    <option value="Prototheria" <?php if('Prototheria' == $row['gestational_period']) echo 'selected';?>>Prototheria</option>
                                    <option value="Metatheria" <?php if('Metatheria' == $row['gestational_period']) echo 'selected';?>>Metatheria</option>
                                    <option value="Eutheria" <?php if('Eutheria' == $row['gestational_period']) echo 'selected';?>>Eutheria</option>
                                </select>
                                <br>
                                Average Body Temperature : <input class="form-control grey-glow" type="text" name="avg_body_temp" value="<?php echo $row['avg_body_temp'];?>"><br>

                            </div>
                            <div id="reptiles">
                                <br>
                                Reproduction Type
                                <select name="reproduction_type" class="form-control grey-glow">
                                    <option value="Egg Layer" <?php if('Egg Layer' == $row['reproduction_type']) echo 'selected';?>>Egg Layer</option>
                                    <option value="Liver Bearer" <?php if('Liver Bearer' == $row['reproduction_type']) echo 'selected';?>>Liver Bearer</option>
                                </select>
                                <br>
                                Average Clutch Size : <input class="form-control grey-glow" type="text" name="avg_clutch_size" value="<?php echo $row['avg_clutch_size'];?>"><br>
                                Average Number of Offspring : <input class="form-control grey-glow" type="text" name="avg_offspring" value="<?php echo $row['avg_offspring'];?>"><br>
                            </div>

                            <div id="birds">
                                <br>
                                Nest Construction Method : <input class="form-control grey-glow" type="text" name="nest_const_metd" value="<?php echo $row['nest_const_metd'];?>"><br>
                                <br>
                                Clutch Size : <input class="form-control grey-glow" type="text" name="aclutch_size" value="<?php echo $row['aclutch_size'];?>"><br>
                                Wingspan : <input class="form-control grey-glow" type="text" name="wing_span" value="<?php echo $row['wing_span'];?>"><br>

                                Ability to Fly : <input checked="" class="form-control grey-glow" type="radio" name="ability_to_fly" value="Yes" selected="selected"> Yes 
                                <input class="form-control grey-glow" type="radio" name="ability_to_fly" value="No"> No<br>
                                Color Variant:
                               <!--  <select name="birds_color_variant" class="form-control grey-glow">
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                </select> -->
                                 <input class="form-control grey-glow" type="text" name="birds_color_variant" value="<?php echo $row['birds_color_variant'];?>"><br>
                                <br>                            
                            </div>

                            <div id="fishes">
                                <br>
                                Average Body Temperature : <input class="form-control grey-glow" type="text" name="fish_avg_body_temp" value="<?php echo $row['fish_avg_body_temp'];?>"><br>
                               Water Type:
                              <!--   <select name="water_type" class="form-control grey-glow">
                                    <option value="Salty">Salty</option>
                                    <option value="Fresh">Fresh</option>
                                </select> -->

                                <input class="form-control grey-glow" type="text" name="water_type" value="<?php echo $row['water_type'];?>"><br>
                                
                                Color Variant
                               <!--  <select name="fishes_color_variant" class="form-control grey-glow">
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                </select> -->
                                  <input class="form-control grey-glow" type="text" name="fishes_color_variant" value="<?php echo $row['fishes_color_variant'];?>"><br>
                                
                            </div>
                        </div>
                        <!-- <input name="type" class="form-control">     -->
                        <br>
                        <label>Species Name</label>
                        <input name="species_name" class="form-control" value="<?php echo $row['species_name'];?>">
                        <br>
                        <label>Animals Given Name</label>
                        <input name="name" class="form-control" value="<?php echo $row['name'];?>">
                        <br>

                       <!--  <label>Date Of Birth Animal</label>
                        <input type=“date” name="date_of_birth" class="form-control"> -->
                        <label>Date Of Birth Animal</label>
                        <input name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth'];?>">
                        <br>
                       
                        <label for="status" class="col-md-1 control-label" name="gender">Gender</label>
                                <br> 
                                <input  type="radio" checked="" name="gender" value="Male"/>Male
                                <input  type="radio" name="gender" value="Female"/>female

                        <br><br>
                        <label>Average Life Span(month/year)</label>
                        <input name="avg_life_span" class="form-control" value="<?php echo $row['avg_life_span'];?>">
                        <br>
                        <label>Species category/Classification</label>
                        <input name="species_category" class="form-control" value="<?php echo $row['species_category'];?>">
                        <br>
                        <label>Dietary Requirements</label>
                        <input name="dietary" class="form-control" value="<?php echo $row['dietary'];?>">
                        <br>
                        <label>Natural Habitat Description</label>
                        <input name="natural_habitat" class="form-control" value="<?php echo $row['natural_habitat'];?>">
                        <br>
                        <label>Global Population Distribution</label>
                        <input name="global_population" class="form-control" value="<?php echo $row['global_population'];?>">
                        <br>
                        <label>Date Animl Joined</label>
                        <input name="date_of_joined" class="form-control" value="<?php echo $row['date_of_joined'];?>">
                        <br>
                        <label>Animal dimension(height/weight)</label>
                        <input name="dimension" class="form-control" value="<?php echo $row['dimension'];?>">
                        <br>
                        <label>Add Image</label>
                        <input type="file" class="form-control-file" name="image" value="<?php echo $row['image'];?>">
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-dark" value="Save">
                        <a href="animaltype.php" class="btn btn-outline-dark ml-1"><i class="fa fa-close"></i> Back</a>
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

    <script type="text/javascript">
        var animalCat = document.getElementById('animalcategoryId');
        animalCat.addEventListener('change', function(){
            if(this.value == 2){
                document.getElementById('mammals').style.display = 'block';
                document.getElementById('reptiles').style.display = 'none';
                document.getElementById('birds').style.display = 'none';
                document.getElementById('fishes').style.display = 'none';
            }
            if(this.value == 3){
                document.getElementById('reptiles').style.display = 'block';
                document.getElementById('mammals').style.display = 'none';
                document.getElementById('birds').style.display = 'none';
                document.getElementById('fishes').style.display = 'none';
            }
            if(this.value == 4){
                document.getElementById('birds').style.display = 'block';
                document.getElementById('mammals').style.display = 'none';
                document.getElementById('reptiles').style.display = 'none';
                document.getElementById('fishes').style.display = 'none';
            }
            if(this.value == 5){
                document.getElementById('fishes').style.display = 'block';
                document.getElementById('mammals').style.display = 'none';
                document.getElementById('reptiles').style.display = 'none';
                document.getElementById('birds').style.display = 'none';
            }
        });
    </script>
    </body>
</html>






