<?php 
require_once("config.php");

if (isset($_REQUEST["add_confirm"])) {
	// $bus_id = $_REQUEST["bus_id"];
	// $bus_name = $_REQUEST["bus_name"];
	// $bus_type = $_REQUEST["bus_type"];
	$confirm_vehicle = $_REQUEST["driver_ride"];
 
    $editingID = $_REQUEST["confirm_id"];
	$insert_req = "UPDATE rq_tbl SET confirm_vehicle='$confirm_vehicle' WHERE id='$editingID'";
	// $upquery = "UPDATE addbus_tbl SET bus_id='$bus_id',bus_name='$bus_name',bus_type='$bus_type' WHERE id=$editingID";
	$runquery = mysqli_query($connect,$insert_req);

	// if ($runquery==true) {
		 
	// 	header("location: forward_request.php?edited=The vehicle accepted Successfully.");
	// }

	if ($runquery==true) {

			$rq_table_select = "SELECT * FROM rq_tbl WHERE id='$editingID'";
			$run_rq_table_select = mysqli_query($connect,$rq_table_select);

			while ($info = mysqli_fetch_array($run_rq_table_select)) {
				$date_rq = $info['date'];
				$email_rq = $info['email_addr'];
			}
		//php mailer

						$rq_date = $date_rq;
                        $result = '<div>Thank You! Your vehicle requistion of '.$rq_date.' is accepted. For more details, please <a href="http://localhost/JUST_vehicle_management_system/login.php">Login</a></div>';
                       

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
                        $mail->addAddress($email_rq);     // Add a recipient
                      //  $mail->addAddress('ellen@example.com');               // Name is optional
                        $mail->addReplyTo(EMAIL);
                      //  $mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');

                      //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                       $mail->isHTML(true);                                  // Set email format to HTML


                        $mail->Subject = "Requisition Confirmation";
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




		 
		header("location: forward_request.php?edited=The vehicle accepted Successfully.");
	}



	
}



?>