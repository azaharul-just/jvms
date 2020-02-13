<?php

require_once("config.php");


$inputUser = $_REQUEST['username'];
$inputPass = $_REQUEST['password'];
$password = htmlentities($_REQUEST['password']);
$encryptedPwd = $password;
//$type      = $_REQUEST['type'];

$createAuth = md5(sha1($inputPass.$inputUser));
//$matchQuery = "SELECT * FROM users WHERE auth='$createAuth'";  used for type user login
$matchQuery = "SELECT * FROM users WHERE auth='$createAuth'";
$run_matchQuery = mysqli_query($connect,$matchQuery);

if ($run_matchQuery==true) {
	$countData = mysqli_num_rows($run_matchQuery);

	if ($countData==1) {
			while ($row = mysqli_fetch_array($run_matchQuery)) {

				// $row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && $row['email_addr']==$type       used for type user login

			if ($row['status']=='Active') {
			
			if ($row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && $row['type']=='Super_Admin' ) {
	 				setcookie("currentUser",$createAuth,time()+(86400*7));
	 		        header("location: allusers.php");
	 			}
	 		 // $row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && 		$row['email_addr']==$type       used for type user login
	 		if ($row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && $row['type']=='Sub_Admin' ) {
	 				setcookie("currentUser",$createAuth,time()+(86400*7));
	 		        header("location: requisition_request.php");
	 			}
	 		 // $row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && $row['email_addr']==$type       used for type user login
	 		if ($row['email_addr']==$inputUser && $row['user_pwd']==$encryptedPwd && $row['type']=='Teacher' ) {
	 				setcookie("currentUser",$createAuth,time()+(86400*7));
	 		        header("location: requisition_form.php");
	 			}
			} elseif($row['status']=='Inactive') {
				header("location: login.php?wrong_info_active");
			}else{
				header("location: login.php?wrong_info");
 			}

		}
	}else{
		header("location: login.php?wrong_info");
 	}





}




?>
