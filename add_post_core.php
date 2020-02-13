 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

 <?php 

require_once("config.php");


$title = htmlentities($_REQUEST['title']);
$description = htmlentities($_REQUEST['description']);
 
 
 


$insertSignupData = "INSERT INTO post_tbl(title,description,picName) VALUES('$title','$description','pic')";

 	mysqli_query($connect,$insertSignupData);
 
	$lastId = mysqli_insert_id($connect);

	$picName="photoPost/".$lastId.$_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], $picName);

	$sqlUpdate = "UPDATE post_tbl SET picName='$picName' WHERE id='$lastId'";

	$run_matchQuery = mysqli_query($connect,$sqlUpdate);



if ($run_matchQuery==true) {
	header("location: add_post.php?done_added=The Post is added Successfull!");

}



 
?>



 