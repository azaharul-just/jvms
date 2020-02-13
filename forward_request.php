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
                <h2 class="title"> <i class="fa fa-arrow-down"></i> Forward request list</h2>
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
                      <th class="hideInSmall" >Sl</th>
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
            $query = "SELECT * FROM rq_tbl WHERE confirm_vehicle=''";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>
               

              <tr>
                      <td class="hideInSmall"> <?php echo $i;$i++;?> </td>
                      <td > <?php echo $data['fname'];?> </td>
                      <td > <?php echo $data['lname'];?> </td>
                      <td > <?php echo $data['dept_section'];?> </td>
                      <td > <?php echo $data['bus_type'];?> </td>
                      
                      <td > <?php echo $data['p_type'];?> </td>
                      



                      <td >
                       <?php

                        if ($data['confirm_vehicle'] == 0) {
                          echo "<span style='color:blue'>Pending</span>";
                        } elseif($data['confirm_vehicle']<0){
                          echo "<span style='color:red'>Cancled</span>";
                        }else{
                          echo "<span style='color:green'>Accepted</span>";
                        }
                        

                      ?>
                      </td>




                       <td> <a href="r.php?view_id=<?php echo $data['id'];?>" class="btn btn-primary">View</a> <!-- | <a onclick="return confirm('Are you sure?');" href="deletedata_core.php?id=<?php echo $data['id']?>">Cancel</a>  --></td>
                       
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
