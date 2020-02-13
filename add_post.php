
 <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: index.php");
}


?>

 


<!-- Header Start -->

  <?php require_once("header.php")?>


<section id="Add_post_section">
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="title"> <i class="fa fa-pencil"></i> Create new post </h2>
                <hr>
                 <?php 
                    if(isset($_REQUEST['done_added'])){
                    echo '<b style="color:green">'.$_REQUEST['done_added'].'</b>';
                }

                ?>
        </div>
    </div> 
    <form action="add_post_core.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="from-group">
                    <label for="title" class="font-weight-bold">Post title</label>
                    <input type="text" name="title" class="form-control" required="1" placeholder="Post title here">
                </div>
                <div class="from-group">
                    <label for="title" class="font-weight-bold">Post picture</label>
                    <input type="file" class="form-control" name="pic" required="1">
                </div>
                <div class="from-group">
                    <label for="title" class="font-weight-bold">Post description</label>
                    <textarea name="description" rows="3" cols="5" required="1" class="form-control"  placeholder="Description "></textarea> 
                </div>
                <input type="submit" class="form-control bg-primary text-light mt-2" name="add_submit" value="Add post">
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
