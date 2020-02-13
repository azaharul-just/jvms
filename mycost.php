 
 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>



 <!-- Header Start -->

  <?php require_once("header.php")?>
  <?php require_once("config.php");?>



<section id="Mycost_section">
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="title"> <i class="fa fa-money"></i> Requisition cost </h2>
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


                     $costselect = "SELECT * FROM cost_tbl WHERE user_id='$user_id' ";
                     $run_costselect = mysqli_query($connect,$costselect);
                     if ($run_costselect==true) {
                        $cost = 0;
                        while ($getCost = mysqli_fetch_array($run_costselect)) {
                        $cost += $getCost['cost'];
                       }
                     }
                     echo "<h3>Your Total Cost : <span style='color:red;'> ".$cost."</span>Tk</h3>";  
           }

            ?>
 
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
