<?php
require 'db/conn.php';
    if(!isset($_SESSION['AUserId'])){
        header('Location:login.php');
    }

$animalTypeList = $pdo->prepare('SELECT * FROM animal_category');
$animalTypeList->execute();

if(isset($_POST['save'])){
     // image updoad
    if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $tmp_loc = $_FILES['image']['tmp_name'];
            $perm_loc = '../uploads/' . $image;
            copy($tmp_loc, $perm_loc);
    }
    else{
         $image = '';
    }
    // image upload ends
    $stmt = $pdo->prepare("insert into 
            animals(animalcategoryId,species_name,name,date_of_birth,gender,avg_life_span,species_category,dietary,natural_habitat,global_population,date_of_joined,dimension,image,gestational_period,mammal_category,avg_body_temp,reproduction_type,avg_clutch_size,avg_offspring,nest_const_metd,aclutch_size,wing_span,ability_to_fly,birds_color_variant,fish_avg_body_temp,water_type,fishes_color_variant) values(:animalcategoryId,:species_name,:name, :date_of_birth,:gender,:avg_life_span, :species_category,:dietary,:natural_habitat,:global_population,:date_of_joined,:dimension,:image,:gestational_period,:mammal_category,:avg_body_temp,:reproduction_type,:avg_clutch_size,:avg_offspring,:nest_const_metd,:aclutch_size,:wing_span,:ability_to_fly,:birds_color_variant,:fish_avg_body_temp,:water_type,:fishes_color_variant)");

    unset($_POST['save']);
    $_POST['image'] = $image;
     // echo '<pre>'; print_r($_POST); die();
    $stmt->execute($_POST);
    header('Location:animals.php?success=Animals Added Successfully');
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
                <h4 class="text-muted mb-2">Add Animal
                <?php
                    if(isset($_GET['success'])){
                      echo ' | <span class="error">' . $_GET['success'] . '</span>';
                    }
                    ?>
                </h4>
                <hr>
                
                <form method="POST" action="" class="col-xl-6" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select Animal Type</label>
                        <select name="animalcategoryId" id="animalcategoryId" class="form-control grey-glow">
                            <option value="">Select One</option>
                            <?php 
                            foreach ($animalTypeList as $animaltype) {?>
                                <option value="<?php echo $animaltype['ac_id'];?>">
                                    <?php echo $animaltype['type'];?>
                                </option>
                            <?php }?>
                        </select>

                        <div class="animalTypeRelatedFields">

                            <div id="mammals">
                                <br>
                                Gestational Period : <input class="form-control grey-glow" type="text" name="gestational_period"><br>
                                Mammal Category
                                <select name="mammal_category" class="form-control grey-glow">
                                    <option value="Prototheria">Prototheria</option>
                                    <option value="Metatheria">Metatheria</option>
                                    <option value="Eutheria">Eutheria</option>
                                </select>
                                <br>
                                Average Body Temperature : <input class="form-control grey-glow" type="text" name="avg_body_temp" required="" autofocus=""><br>

                            </div>
                            <div id="reptiles">
                                <br>
                                Reproduction Type
                                <select name="reproduction_type" class="form-control grey-glow">
                                    <option value="Egg Layer">Egg Layer</option>
                                    <option value="Liver Bearer">Liver Bearer</option>
                                </select>
                                <br>
                                Average Clutch Size : <input class="form-control grey-glow" type="text" name="avg_clutch_size" required="" autofocus=""><br>
                                Average Number of Offspring : <input class="form-control grey-glow" type="text" name="avg_offspring" required="" autofocus=""><br>
                            </div>

                            <div id="birds">
                                <br>
                                Nest Construction Method : <input class="form-control grey-glow" type="text" name="nest_const_metd" required="" autofocus=""><br>
                                <br>
                                Clutch Size : <input class="form-control grey-glow" type="text" name="aclutch_size" required="" autofocus=""><br>
                                Wingspan : <input class="form-control grey-glow" type="text" name="wing_span" required="" autofocus=""><br>
                                Ability to Fly : <input checked="" class="form-control grey-glow" type="radio" name="ability_to_fly" value="Yes" selected="selected" required="" autofocus=""> Yes 
                                <input class="form-control grey-glow" type="radio" name="ability_to_fly" value="No" required="" autofocus=""> No<br>
                                Color Variant
                                <select name="birds_color_variant" class="form-control grey-glow">
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                </select>
                                <br>                            
                            </div>

                            <div id="fishes">
                                <br>
                                Average Body Temperature : <input class="form-control grey-glow" type="text" name="fish_avg_body_temp" required="" autofocus=""><br>
                               Water Type
                                <select name="water_type" class="form-control grey-glow">
                                    <option value="Salty">Salty</option>
                                    <option value="Fresh">Fresh</option>
                                </select>
                                <br>
                                Color Variant
                                <select name="fishes_color_variant" class="form-control grey-glow">
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                </select>
                                <br>
                            </div>
                        </div>
                        <!-- <input name="type" class="form-control">     -->
                        <br>
                        <label>Species Name</label>
                        <input name="species_name" class="form-control" required="" autofocus="">
                        <br>
                        <label>Animals Given Name</label>
                        <input name="name" class="form-control" required="" autofocus="">
                        <br>

                       <!--  <label>Date Of Birth Animal</label>
                        <input type=“date” name="date_of_birth" class="form-control"> -->
                        <label>Date Of Birth Animal</label>
                        <input name="date_of_birth" type="date" class="form-control" required="" autofocus="">
                        <br>
                       
                        <label for="status" class="col-md-1 control-label" name="gender">Gender</label>
                                <br> 
                                <input  type="radio" checked="" name="gender" value="Male"/>Male
                                <input  type="radio" name="gender" value="Female"/>female

                        <br><br>
                        <label>Average Life Span(month/year)</label>
                        <input name="avg_life_span" class="form-control" required="" autofocus="">
                        <br>
                        <label>Species category/Classification</label>
                        <input name="species_category" class="form-control" required="" autofocus="">
                        <br>
                        <label>Dietary Requirements</label>
                        <input name="dietary" class="form-control" required="" autofocus="">
                        <br>
                        <label>Natural Habitat Description</label>
                        <input name="natural_habitat" class="form-control" required="" autofocus="">
                        <br>
                        <label>Global Population Distribution</label>
                        <input name="global_population" class="form-control" required="" autofocus="">
                        <br>
                        <label>Date Animl Joined</label>
                        <input name="date_of_joined" type="date" class="form-control" required="" autofocus="">
                        <br>
                        <label>Animal dimension(height/weight)</label>
                        <input name="dimension" class="form-control" required="" autofocus="">
                        <br>
                        <label>Add Image</label>
                        <input type="file" class="form-control-file" name="image">
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save" class="btn btn-dark" value="Save">
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






