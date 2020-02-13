<?php 
require_once("config.php");

if (isset($_REQUEST["updateButton"])) {
 

	$driver_id = $_REQUEST["driver_id"];
	$driver_name = $_REQUEST["driver_name"];
	$driver_ride = $_REQUEST["driver_ride"];
	$driver_number = $_REQUEST["driver_number"];
	$driver_email = $_REQUEST["driver_email"];
	 
 
    $editingID = $_REQUEST["editingID"];
	 

$check = "SELECT * FROM adddriver_tbl WHERE driver_id='$driver_id'";
$run_check = mysqli_query($connect,$check);

$check_rows = mysqli_num_rows($run_check);

if ($check_rows > 0) {
	header("location: driver_manages.php?error_done= Sorry,not update! The Driver ID  already exit!");
}else{
	$upquery = "UPDATE adddriver_tbl SET driver_id='$driver_id',driver_name='$driver_name',driver_ride='$driver_ride',driver_number='$driver_number',driver_email='$driver_email' WHERE id=$editingID";
	$runquery = mysqli_query($connect,$upquery);

	if ($runquery==true) {
		 
		header("location: driver_manages.php?edited=The Driver info updated Successdfylly.");
	}
}



	
}



?>