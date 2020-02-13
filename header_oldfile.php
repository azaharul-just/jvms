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
<html>
<head>
	<title>Login System</title>


	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<!-- Jquery add -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"></script>
	<link rel="stylesheet" type="text/css" href="style.css">


	<style>

	  body{
		  background: #F7F7F7;

	  }
	  #profile_name a{
		  color: #fff;
	  }

	  #wrapper{

	  }
	  #content{
		  min-height: 650px;
	  }
	  input[type="submit"]:hover{
			background: #2B3B4B;
		}

		#vcImg{
			width: 130px;
			height: 130px;
			border-radius: 10px;
		}
		.message{
		position: relative;
		}

		 h4{
			position: relative;
			
		}
		h4::after{
			content: '';
			position: absolute;
			top: 48px;
			left: 0px;
			width: 10%;
			height: 3px;
			background: black;

			animation: line_anim_one 4s linear infinite;
		}
		h4::before{
			content: '';
			position: absolute;
			top: 55px;
			left: 0px;
			width: 10%;
			height: 2px;
			background: black;

			animation: line_anim_two 4s linear infinite;
		}

		@keyframes line_anim_one {
  			0% {
				width: 2%;
				margin-left: 90px;
				}
				50% {
					width: 20%;
					margin-left: 10px;
				}
				100% {
					width: 2%;
				margin-left: 90px;
				}
		}
		@keyframes line_anim_two {
  			0% {
				width: 20%;
					margin-left: 10px;
				}
				50% {
					width: 2%;
				margin-left: 90px;
				}
				100% {
					width: 20%;
					margin-left: 10px;
				}
		}

	</style>

</head>

<body style="background: #ddd">
	  <div id="wrapper"  style="border: none; width: 80%;">
		<div  id="header" style="margin-top:0px;color:#fff;background: rgb(43, 59, 75);">
			<div  id="top-head" style="padding-bottom: 10px; ">
	  		<img src="just2.png" alt="just logo here" style="position: absolute;top: 1%;left: 20%;width: 100px;height: 100px;border-radius: 50%;">
			<h1 class="text-light" style="position: relative;">JUST VEHICLE MANAGEMENT SYSTEM</h1>
			<h3 class="text-light">JASHORE UNIVERSITY OF SCIENCE AND TECHNOLOGY</h3>
			</div>
		</div>


		<div>

			<nav class="navbar navbar-expand-lg navbar-light text-center " style="background: #2B3B4B">
				<div style="float: left;">

				<ul class="navbar-nav">
					<li class="nav-item active" style="hover:green;"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="index.php">Home</a></li>
					<li class="nav-item active" style="hover:green;"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="notice_posts.php">Notice</a></li>




			<?php

				if (isset($_COOKIE['currentUser'])) {

					$currentAuth = $_COOKIE['currentUser'];

					$checkDBAuth = "SELECT * FROM users WHERE auth='$currentAuth'";
					$run_checkDBAuth = mysqli_query($connect,$checkDBAuth);

					while ($check = mysqli_fetch_array($run_checkDBAuth)) {

						if ($check['type']=='Super_Admin') { ?>

						<li class="nav-item"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="allusers.php">All Users</a></li>

						 <li class="nav-item"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="requisition_request.php">All Requests</a></li>

						 	 <li class="nav-item"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="forward_request.php">Forward Requests</a></li>
						<li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_form.php">Requistion Form</a>';?></li>

							 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_result.php">Notifications</a>';?></li>
							 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="mycost.php">MyCost</a>';?></li>

						 <li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Post
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="add_post.php">Add Post</a>
					          <a class="dropdown-item" href="post_manages.php">Post Manages</a>
					        </div>
					      </li>


						<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Vehicle
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="add_bus.php">Add Vehicle</a>
					          <a class="dropdown-item" href="bus_manages.php">Vehicle Manages</a>
					        
					        </div>
					      </li>

					      	<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Drivers
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="add_driver.php">Add Driver</a>
					          <a class="dropdown-item" href="driver_manages.php">Drivers Manages</a>

					        </div>
					      </li>




						<?php }elseif($check['type']=='Sub_Admin'){ ?>

              <!-- <li class="nav-item"><a class="nav-link" style="color:#ddd;margin:4px;padding:3px;" href="allusers.php">All Users</a></li> -->

              <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_form.php">Requistion Form</a>';?></li>

			 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_result.php">Notifications</a>';?></li>
			 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="mycost.php">MyCost</a>';?></li>

               <li class="nav-item"><a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="requisition_request.php">Requistion Request</a></li>

               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Post
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="add_post.php">Add Post</a>
                      <a class="dropdown-item" href="post_manages.php">Post Manages</a>
                    </div>
                  </li>


              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Vehicle
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="add_bus.php">Add Vehicle</a>
                      <a class="dropdown-item" href="bus_manages.php">Vehicle Manages</a>
                    </div>
                  </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color:#fff;margin:4px;padding:3px;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Drivers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="add_driver.php">Add Driver</a>
                      <a class="dropdown-item" href="driver_manages.php">Drivers Manages</a>

                    </div>
                  </li>



						<?php }elseif($check['type']=='Teacher'){?>
							 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_form.php">Requistion Form</a>';?></li>

							 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="requisition_result.php">Notifications</a>';?></li>
							 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;" href="mycost.php">MyCost</a>';?></li>

						<?php } ?>

						<li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="logout_core.php?logout">Logout</a>';?></li>



				</ul>
				 </div>

				<div style=" ">

				 	<?php

				 		$avatarimg = $check['avatar'];
				 		if ($check['type']=='Super_Admin') { ?>
				 			<div style="margin-left: 80px;">
				 				<?php
				 					  echo "<a style='color: #fff' href='super_admin_profile.php'><img width='40px' src='avatar/$avatarimg' alt='Pic'><br/>";
				 	    echo $check['fname']." ".$check['lname']."</a>";
				 				?>
				 			</div>

				 	 <?php  }elseif($check['type']=='Sub_Admin'){	?>
				 	   	<div style="margin-left: 200px; ">
				 				<?php
				 					  echo "<a style='color: #fff' id='profile_name' href='sub_admin_profile.php'><img width='40px' src='avatar/$avatarimg' alt='Pic'><br/>";
				 	    echo $check['fname']." ".$check['lname']."</a>";
				 				?>
				 			</div>


				 	  <?php }elseif($check['type']=='Teacher'){	?>
				 	   	<div style="margin-left: 540px; ">
				 				<?php
				 					  echo "<a style='color: #fff' href='teacher_profile.php'><img  width='40px' src='avatar/$avatarimg' alt='Pic'><br/>";
				 	    echo $check['fname']." ".$check['lname']."</a>";
				 				?>
				 			</div>

				 	   <?php }

				 	 ?>
				</div>
						<?php }

				}
				else{ ?>
					 <li class="nav-item"><?php echo '<a class="nav-link" style="color:#fff;margin:4px;padding:3px;" href="login.php">Login</a>';?></li>

				<?php }

			?>
			</nav>



		</div>
