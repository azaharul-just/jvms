<?php 
require_once("config.php");

if (isset($_REQUEST["editButton"])) {
	$title = $_REQUEST["title"];
	$description = $_REQUEST["description"];
 
    $editingID = $_REQUEST["editingID"];
	 
	$upquery = "UPDATE post_tbl SET title='$title',description='$description',updated_time=now() WHERE id=$editingID";
	$runquery = mysqli_query($connect,$upquery);

	if ($runquery==true) {
		 
		header("location: post_manages.php?edited=The post edited Successfully.");
	}
}



?>