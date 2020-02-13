<?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>


 <!-- Header Start -->

  <?php require_once("header.php")?>

 
<section id="Profile_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title"> <i class="fa fa-user"></i> Welcome!  
                  <?php 
                    if (isset($_COOKIE['currentUser'])) {
                      $currentUserTarget = $_COOKIE['currentUser'];

                      $query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
                      $run_query = mysqli_query($connect,$query);

                      if ($run_query==true) {
                        while($getRow = mysqli_fetch_array($run_query)){
                          echo $getRow['fname']." ".$getRow['lname'];
                          echo "</h2>";

                          $avatarimg = $getRow['avatar'];
                          echo "<img width='80px' src='avatar/$avatarimg' alt='tttttttttt'>";

                        }
                      }


                    }

                  ?>
            </div>
        </div>
       <!--  <div class="row">
            <div class="col">
                <img src="avatar/avatar.png" alt="img not found">
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-6">
                <a href="update_profile.php" class="btn btn-primary">Updata profile</a>
            </div>
            <div class="col-md-6">
                <a href="changepwd.php" class="btn btn-success">Change password</a>
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
