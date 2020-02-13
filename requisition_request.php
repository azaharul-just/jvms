 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 
  <?php require_once("header.php");?>





<section id="Requisition_request">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title"> <i class="fa fa-arrow-down" aria-hidden="true"></i>  Requistion Request List </h2>
                <hr>
                 <?php 
                    if(isset($_REQUEST['edited'])){
                    echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
                  }

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">

                
                <table class="table table-striped text-center">
                    <tr>
                        <th class="hideInSmall">Sl</th>
                        <th >First Name</th>
                        <th >Last Name</th>
                        <th >Dept/Section</th>
                        <th >Vehicle</th>
                        <th >Purpose</th>
                        <th >Status</th>
                        <th >Action</th>
                    </tr>

            <?php 
          if (isset($_COOKIE['currentUser'])) {
            //$currentUserTarget = $_COOKIE['currentUser'];

            //$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $query = "SELECT * FROM rq_tbl ORDER BY id DESC";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>
               

              <tr>
                      <td class="hideInSmall"> <?php echo $i;$i++;?> </td>
                      <td> <?php echo $data['fname'];?> </td>
                      <td> <?php echo $data['lname'];?> </td>
                      <td> <?php echo $data['dept_section'];?> </td>
                      <td> <?php echo $data['bus_type'];?> </td>
                      
                      <td> <?php echo $data['p_type'];?> </td>
                      



                      <td>
                       <?php

                        if ($data['confirm_vehicle'] == 0) {
                          echo "<span style='color:blue'>Pending</span>";
                        } elseif($data['confirm_vehicle']<0){
                          echo "<span style='color:red'>Cancled</span>";
                        }
                        else{
                          echo "<span style='color:green'>Accepted</span>";
                        }
                        

                      ?>
                      </td>





                       <td style="25%" style="text-align: left;">
                        <?php

                        if ($data['confirm_vehicle'] > 0) { ?>
                           <a href="requisition_form_view.php?view_id=<?php echo $data["id"];?>" class="btn btn-primary">View</a> <a href="requisition_report.php?report_id=<?php echo $data["id"];?>" class="btn btn-danger">Cost</a>
                       <?php }
                        else{?>
                           <a href="requisition_form_view.php?view_id=<?php echo $data["id"];?>" class="btn btn-primary">View</a>
                      <?php  }
                        

                      ?>
                       

                         </td>
                       
                    </tr>

 

    <?php }   } }  ?>        

                     </table>



            </div>
        </div>
    </div>
</section>




<!-- Header Start -->

  <?php require_once("header.php")?>