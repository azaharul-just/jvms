 <!-- Header Start -->

  <?php require_once("header.php")?>



    <section id="Post_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center"> <i class="fa fa-share" aria-hidden="true"></i>  Recent post</h2>
                    <hr> 
                </div>

            </div>
            <div class="row">
              <div class="col">
              <!--   <h3>Title: title write here...........</h3>
                <p>Date: 22/01/2020 Time: 9.44 pm  </p> -->

                      <?php 


          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          }else{
            $page = 1;
          }

          $num_per_rows = 01;
          $start_from = ($page-1)*01;


            $query = "SELECT * FROM post_tbl ORDER BY id DESC LIMIT $start_from,$num_per_rows";
            $run_query = mysqli_query($connect,$query);                  

            if ($run_query==true) {
            $i =$start_from;
            while($data = mysqli_fetch_array($run_query)){ ?>
               
             <h3><?php echo $i+1;echo ".";?> <b>Title :</b> <?php echo $data['title'];?> </h3>
             &nbsp;  &nbsp; &nbsp; &nbsp;  <span style="color: green;"> <?php echo $data['updated_time'];?></span> <br><br>

 

              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="post_box">
                 <!--  <img src="img/post.PNG" alt="not found"> -->

             <img src="<?php echo $data['picName'];?>" alt='Pic'> >
             <p style="text-align: justify;"> <b>Description :</b> <?php echo $data['description'];?></p>
             <hr>
            
          <?php  $i++; } }?>


                </div>
              </div>
            </div>



           <!--  <a href="" class='btn btn-info'>1</a> -->
          <div class="row text-center">
                <div class="col">
                 <?php

                  $pre_query = "SELECT * FROM post_tbl ORDER BY id DESC";
                  $run_query = mysqli_query($connect,$pre_query);

                  $count_row = mysqli_num_rows($run_query);
                  $number_of_pages = ceil($count_row/$num_per_rows);

                  if ($page>1) {
                    echo "<a href='notice_posts.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                  }

                  for ($i=1; $i <$number_of_pages ; $i++) {
                    echo "<a href='notice_posts.php?page=".$i."' class='btn btn-info'>$i</a>";
                  }

                  if ($i>$page) {
                    echo "<a href='notice_posts.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
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
