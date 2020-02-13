  <?php

if (!isset($_COOKIE['currentUser'])) {

  header("location: index.php");
}


?>

 <!-- Header Start -->

  <?php require_once("header.php")?>
<?php require_once("config.php");?>



    <section id="Requisition_result">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-arrow-down"></i>  Requisiton result</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary my-3" href="index.php">Go Back</a>
                </div>
            </div>
             <?php
                  if(isset($_REQUEST['edited'])){
                  echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
                }

            ?>
            <div class="row">
                <div class="col">
                    <?php

                       if (isset($_COOKIE['currentUser'])) {
                                $currentUserTarget = $_COOKIE['currentUser'];

                                $query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
                                $run_query = mysqli_query($connect,$query);

                                if ($run_query==true) {
                                  while($getRow = mysqli_fetch_array($run_query)){

                                    $user_id = $getRow['id'];
                               }
                             }
                    ?>



                    <table class="table text-center">
                        <tr class="table_head">
                          <th >Sl</th>
                          <th >First Name</th>
                          <th >Last Name</th>
                          <th >Journey Date</th>
                          <th >Cost</th>
                        </tr>

                        <?php 
                          // $costselect = "SELECT * FROM cost_tbl";
                           $costselect = "SELECT cost_tbl.*,rq_tbl.fname,rq_tbl.lname,rq_tbl.date           
                                          FROM cost_tbl
                                          INNER JOIN rq_tbl          
                                          ON cost_tbl.rq_id=rq_tbl.id"; 
                           $run_costselect = mysqli_query($connect,$costselect);
                           if ($run_costselect==true) {
                              $cost = 0;
                              $i =1;
                              while ($getCost = mysqli_fetch_array($run_costselect)) { 
                              $cost  = $getCost['cost'];
                              $fname  = $getCost['fname'];
                              $lname  = $getCost['lname'];
                              $Journey  = $getCost['date'];

                              ?>

                          <tr>
 
                            <td><?php echo $i;$i++; ?></td> 
                            <td><?php echo $fname;  ?></td>
                            <td><?php echo $lname;  ?></td>
                            <td><?php echo $Journey;  ?></td>
                            <td><?php echo $cost;  ?></td>

                          </tr>

                   <?php  } }  ?>
                            
                          






                        </table>
                </div>
            </div>
        </div>
    </section> 
 <!-- Header Start -->

  <?php   }  //require_once("footer.php")?>