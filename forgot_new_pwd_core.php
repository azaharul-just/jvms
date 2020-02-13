<?php 

require_once("config.php");

//$getCurrentUser = $_COOKIE['currentUser'];

//$oldpwd = htmlentities($_REQUEST['oldpwd']);
 

if (isset($_REQUEST['resetpwd'])) {
	if (isset($_REQUEST['id'])) {
 	$id = $_REQUEST['id'];
}
 
$password = htmlentities($_REQUEST['password']);
$cpassword = htmlentities($_REQUEST['cpassword']);


$checkQuery = "SELECT * FROM users WHERE id='$id'";
$runQuery = mysqli_query($connect,$checkQuery);
if ($runQuery==true) {
	if (mysqli_num_rows($runQuery)===1) {
		while ($getCurrentData=mysqli_fetch_array($runQuery)) {
			$userEmail = $getCurrentData['email_addr'];
			$userId = $getCurrentData['id'];
		}
	}
}
//$generateAuth = md5(sha1($oldpwd.$userEmail));

if ($password==$cpassword) {
	 
	 $hasPwd = $cpassword;
	 $newAuth = md5(sha1($password.$userEmail));

	 $updatQuery = "UPDATE users SET user_pwd='$hasPwd',auth='$newAuth' WHERE id='$userId'";     
	 $run_updateQuery = mysqli_query($connect,$updatQuery);

	 if ($run_updateQuery==true) {
	 	setcookie("currentUser","",time()-(86400*7)); //logout- cookie delete

	 	//setcookie("currentUser",$newAuth ,time()+(86400*7));
		header("location: login.php?done_signup=Passwords Changed Successfully!");


	 } 
  
}else{
	header("location: forgot_new_pwd.php?id=$id&not_pwdmatch=Passwords did not match");

}
 


}


 






 



 
?>