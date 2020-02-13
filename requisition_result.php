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
                          <th >Date</th>
                          <th >Driver</th>
                          <th >Phone</th>
                          <th >Status</th>
                        </tr>

 <?php


           $selectInfo = "SELECT * FROM rq_tbl WHERE user_id='$user_id' ";
           $run_selectInfo = mysqli_query($connect,$selectInfo);

           while($getData = mysqli_fetch_array($run_selectInfo)){
                    $driver_ride = $getData['confirm_vehicle'];

                    // if ($driver_ride==0) {
                    //    echo "<span style='color:blue;'>Wait!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is pending....<hr>";
                    // }
                    // if ($driver_ride=='') {
                    //    echo "<span style='color:blue;'>Wait!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is pending to admin....<hr>";
                    // }
                    //  if ($driver_ride < 0) {
                    //    echo "<span style='color:red;'>Sorry!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is canceled for some reasonns!<hr>";
                    // }

                    ?>




<?php
                  if ($driver_ride >0) {
                    $driverInfo = "SELECT * FROM adddriver_tbl WHERE driver_ride='$driver_ride' ";
                    $run_driverInfo = mysqli_query($connect,$driverInfo);

                    while ($driver_data = mysqli_fetch_array($run_driverInfo)) {?>


                  <tr>

                    <td><?php echo $getData['date'] ?></td>

                    <td>
                      <?php echo $driver_data['driver_name'];?>

                    </td>
                     <td>
                      <?php echo $driver_data['driver_number']; ?>

                    </td>

                    <td>
                      <?php echo "Accepted"; ?>

                    </td>
                   <!--  <td>
                      <?php
                      $select_cost_Info = "SELECT cost_tbl.id,cost_tbl.rq_id,cost_tbl.user_id,cost_tbl.cost,rq_tbl.id from cost_tbl join rq_tbl on cost_tbl.rq_id=rq_tbl.id";
                       $run_cost_selectInfo = mysqli_query($connect,$select_cost_Info);

                      while($costData = mysqli_fetch_array($run_cost_selectInfo)){

                        $cost = $costData['cost'];
                        echo $cost;
                      }

                       ?>

                    </td> -->






                  </tr>

<?php  } }elseif($driver_ride < 0){ ?>

              <tr>

                    <td><?php echo $getData['date'];?></td>

                    <td>
                      <?php echo "No";?>
                   </td>
                   <td>
                      <?php echo "No"; ?>

                    </td>

                    <td>
                      <?php echo "<span style='color:red'>Canceled</span>"; ?>

                    </td>
                     <!-- <td>
                      <?php echo "0"; ?>

                    </td> -->





                  </tr>


<?php }else{ ?>

              <tr>

                    <td><?php echo $getData['date'];?></td>

                    <td>
                      <?php echo "No";?>
                   </td>
                   <td>
                      <?php echo "No"; ?>

                    </td>

                    <td>
                      <?php echo "<span style='color:blue'>Pending</span>"; ?>

                    </td>
                    <!-- <td>
                      <?php echo "0"; ?>

                    </td> -->







                  </tr>


<?php } }   ?>





                        </table>
                </div>
            </div>
        </div>
    </section>






 <!-- Header Start -->

  <?php } //require_once("footer.php")?>