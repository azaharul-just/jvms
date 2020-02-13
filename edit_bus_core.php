<?php 
require_once("config.php");

if (isset($_REQUEST["updateButton"])) {
	$bus_id = $_REQUEST["bus_id"];
	$bus_name = $_REQUEST["bus_name"];
	$bus_type = $_REQUEST["bus_type"];
 
    $editingID = $_REQUEST["editingID"];


    $check = "SELECT * FROM addbus_tbl WHERE bus_id='$bus_id'";
	$run_check = mysqli_query($connect,$check);

	$check_rows = mysqli_num_rows($run_check);

	if ($check_rows > 0) {
		header("location: bus_manages.php?error_done= Sorry,not updated! The Vehicle ID already exit!");
	}else{

		$upquery = "UPDATE addbus_tbl SET bus_id='$bus_id',bus_name='$bus_name',bus_type='$bus_type' WHERE id=$editingID";
		$runquery = mysqli_query($connect,$upquery);

		if ($runquery==true) {
			 
			header("location: bus_manages.php?edited=The vechile updated Successfylly.");
		}
	}
 
}



?>