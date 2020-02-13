 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

 <?php 

require_once("config.php");


$bus_id = htmlentities($_REQUEST['bus_id']);
$bus_name = htmlentities($_REQUEST['bus_name']);
$bus_type = htmlentities($_REQUEST['bus_type']);
 
$check = "SELECT * FROM addbus_tbl WHERE bus_id='$bus_id'";
$run_check = mysqli_query($connect,$check);

$check_rows = mysqli_num_rows($run_check);

if ($check_rows > 0) {
	header("location: add_bus.php?error_done= Sorry! The Vehicle ID or type already exit!");
}else{

	$insertSignupData = "INSERT INTO addbus_tbl(bus_id,bus_name,bus_type) VALUES('$bus_id','$bus_name','$bus_type')";

	$run_matchQuery = mysqli_query($connect,$insertSignupData);

	if ($run_matchQuery==true) {
		header("location: add_bus.php?done_added=The Vehicle is added Successfull!");

	}

}







 





 
?>