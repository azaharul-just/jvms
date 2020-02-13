 <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>


<?php 

require_once("config.php");


$bus_type = htmlentities($_REQUEST['bus_type']);
$date = htmlentities($_REQUEST['date']);
$d_time = htmlentities($_REQUEST['d_time']);
$d_min = htmlentities($_REQUEST['d_min']);
$d_ap = htmlentities($_REQUEST['d_ap']);
$r_time = htmlentities($_REQUEST['r_time']);
$r_min = htmlentities($_REQUEST['r_min']);
$r_ap = htmlentities($_REQUEST['r_ap']);

$p_type = htmlentities($_REQUEST['p_type']);

$destination = htmlentities($_REQUEST['destination']);
$purpose = htmlentities($_REQUEST['purpose']);



 if (isset($_COOKIE['currentUser'])) {
						$currentUserTarget = $_COOKIE['currentUser'];

						$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
						$run_query = mysqli_query($connect,$query);

						if ($run_query==true) {
							while($getRow = mysqli_fetch_array($run_query)){

								//............................................................
								// $req_date = htmlentities($_REQUEST['date']);
								// $todaysDate = date("Y-m-d");

								// $currentDay = date("d");
								// $currentMonth = date("m");
								// $currentYear = date("Y");

								// $rDay = substr($req_date,8,2);
								// $rMonth = substr($req_date,5,-3);
								// $rYear = substr($req_date,0,-6);

								// if($rDay  )

								//............................................................
								 
								$user_id = $getRow['id'];
								$fname = $getRow['fname'];
								$lname = $getRow['lname'];
								$dept_section = $getRow['dept_section'];
								$email_addr = $getRow['email_addr'];


								$insertSignupData = "INSERT INTO rq_tbl(user_id,fname,lname,dept_section,email_addr,bus_type,date,destination,purpose,confirm_vehicle,d_time,d_min,d_ap,r_time,r_min,r_ap,p_type) VALUES('$user_id','$fname','$lname','$dept_section','$email_addr','$bus_type','$date','$destination','$purpose',0,'$d_time','$d_min','$d_ap','$r_time','$r_min','$r_ap','$p_type')";

								$run_matchQuery = mysqli_query($connect,$insertSignupData);

								if ($run_matchQuery==true) {
									header("location: requisition_form.php?done_request=Requsition Successfull!");

								}else{
									header("location: requisition_form.php?done_request=Requsition date not valid!");
								}

								 

							}
						}


					}


 


 
?>