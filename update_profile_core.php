 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

<?php 
require_once("config.php");

if (isset($_REQUEST["updateButton"])) {
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$useremail = $_REQUEST["useremail"];
 
    //$editingID = $_REQUEST["editingID"];
    if (isset($_COOKIE['currentUser'])) {
			$currentUserTarget = $_COOKIE['currentUser'];

			$select_query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
			$select_query_runquery = mysqli_query($connect,$select_query);
			if ($select_query_runquery) {
				while ($data = mysqli_fetch_array($select_query_runquery)) {
					$user_password = $data['user_pwd'];
				}
			}
			 
	 		$createAuth = md5(sha1($user_password.$useremail));
			$upquery = "UPDATE users SET fname='$fname',lname='$lname',email_addr='$useremail',auth='$createAuth' WHERE auth='$currentUserTarget'";
			$runquery = mysqli_query($connect,$upquery);

			if ($runquery==true) {
				 
				header("location: update_profile.php?edited=The User info updated Successdfylly.");
				}
	}
}


?>



 


 
	
 

	 
				<?php 
					if (isset($_COOKIE['currentUser'])) {
						$currentUserTarget = $_COOKIE['currentUser'];

						$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
						$run_query = mysqli_query($connect,$query);

						if ($run_query==true) {
							while($getRow = mysqli_fetch_array($run_query)){?>
						 

				 



						<?php	}}}	?>
					
			 
 
		 
		 
 

 
 