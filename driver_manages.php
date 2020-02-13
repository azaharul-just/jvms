 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 <?php require_once("header.php");?>



    <section id="All_users_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-users" aria-hidden="true"></i>  All Driver List</h2>
                </div>
            </div>
         
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-9">
                          <div class="form-group">
                             <!--  <input type="text" class="form-control" placeholder="Type any keyword"> -->
                             <input type="text" name="search" class="form-control" placeholder="Keywords any type">
        
                          </div>
                    </div>
                    <div class="col-md-3">
                      <button type="submit" name="searchSubmit" class="btn btn-primary">Click to Search</button>
                     <!-- <input type="submit" name="searchSubmit" class="btn btn-success" value="Search"> -->
                    </div>
                  
                  </div>
            </form>


  <?php
 /***************************************
       Search Operation Start
***************************************/
   if (isset($_POST['searchSubmit'])) {
    $sqlSearch = "SELECT adddriver_tbl.id,adddriver_tbl.driver_name,adddriver_tbl.driver_id,adddriver_tbl.driver_ride,adddriver_tbl.driver_number,addbus_tbl.bus_name,addbus_tbl.bus_id,addbus_tbl.bus_type from adddriver_tbl join addbus_tbl on addbus_tbl.id=adddriver_tbl.driver_ride WHERE driver_id LIKE '%$_POST[search]%' OR
            driver_name LIKE '%$_POST[search]%' OR
            bus_name LIKE '%$_POST[search]%' OR
            bus_id LIKE '%$_POST[search]%' OR
            driver_number LIKE '%$_POST[search]%'";

    $rsSearch = mysqli_query($connect,$sqlSearch);
    $countSearch = mysqli_num_rows($rsSearch);

    if ($countSearch>0) {
  ?>
  <caption> <span>Your Searching result for keyword <u style="color: red">"<?php echo $_POST['search']?>"</u> is "<?php echo $countSearch ;?>" times here. </span> </caption>
     <table class="table table-hover table-light" style="background: yellow">
                        <thead>
                          <tr>
                            <th class="hideInSmall">Sl.</th>
                            <th>Name</th>
                            <th>Id</th>
                            <th>Vehicle Rides</th>
                            <th>Vehicle id</th>
                            <th>Phone no</th>
                            <th>Action</th>
                          </tr>
                        </thead>


  <?php
    $j=0;
      while ($rowSearch = mysqli_fetch_array($rsSearch)) {
        $j++;
  ?>

      <tbody>          
         <tr style="text-align: center;">
            <th class="hideInSmall" scope="row"><?php echo $j;?></th>
            
            <td><?php echo $rowSearch['driver_name'];?> </td>
            <td><?php echo $rowSearch['driver_id'];?></td>
            <td><?php echo $rowSearch['bus_name']." ".($rowSearch['bus_type']);?></td>
            <td><?php echo $rowSearch['bus_id'];?></td>
            <td><?php echo $rowSearch['driver_number'];?></td>

            <td> <a href="allusers.php?editId=<?php echo $rowSearch['id'];?>" onclick="return confirm('Are you want to block?');" >Edit</a> | <a href="allusers.php?delete_id=<?php echo $rowSearch['id'];?>" onclick="return confirm('Are you want to delete ?');" >Delete</a></td>
        </tr>

       </tbody> 
  <?php
        //echo $row['name']."<br>";
      }
    echo "</table>";
    }

    else{
  ?>
      <span align="center" style="color: brown;">Sorry!Your Searching result for keyword <u style="color: red">"<?php echo $_POST['search']?>"</u> is not found here. Try Another keywords.</span>
  <?php
    }
  }


?>

<!-- Search Option Operation Finish-->
 

         <?php
                if(isset($_REQUEST['edited'])){
                echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
              }
              if(isset($_REQUEST['deleted'])){
                echo '<b style="color:red">'.$_REQUEST['deleted'].'</b>';
              }
              if(isset($_REQUEST['error_done'])){
                echo '<b style="color:red">'.$_REQUEST['error_done'].'</b>';
              }


          ?>


            <div class="row">
                <div class="col">
                    <table class="table table-hover table-light">
                        <thead>
                          <tr>
                            <th class="hideInSmall">Sl.</th>
                            <th>Name</th>
                            <th>Id</th>
                            <th>Vehicle Rides</th>
                            <th>Vehicle id</th>
                            <th>Phone no</th>
                            <th>Action</th>
                          </tr>
                        </thead>


        <?php
          if (isset($_COOKIE['currentUser'])) {
            //$currentUserTarget = $_COOKIE['currentUser'];

            //$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $query = "SELECT adddriver_tbl.id,adddriver_tbl.driver_name,adddriver_tbl.driver_id,adddriver_tbl.driver_ride,adddriver_tbl.driver_number,addbus_tbl.bus_name,addbus_tbl.bus_id,addbus_tbl.bus_type from adddriver_tbl join addbus_tbl on addbus_tbl.id=adddriver_tbl.driver_ride";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>


              <tbody>
                    <tr>
                        <th class="hideInSmall" scope="row"><?php echo $i; $i++?></th>
                      
                      <td> <?php echo $data['driver_name'];?> </td>
                      <td> <?php echo $data['driver_id'];?> </td>

                        <td><?php echo $data['bus_name']?>(<?php echo $data['bus_type'];?>)</td>

                        <td> <?php echo $data['bus_id'];?> </td>
                      <td> <?php echo $data['driver_number'];?> </td>

                       <td> <a href="edit_driver.php?edit_id=<?php echo $data['id'];?>">Edit</a> | <a onclick="return confirm('Are you sure?');" href="deletedata_driver_core.php?id=<?php echo $data['id']?>">Delete</a> </td>

                    </tr>

                 </tbody>

    <?php }   } }  ?>
 
                       
                      </table>
                </div>
            </div>
            
            
        </div>
    </section>






<script>

function showPostDropDown()
{
  document.getElementById("post_dropdown_div").style.display='block';
}
function hidePostDropDown()
{
  document.getElementById("post_dropdown_div").style.display='none';
}


function showVehicleDropDown()
{
  document.getElementById("vehicle_dropdown_div").style.display='block';
}
function hideVehicleDropDown()
{
  document.getElementById("vehicle_dropdown_div").style.display='none';
}

function showDriverDropDown()
{
  document.getElementById("driver_dropdown_div").style.display='block';
}
function hideDriverDropDown()
{
  document.getElementById("driver_dropdown_div").style.display='none';
}

</script>



<!--Link-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/main.js"></script>


<!--counter link-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });
</script>

<!--*****************************************************-->


<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>


</script>
</body>
</html>
