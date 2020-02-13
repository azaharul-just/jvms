 <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: login.php");
}


?> 
<?php require_once("header.php");?>
  
    <section id="Requisition_form">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center"> <i class="fa fa-pencil"></i> Requisition Form </h2>
                    <hr>
                </div>
            </div>

                <?php 
                    if(isset($_REQUEST['done_request'])){
                    echo '<b style="color:green">'.$_REQUEST['done_request'].'</b>';
                }

                ?>
               

            <form action="requisition_form_core.php" method="POST">
            <div class="row mt-3">
                <div class="col-md-4">
                    
                    <div class="form-group">
                        <label class="font-weight-bold" for="Vehicle Type">Vehicle Type</label>
                        <select name="bus_type" required="1" class="form-control"> 
                            <option value="">Select One </option>
                            <option value="Micro-Bus">Micro-Bus</option>
                            <option value="Pick-Up">Pick-Up</option> 
                            <option value="AC-Minibus">AC-Minibus</option>
                            <option value="Non-AC Minibus">Non-AC Minibus</option> 
                            <option value="Single Deck Bus">Single Deck Bus</option>
                            <option value="Double Deck Bus">Double Deck Bus</option>  
                            <option value="Ambulance">Ambulance</option>
                        </select> 
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="font-weight-bold" for="Journey Date ">Journey Date </label>
                            <input type="date" name="date" class="form-control" required="1" min="2020-02-10"  > 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="font-weight-bold" for="Destination ">Destination </label>
                            <input type="text" name="destination" class="form-control" required="1" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                    
                            <div class="form-group">
                                <label class="font-weight-bold" for="Vehicle Type">Deparature Time</label>
                                <select name="d_time" required="1" class="form-control">
                                    <option value="">Select Hour</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="d_min">Minute</label>
                                <select name="d_min" required="1" class="form-control">
                                    <option value="">Select Min</option>
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="d_ap">Select</label>
                                <select name="d_min" required="1" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                    
                            <div class="form-group">
                                <label class="font-weight-bold" for="Vehicle Type">Return Time</label>
                                <select name="r_time" required="1" class="form-control">
                                    <option value="">Select Hour</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="d_">Minute</label>
                                <select name="r_min" required="1" class="form-control">
                                    <option value="">Select Min</option>
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="d_ap">Select</label>
                                <select name="r_ap" required="1" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold" for="Purpose Type">Purpose Type</label>
                        <select name="p_type" required="1" class="form-control">
                            <option value="">Select One</option>
                            <option value="Official">Official</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold" for="Purpose Details ">Purpose Details </label>
                        <textarea placeholder="Purpose" name="purpose" required="1" class="form-control" rows="2" cols="30"  ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" name="submit" class="form-control btn btn-info" value="Confirm">
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
