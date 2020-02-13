  <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

 <?php 

require_once("config.php");

$getId = $_REQUEST['id'];

$deleteQuery = "DELETE FROM post_tbl WHERE id=$getId";

$run_deleteQuery = mysqli_query($connect,$deleteQuery);

if ($run_deleteQuery == true) {
	header("location: post_manages.php?deleted=The post deleted successfull");
}


 
?>