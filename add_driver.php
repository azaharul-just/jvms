  <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: index.php");
}


?>

  
<?php require_once("header.php");?>
        

    <section id="Manage_vehicle_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-user mx-2" aria-hidden="true"></i>Add Driver </h2>
                     <hr>
                    <?php 
                        if(isset($_REQUEST['error_done'])){
                        echo '<b style="color:red">'.$_REQUEST['error_done'].'</b>';
                      }
                        if(isset($_REQUEST['done_added'])){
                        echo '<b style="color:green">'.$_REQUEST['done_added'].'</b>';
                      }
                       

                      ?>
                </div>
            </div>

            <form action="add_driver_core.php" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="from-group">
                            <label for="Driver id" class="font-weight-bold">Driver id</label>
                            <input type="text" name="driver_id" required="1" class="form-control" placeholder="Driver Id">
                        </div>
                        <div class="from-group">
                            <label for="title" class="font-weight-bold">Driver Name </label>
                            <input type="text" name="driver_name" required="1" class="form-control" placeholder="Driver Name"  >
                        </div>
                        <div class="from-group">
                            <label for="title" class="font-weight-bold">Select Vehicle </label>
                            <select name="driver_ride" class="form-control" id="default" style="width:80%;" required="required">
                                <option value="-1">Select One </option>
                            <?php 

                                $query = "SELECT * FROM addbus_tbl";
                                $run_query = mysqli_query($connect,$query);

                                if ($run_query==true) {
                                    while($data = mysqli_fetch_array($run_query)){
                                    if($data['status']=='Active'){ ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['bus_name']; ?>&nbsp; (<?php echo $data['bus_type']; ?>) &nbsp; <p style="color: red;">(<?php echo $data["bus_id"]; ?>) </p> </option>
                            <?php }}} ?>
                                
                         </select>  
                        </div>
                        <div class="from-group">
                            <label for="phone no" class="font-weight-bold">Phone no</label>
                            <input type="text" name="driver_number" class="form-control" placeholder="Mobile" required="1"  >
                        </div>
                        <div class="from-group">
                            <label for="Email" class="font-weight-bold">Email</label>
                            <input type="email" name="driver_email" class="form-control" placeholder="Email (Optional)">
                        </div>

                        <input type="submit" name="add_submit" class="form-control btn btn-primary my-2" value="Add Driver">
                    </div>
                </div> 
                
            </form>
            
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
