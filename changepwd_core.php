<?php 

require_once("config.php");

$getCurrentUser = $_COOKIE['currentUser'];

$oldpwd = htmlentities($_REQUEST['oldpwd']);
$newpwd = htmlentities($_REQUEST['newpwd']);
$cfmpwd = htmlentities($_REQUEST['cfmpwd']);

$checkQuery = "SELECT * FROM users WHERE auth='$getCurrentUser'";
$runQuery = mysqli_query($connect,$checkQuery);
if ($runQuery==true) {
	if (mysqli_num_rows($runQuery)===1) {
		while ($getCurrentData=mysqli_fetch_array($runQuery)) {
			$userEmail = $getCurrentData['email_addr'];
			$userId = $getCurrentData['id'];
		}
	}
}

$generateAuth = md5(sha1($oldpwd.$userEmail));

if ($generateAuth==$getCurrentUser && $newpwd==$cfmpwd) {
	 
	 $hasPwd = $cfmpwd;
	 $newAuth = md5(sha1($newpwd.$userEmail));

	 $updatQuery = "UPDATE users SET user_pwd='$hasPwd',auth='$newAuth' WHERE id='$userId'";     
	 $run_updateQuery = mysqli_query($connect,$updatQuery);

	 if ($run_updateQuery==true) {
	 	 setcookie("currentUser","",time()-(86400*7)); //logout- cookie delete

	 	setcookie("currentUser",$newAuth ,time()+(86400*7));
		header("location: changepwd.php?changed_pwd=Passwords Changed Successfully!");


	 }
 

}else{
	header("location: changepwd.php?not_pwdmatch=Passwords did not match");

}

 



 
?>