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
                          <th >Cost</th>
                        </tr>

 <?php


           $selectInfo = "SELECT * FROM cost_tbl";
           // $selectInfo = "SELECT cost,fname,lname
           //                FROM cost_tbl
           //                INNER JOIN users
           //                ON cost_tbl.user_id = users.id";
           $run_selectInfo = mysqli_query($connect,$selectInfo);

           $i = 1;
           while($getData = mysqli_fetch_array($run_selectInfo)){
                    //$allcosts = $getData['cost']; 
                    ?>

                        <t.r>
                           
                           <td><?php echo $i;$i++;?></td>

                          <?php 
                             $Info = "SELECT * FROM users WHERE id='1'";
                             $run_Info = mysqli_query($connect,$Info);

                             while($Data = mysqli_fetch_array($run_Info)){
                                  $fname = $Data['fname'];
                                  $lname = $Data['lname'];
                             }

                           ?>


                           <td> <?php echo $fname;?> </td>
                           <td> <?php echo $lname;?> </td>
                           <td> <?php echo $getData['cost'];?> </td>
                        </tr>



 
                <?php } ?>
                        </table>
                </div>
            </div>
        </div>
    </section> 
 <!-- Header Start -->

  <?php   }  //require_once("footer.php")?>