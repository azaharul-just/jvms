
<?php 

if (isset($_COOKIE['currentUser'])) {
	
	header("location: profile.php");
}


?>


<?php require_once("header.php")?>

		<div id="content"> 
			 
			 
				<a href="login.php" class="btn btn-info"> Go Back </a>
					
		<center>
					<h1>New Password Form </h1>
					<hr>
				 
			 	
					<?php 

						 if(isset($_REQUEST['not_pwdmatch'])){
							echo '<b style="color:red">'.$_REQUEST['not_pwdmatch'].'</b>';
						}



						?>

						<?php 
						if(isset($_GET['id']))
							{
								$id=$_GET['id'];
							} 

						?>


				<form action="forgot_new_pwd_core.php?id=<?php echo $id; ?>" method="POST" style="width: 60%;background: #fff">
				 	 
					 
					<input type="password" name="password" required="1" class="form-control" style="width: 80%" placeholder="New password"><br>
				 
					<input type="password" name="cpassword" required="1" class="form-control" style="width: 80%" placeholder="Confirm password"><br>
				 
					<input type="submit" name="resetpwd" class="form-control btn btn-primary" style="width: 80%" value="Change Password"><br> 
 
				</form>
				<br>

				
 			</center>
			 
			  
		</div>


 