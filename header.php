<?php
session_start();
require_once("config.php");

if (isset($_COOKIE['currentUser'])) {
	$currentAuth = $_COOKIE['currentUser'];

	$checkDBAuth = "SELECT * FROM users WHERE auth='$currentAuth'";
	$run_checkDBAuth = mysqli_query($connect,$checkDBAuth);

	if (mysqli_num_rows($run_checkDBAuth)===0) {
		setcookie("currentUser","",time()-(86400*7));

		header("location: login.php");
	}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- FONT AWESOME CDN LINK-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <!-- BOOTSTRAP LINK-->
  <link rel="stylesheet" href="css/bootstrap.css"> 
  <!-- CSS LINK-->
  <link rel="stylesheet" href="scss/style.css">
  
 <title> just_vms </title>

</head>

<body  id="body"> 
    <!--First Section-->
    <section id="First_section"> 
      <div class="container"> 
        <div class="row">
          <div class="col-md-2">
            <div class="logo_box text-center ">
                <img src="img/just2.png" alt="logo">  
                <!-- <i class=" globe fa fa-globe"></i> --> 
            </div>
          </div>
          
          <div class="col-md-10 ">
           
              <h1 >JUST VEHICLE MANAGEMENT SYSTEM</h1>
              <h2 >JASHORE UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
            
          </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!--nav item-->
       <nav class="navbar navbar-expand-lg">
         
          <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNavbar">
              <span>
                <i class="text-light fa fa-bars"></i>
              </span>
          </button> 
          <div class="collapse navbar-collapse " id="myNavbar">
            <ul class="navbar-nav  first_nav_item ">
                <li class="nav-item"><a class="nav-link  text-light" href="index.php"> Home</a></li>
                <li class="nav-item"><a class="nav-link  text-light" href="notice_posts.php">Notice</a></li>
 

            <?php

              if (isset($_COOKIE['currentUser'])) {

                $currentAuth = $_COOKIE['currentUser'];

                $checkDBAuth = "SELECT * FROM users WHERE auth='$currentAuth'";
                $run_checkDBAuth = mysqli_query($connect,$checkDBAuth);

                while ($check = mysqli_fetch_array($run_checkDBAuth)) {

            if ($check['type']=='Super_Admin') { ?>

                <li class="nav-item"><a class="nav-link text-light" href="allusers.php">Users</a></li>
                <li class="nav-item sinsm"><a class="nav-link text-light" href="requisition_request.php">All request</a></li> 
                <li class="nav-item sinsm"><?php echo '<a class="nav-link text-light" href="allcosts.php">Costs</a>';?></li>
                <li class="nav-item"><a class="nav-link  text-light" href="forward_request.php">Forwarded</a></li>
                <li class="nav-item"><?php echo '<a class="nav-link text-light"  href="requisition_form.php">Requistion Form</a>';?></li>
                <li class="nav-item"><?php echo '<a class="nav-link text-light" href="requisition_result.php">Messages</a>';?></li>
                <li class="nav-item sinsm"><?php echo '<a class="nav-link text-light" href="mycost.php">MyCost</a>';?></li> 
                
                

                <li onmouseout="hidePostDropDown()" onmouseover="showPostDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Post</a> 
                
                  <div id="post_dropdown_div">
                    <a href="add_post.php">Create new post</a> 
                    <a href="post_manages.php">Manage all post</a>
                    
                  </div>
                  
                </li> 
                <li onmouseout="hideVehicleDropDown()" onmouseover="showVehicleDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Vehicle</a> 
                
                  <div id="vehicle_dropdown_div">
                    <a href="add_bus.php">Add new vehicle</a> 
                    <a href="bus_manages.php">Manage all vehicle</a>
                    
                  </div>
                  
                </li>
                <li onmouseout="hideDriverDropDown()" onmouseover="showDriverDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Driver</a> 
                
                  <div id="driver_dropdown_div">
                    <a href="add_driver.php">Add new Driver</a> 
                    <a href="driver_manages.php">Manage all Driver</a>
                    
                  </div>
                  
                </li>  
            <?php }elseif($check['type']=='Sub_Admin'){ ?> 

                <li class="nav-item sinsm"><a class="nav-link text-light" href="requisition_request.php">All request</a></li> 
               
                <li class="nav-item"><?php echo '<a class="nav-link text-light"  href="requisition_form.php">Requistion Form</a>';?></li>
                <li class="nav-item"><?php echo '<a class="nav-link text-light" href="requisition_result.php">Notifications</a>';?></li>
                <li class="nav-item sinsm"><?php echo '<a class="nav-link text-light" href="mycost.php">MyCost</a>';?></li> 
                

                <li onmouseout="hidePostDropDown()" onmouseover="showPostDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Post</a> 
                
                  <div id="post_dropdown_div">
                    <a href="add_post.php">Create new post</a> 
                    <a href="post_manages.php">Manage all post</a>
                    
                  </div>
                  
                </li> 
                <li onmouseout="hideVehicleDropDown()" onmouseover="showVehicleDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Vehicle</a> 
                
                  <div id="vehicle_dropdown_div">
                    <a href="add_bus.php">Add new vehicle</a> 
                    <a href="bus_manages.php">Manage all vehicle</a>
                    
                  </div>
                  
                </li>
                <li onmouseout="hideDriverDropDown()" onmouseover="showDriverDropDown()" class="nav-item"><a class="nav-link  text-light" href="JavaScript:Void(0);"> Driver</a> 
                
                  <div id="driver_dropdown_div">
                    <a href="add_driver.php">Add new Driver</a> 
                    <a href="driver_manages.php">Manage all Driver</a>
                    
                  </div>
                  
                </li>  

            <?php }elseif($check['type']=='Teacher'){?> 
                <li class="nav-item"><?php echo '<a class="nav-link text-light"  href="requisition_form.php">Requistion Form</a>';?></li>
                <li class="nav-item"><?php echo '<a class="nav-link text-light" href="requisition_result.php">Notifications</a>';?></li>
                <li class="nav-item sinsm"><?php echo '<a class="nav-link text-light" href="mycost.php">MyCost</a>';?></li> 
            

            <?php } ?>

            <li class="nav-item"><?php echo '<a class="nav-link text-light" href="logout_core.php?logout">Logout</a>';?></li>
             

             </ul> 
         </div>
  
        </nav>
            
        </div>
       
      </div> 

<!-- Name show -->
         <div class="row">
          <div class="col">
            <div class="user_profile">
              <?php

              
              if ($check['type']=='Super_Admin') { ?>    
              <a href="profile.php"> <i class="fa fa-user"></i><?php echo " ";  echo $check['fname']." "; echo $check['lname']; ?></a>

             <?php  }elseif($check['type']=='Sub_Admin'){ ?>
                 <a href="profile.php"> <i class="fa fa-user"></i> <?php echo " ";  echo $check['fname']." "; echo $check['lname']; ?></a>
              <?php }elseif($check['type']=='Teacher'){ ?>
                 <a href="profile.php"> <i class="fa fa-user"></i> <?php echo " ";  echo $check['fname']." "; echo $check['lname']; ?></a>
              

               <?php }

             ?> 
            <?php }

        }
        else{ ?>
           <li class="nav-item"><?php echo '<a class="nav-link text-light" href="login.php">Login</a>';?></li>

        <?php }

      ?> 
            </div>
          </div>
        </div>


       </div>
    </section>






