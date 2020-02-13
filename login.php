 <?php 

if (isset($_COOKIE['currentUser'])) {
    
    header("location: requisition_result.php");
}


?> 
<?php require_once("header.php");?>


<section id="Login_section">
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h2  class="text-center"> <i class="fa fa-lock"></i> Login Form</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="login_box">

             <!-- Autherntication Checking -->      
                 <?php
                            if (isset($_REQUEST['done_signup'])) {
                              echo '<span style="color:green;">'.$_REQUEST['done_signup'].'</span>';
                            }
                  ?>


                  <?php
                      if(isset($_REQUEST['wrong_info'])){
                        echo '<b style="color:red;">Wrong Username or Password!</b>';
                        }
                      if(isset($_REQUEST['wrong_info_active'])){
                        echo '<b style="color:red;">Please verify your email before login!</b>';
                      }
                    ?>
                  <!-- Form Start -->

                <form action="login_core.php" method="POST">
                    <br>
                       <input type="email" name="username" class="form-control" required="1" placeholder="Email">
       
                       <input type="password" name="password" class="form-control" required="1" placeholder="password">
                        <input type="submit" name="loginButton"  class="form-control btn btn-dark" value="Login">
                        <br><br>           
                        <a style="float: right;" href="forgot_pwd.php">Forgot Password?</a>
    
                       <p>Don't have Account? <a href="signup.php" class="btn btn-primary">Sign Up</a> </p>
                       
                   </form>
            </div>
            
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
