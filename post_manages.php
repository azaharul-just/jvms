 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 
  <?php require_once("header.php");?> 



<section id="Manage_post_section">
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="title"> <i class="fa fa-exchange" aria-hidden="true"></i>  Manage all post</h2>
            <hr>
         <?php 
                if(isset($_REQUEST['edited'])){
                echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
             
              }

              ?>

          <?php 
          if(isset($_REQUEST['deleted'])){
          echo '<b style="color:green">'.$_REQUEST['deleted'].'</b>';
        }

        ?> 
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <table class="table text-center">
                <tr class="table_head">
                    <th class="hideInSmall">Sl</th>
                    <th >Title</th>
                    <th >Pic</th>
                    <th>Description</th>
                    <th >Created</th>

                   <!--  <th >Updated</th> -->
                    <th >Action</th>
                </tr>


 


       <?php
          if (isset($_COOKIE['currentUser'])) {
            //$currentUserTarget = $_COOKIE['currentUser'];

            //pagination modify
            if (isset($_GET['post_page'])) {
              $page = $_GET['post_page'];
            }
            else{
              $page=1;
            }

            $num_per_page = 05;
            $start_from = ($page-1)*05; // 0+1 = 1th first indext row



            //$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $query = "SELECT * FROM post_tbl ORDER BY id DESC LIMIT $start_from,$num_per_page";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = $start_from;
              $start = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>


              <tr style="text-align: justify;">
                      <td class="hideInSmall"  > <?php echo $i+$start;?> </td>
                      <td  > <?php echo $data['title'];?> </td>
                      <td  > <img width='60px' height='60px' src="<?php echo $data['picName'];?>" alt='Pic'> </td>
                      <td  > <?php echo $data['description'];?> </td>
                      <td  > <?php echo $data['created_time'];?> </td>

                   <!--  <?php
                      if(isset($_REQUEST['edited'])){?>
                     <td  > <?php echo $data['updated_time'];?> </td>
                      <?php  }else{?>
                        <td  > <?php echo $data['created_time'];?> </td>
                     <?php  }

                    ?> -->
                       <td  > <a href="edit_post.php?edit_id=<?php echo $data['id'];?>">Edit</a> &nbsp; <a onclick="return confirm('Are you sure?');" href="deletedata_core.php?id=<?php echo $data['id']?>">Delete</a> </td>

                    </tr>



    <?php $i++; }   } }  ?>

                 </table>

  <?php
        //Pagination Operation
          $pre_query = "SELECT * FROM post_tbl";
          $pre_result = mysqli_query($connect,$pre_query);
          $total_record = mysqli_num_rows($pre_result);
          $total_page = ceil($total_record/$num_per_page);

          if ($page>1) {
            echo "<a href='post_manages.php?post_page=".($page-1)."' class='btn btn-danger'>Previous</a>";
          }


          for ($b=1; $b <$total_page ; $b++) {
            echo "<a href='post_manages.php?post_page=".$b."' class='btn btn-primary'>$b</a>";
          }

          if ($b>$page) {
            echo "<a href='post_manages.php?post_page=".($page+1)."' class='btn btn-danger'>Next</a>";
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
