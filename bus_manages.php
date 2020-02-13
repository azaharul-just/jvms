  <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 
<?php require_once("header.php");?>


<?php
/*************************************************
        Active and Inactive action The User
**************************************************/
  if (isset($_GET['status_id'])) {
    $status_id = $_GET['status_id'];
    $sqlEdit = "SELECT * FROM addbus_tbl WHERE id='$status_id'";
    $rs = mysqli_query($connect,$sqlEdit);
    $row=mysqli_fetch_array($rs);

    if ($row['status']=='Active') {
      $st = 'Inactive';
    }
    else{
      $st = 'Active';
    }
    $sqlUpdate = "UPDATE addbus_tbl SET status='$st' WHERE id='$status_id'";
    mysqli_query($connect,$sqlUpdate);
  }



?>
 
    <section id="Manage_vehicle_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-bus" aria-hidden="true"></i>  Manage all vehicles</h2>

                    <hr>
                    <?php 
                        if(isset($_REQUEST['error_done'])){
                        echo '<b style="color:red">'.$_REQUEST['error_done'].'</b>';
                      }
                      if(isset($_REQUEST['status_id'])){
                        echo "<span style='color:blue'>Your operation successfull</span>";
                      }
                      if(isset($_REQUEST['deleted'])){
                        echo '<b style="color:red">'.$_REQUEST['deleted'].'</b>';
                      }

                      ?>
                </div>
            </div>
           
            <div class="row">
                <div class="col">
 
                    <table class="table text-center">
                        <tr class="table_head">
                            <th class="hideInSmall">Sl</th>
                            <th >Vehicle name</th>
                            <th >Vehicle id</th>
                            <th >Vehicle type</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>





        <?php 
          if (isset($_COOKIE['currentUser'])) {
            //$currentUserTarget = $_COOKIE['currentUser'];

            //$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $query = "SELECT * FROM addbus_tbl";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>
               

              <tr>
                      <td> <?php echo $i;$i++;?> </td>
                      <td> <?php echo $data['bus_name'];?> </td>
                      <td> <?php echo $data['bus_id'];?> </td>
                      <td> <?php echo $data['bus_type'];?> </td>
                    <td><a href="bus_manages.php?status_id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure?');"><?php echo $data['status'];?></a>  </td>
                       <td> <a href="edit_bus.php?edit_id=<?php echo $data['id'];?>">Edit</a> | <a onclick="return confirm('Are you sure?');" href="deletedata_bus_core.php?id=<?php echo $data['id']?>">Delete</a> </td> 
                       
                    </tr>

 

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
