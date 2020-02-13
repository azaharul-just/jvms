 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

 
	
	<?php require_once("header.php");?>

		<center>
			<div id="content">
			<h2 style="color: green">Welcome, 
				<?php 
					if (isset($_COOKIE['currentUser'])) {
						$currentUserTarget = $_COOKIE['currentUser'];

						$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
						$run_query = mysqli_query($connect,$query);

						if ($run_query==true) {
							while($getRow = mysqli_fetch_array($run_query)){
								echo $getRow['fname']." ".$getRow['lname']."!";
								echo "</h2><hr>";

								$avatarimg = $getRow['avatar'];
								echo "<img width='80px' src='avatar/$avatarimg' alt='tttttttttt'>";

							}
						}


					}

				?>
					 <br><br>
			<a href="update_profile.php" class="btn btn-primary">Update Profile</a>   <a href="changepwd.php" class="btn btn-success">Change Password</a>

		</div>

		</center>
		


	<?php require_once("footer.php");?>
 