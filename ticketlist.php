<?php
    session_start();
    if(!isset($_SESSION['UserId'])){
        header('Location:login.php');
    }
    require 'admin/db/conn.php';
    $tickets = $pdo->prepare("select * from ticket");
    $tickets->execute();
    if(isset($_GET['did'])){
    $ticket = $pdo->prepare('select * from ticket where t_id = :did');
    $ticket ->execute($_GET);
      if($ticket->rowCount() == 0) {
        $stmt = $pdo->prepare('DELETE FROM ticket WHERE t_id = :did');
        $stmt->execute($_GET);
        header('Location:ticketlist.php?success=Ticket Deletted Successfully');
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
                  <div class="col-xl-6"><h4 class="text-muted mb-2">Your Pending Rent</h4></div>
                  <!-- <div class="col-xl-6 text-right"><a href="addevent.php" class="btn btn-info btn-sm">Add New</a></div> -->
                </div>
                <table class="table table-striped bg-light text-center">
                  
                  <thead>
                    <tr class="text-muted">
                      <th>S.N</th>
                      <th>No Of Adult</th>
                      <th>No OF Child</th>
                      <th>Booked Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                       
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tickets as $Ticket) {?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $Ticket['no_of_adult'] ?></td> 
                        <td><?php echo $Ticket['no_of_child'];?></td> 
                        <td><?php echo $Ticket['booked_date'];?></td> 
                        <td><?php echo $Ticket['total'];?></td> 
                        <td></td>
                        <td>
                        <!-- <a href="editEvent.php?eid=<?php ;?>" class="btn btn-info btn-sm">Edit</a> -->
                        <a href="ticketlist.php?did=<?php echo $Ticket['t_id'];?>" class="btn btn-danger btn-sm">Cancel</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>

