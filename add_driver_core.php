 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

 <?php 

require_once("config.php");


$driver_id = htmlentities($_REQUEST['driver_id']);
$driver_name = htmlentities($_REQUEST['driver_name']);
$driver_ride = htmlentities($_REQUEST['driver_ride']); 
$driver_number = htmlentities($_REQUEST['driver_number']);
$driver_email = htmlentities($_REQUEST['driver_email']);
 


$check = "SELECT * FROM adddriver_tbl WHERE driver_id='$driver_id' OR driver_number='$driver_number'";
$run_check = mysqli_query($connect,$check);

$check_rows = mysqli_num_rows($run_check);

if ($check_rows > 0) {
	header("location: add_driver.php?error_done= Sorry! The Driver ID or mobile already exit!");
}else{
	$insertData = "INSERT INTO adddriver_tbl(driver_id,driver_name,driver_ride,driver_number,driver_email) VALUES('$driver_id','$driver_name','$driver_ride','$driver_number','$driver_email')";

		$run_matchQuery = mysqli_query($connect,$insertData);

		if ($run_matchQuery==true) {
			header("location: add_driver.php?done_added=The driver is added Successfully!");

		}

}


  



 
?>