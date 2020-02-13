 <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: login.php");
}


?> 
<?php require_once("header.php");?>


<section id="Update_profile_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title"> <i class="fa fa-lock"></i> Change password </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="profile.php" class="btn btn-info"> Go Back </a>
            </div>
        </div>

            <?php 
                    if(isset($_REQUEST['changed_pwd'])){
                    echo '<b style="color:green">'.$_REQUEST['changed_pwd'].'</b>';
                }elseif(isset($_REQUEST['pwdmatch'])){
                    echo '<b style="color:green">'.$_REQUEST['pwdmatch'].'</b>';
                }
                elseif(isset($_REQUEST['not_pwdmatch'])){
                    echo '<b style="color:red">'.$_REQUEST['not_pwdmatch'].'</b>';
                }

                ?>


        <form action="changepwd_core.php" method="POST">
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold">Old password</label>
                        <input type="password" name="oldpwd" class="form-control" placeholder="Old password">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">New password</label>
                        <input type="password" name="newpwd" class="form-control" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Confirm password</label>
                        <input type="password" name="cfmpwd" class="form-control" placeholder="Confirm password">
                    </div> 
                    <input type="submit" name="changepwdBtn" class="form-control btn btn-primary" value="Change Password"><br> 
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
