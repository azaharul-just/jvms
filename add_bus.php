  <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: index.php");
}


?>
 
<!-- Header Start -->

  <?php require_once("header.php")?>



    <section id="Add_vehicle_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-pencil"></i> Add new vehicle </h2>
                    <hr>
                    <?php 
                        if(isset($_REQUEST['done_added'])){
                        echo '<b style="color:green">'.$_REQUEST['done_added'].'</b>';
                      }
                      if(isset($_REQUEST['error_done'])){
                        echo '<b style="color:red">'.$_REQUEST['error_done'].'</b>';
                      }

                      ?>
                </div>
            </div> 
            <form action="add_bus_core.php" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="from-group">
                            <label for="Vehicle id" class="font-weight-bold">Vehicle id</label>
                            <input type="text" name="bus_id" class="form-control" required="1" placeholder="Vehicle Id">
                        </div>
                        <div class="from-group">
                            <label for="title" class="font-weight-bold">Vehicle name</label>
                            <input type="text" name="bus_name" required="1" class="form-control" placeholder="Vehicle Name">
                        </div>
                        <div class="from-group">
                            <label for="title" class="font-weight-bold">Select vehicle type</label>
                            <select name="bus_type" class="form-control" required="1"> 
                                <option value="-1">Vehicle Type </option>
                                <option value="Ambulance">Ambulance</option> 
                                <option value="Micro-Bus">Micro-Bus</option>
                                <option value="Pick-Up">Pick-Up</option> 
                                <option value="AC-Minibus">AC-Minibus</option>
                                <option value="Non-AC Minibus">Non-AC Minibus</option> 
                                <option value="Single Deck Bus">Single Deck Bus</option>
                                <option value="Double Deck Bus">Double Deck Bus</option> 
                                 
        
                            </select>  
                        </div>
                        <input type="submit" name="add_submit" class="form-control btn btn-primary my-3" value="Add Vehicle">
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
