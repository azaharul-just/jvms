<?php 
require_once("config.php");

 if (isset($_REQUEST['add_confirm'])) {
 		$miles = $_REQUEST['miles'];
 		$rate_liter = $_REQUEST['rate_liter'];
 		$report_id = $_REQUEST['report_id'];
 

 		$litre = $miles/50;

 		$cost = $litre*$rate_liter;

 		 
 		$selectInfo = "SELECT * FROM rq_tbl WHERE id=$report_id";
		 $run_selectInfo = mysqli_query($connect,$selectInfo);

	 	while($getData = mysqli_fetch_array($run_selectInfo)){
	 		$date_rq = $getData['date'];
	 		$user_email = $getData['email_addr'];
	 		$user_id = $getData['user_id']; 
	 	}
 		 

 		// echo "<pre>";
 		// 	echo $report_id;
 		// 	echo $user_id;
 		// 	echo $cost;
 		// echo "</pre>";
 	    $cost_insert = "INSERT INTO cost_tbl(rq_id,user_id,cost,created)VALUES('$report_id','$user_id','$cost',NOW())";
 		$run_cost_insert = mysqli_query($connect,$cost_insert);

 		if ($run_cost_insert==true) {

 			$select_cost_table = "SELECT * FROM cost_tbl WHERE rq_id='$report_id'";
 			$run_select_cost_table = mysqli_query($connect,$select_cost_table);

 			while ($cost_Data = mysqli_fetch_array($run_select_cost_table)) {
 				$info_cost = $cost_Data['cost'];
 			}



 			//php mailer

					     	$rq_date = $date_rq;
                        $result = '<div>Thank You for travelling! Your vehicle requistion cost of <span style="color:blue;">'.$rq_date.' </span> is <span style="color:red;">'.$info_cost.' Tk </span> For more details, please <a href="http://localhost/JUST_vehicle_management_system/login.php">Login</a></div>';
                       

                                          //Add Php mailer operation
                      require 'PHPMailerAutoload.php';
                      require 'crediantial.php';

                        $mail = new PHPMailer;

                      //  $mail->SMTPDebug = 4;                               // Enable verbose debug output

                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = EMAIL;                 // SMTP username
                        $mail->Password = PASS;                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        $mail->setFrom(EMAIL, 'JUST VMS');
                        $mail->addAddress($user_email);     // Add a recipient
                      //  $mail->addAddress('ellen@example.com');               // Name is optional
                        $mail->addReplyTo(EMAIL);
                      //  $mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');

                      //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                       $mail->isHTML(true);                                  // Set email format to HTML


                        $mail->Subject = "Requisition Cost";
                        $mail->Body    = $result; 

                      //  $mail->AltBody =  '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';

                        if(!$mail->send()) {
                          echo 'Message could not be sent.';
                          echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }// else {
                          
                        //  // header("location: login.php?done_signup=To see details please Login Now..");
                        //   //$msg = 'Congratulations! Your registration have been successful now verified email before login!';
                        // }

		//php mailer 




		 
		header("location: requisition_request.php?edited=The Cost added Successfully.");
	}
 		
 		
 	}  

?>