<?php
    // session_start();
    require 'admin/db/conn.php';
    if(!isset($_SESSION['UserId'])){
        header('Location:login.php');
    }
    // require 'admin/db/conn.php';
    $sponsorList = $pdo->prepare("select sponshership_form.*, user.username, animals.name as animalName ,sponsership.yearly_fee   as yearlyFee  
                              from sponshership_form 
                              join user on sponshership_form.userId = user.u_id
                              join animals on sponshership_form.animal_sponser_id = animals.a_id 
                              join sponsership on sponshership_form.sponsershipCat = sponsership.s_id");
    $sponsorList->execute();
    if(isset($_GET['did'])){
    $sponsers = $pdo->prepare('select * from sponsers where sf_id = :did');
    $sponsers ->execute($_GET);
      if($sponsers->rowCount() == 0) {
        $stmt = $pdo->prepare('DELETE FROM sponshership_form WHERE sf_id = :did');
        $stmt->execute($_GET);
        header('Location:sponserlist.php?success=sponsers Deletted Successfully');
        }
                               }

?>

<?php require 'includes/userheader.php'; ?>
<div class="container">
        <div class="row mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5 align-items-center">
              <div class="col-xl-12 col-12 mb-4 mb-xl-0">
                <div class="row">
                  <div class="col-xl-6"><h1 class="text-muted mb-2">Your Sponsherhip Details</h1></div><br><br>
                  <!-- <div class="col-xl-6 text-right"><a href="addevent.php" class="btn btn-info btn-sm">Add New</a></div> -->
                </div>
                <table class="table table-striped bg-light">
                  
                  <thead>
                     <th>S.N</th>
                      <th>User</th>
                      <th>Image</th>
                      <th>Company Name</th>
                      <th>existing Customer</th>
                      <th>Primary Phone Number</th>
                      <th>Secondary Phone Number</th>
                      <th>Contact Details</th>
                      <th>Sponsored Animal Name</th>
                      <th>Spomsership Yearly Fee</th>
                      <th>Sponser date</th>
                      <th>Signage % Area</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                      
                      <th></th>
                    </tr>
                  </thead>
                       
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sponsorList as $sponsers) {?>
                      <tr>
                        <td><?php echo $i++; ?></td> 
                        <td><?php echo $sponsers['username'] ?></td>
                        <td><img src="uploads/<?php echo $sponsers['image'];?>" width="70" height="50"></td>
                        <td><?php echo $sponsers['company_name'] ?></td>
                        <td><?php echo $sponsers['exiting_customer'];?></td>
                        <td><?php echo $sponsers['primary_phone_number'];?></td>
                        <td><?php echo $sponsers['sec_phone_number'] ?></td>
                        <td><?php echo $sponsers['contact_details'];?></td>
                        <td><?php echo $sponsers['animalName'] ?></td>
                        <td><?php echo $sponsers['yearlyFee'] ?></td>
                        <td><?php echo $sponsers['start_date_spon'];?></td>
                        <td><?php echo $sponsers['signature_area'];?></td>
                        <td>
                          <a href="sponserlist.php?did=<?php echo $sponsers['sf_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                         </td>  
                      </tr>
                    <?php } ?> 
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>

