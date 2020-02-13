<?php 

if (isset($_COOKIE['currentUser'])) {
	
	header("location: profile.php");
}


?>
 
<?php require_once("header.php")?>

		<div id="content"> 
			<h2 style="text-align: center" >Password Recovery Form</h2>
			<hr>
			<div id="loginBoxes">
				<center>

 <!-- Php Operation Start-->

<?php
	if (isset($_POST['rec_button'])) {
		$useremail = htmlentities($_POST['useremail']);
  
		$sqlCheck = "SELECT * FROM users WHERE email_addr='$useremail'";
		$rscheck = mysqli_query($connect,$sqlCheck);

		
		if ($rscheck == true) {
			 $count = mysqli_num_rows($rscheck);
			 if ($count>0) {

			 while ($d = mysqli_fetch_array($rscheck)) {
			 		 $id = $d['id'];
			 	}
			 	//header("location: forgot_new_pwd.php?id=$id");


//add

 		$last_id = $id;
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/JUST_vehicle_management_system/forgot_new_pwd.php?id='.$last_id;

        $output = '<div>Click the link to recover your password, please <br>'.$url.'</div>';

//ad

			 //  email send



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
          $mail->addAddress($_POST['useremail']);     // Add a recipient
        //  $mail->addAddress('ellen@example.com');               // Name is optional
          $mail->addReplyTo(EMAIL);
        //  $mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         $mail->isHTML(true);                                  // Set email format to HTML

          $mail->Subject = "Password Recovery";
          $mail->Body    = $output;
        //  $mail->AltBody =  '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';

          if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {


          	
          	header("location: forgot_pwd.php?done_verify=An email has sent to recover password");
            //$msg = 'Congratulations! Your registration have been successful now verified email before login!';
          }



  			//End Php mailer operation









			 //email send 

			 	// while ($d = mysqli_fetch_array($rscheck)) {
			 	// 	 $id = $d['id'];
			 	// }
			 	// header("location: forgot_new_pwd.php?id=$id");
			   
			}
			else{
				$exit = "The email did not registered! So  <a href='signup.php'>Sign Up</a>";
				echo "<span style='color:red;'>".$exit."</span>";
			 
			}
		}
 
 
	}

?>
<!-- Php Operation Finish-->

				<?php 
					if(isset($_REQUEST['done_verify'])){
						echo "<span style='color:blue'>Check your email and recover password now!</span>";

					}

				?>
 		  
				<form action="" method="POST" style="width: 70%;background: #fff">
			 <br>
					<input type="email" name="useremail" style="width: 80%" class="form-control" required="1" placeholder="Email" value="<?php if(isset($_POST['useremail'])){echo $_POST['useremail'];}?>"><br>
  
				 
					<input type="submit" class="form-control btn btn-info" style="width: 80%"  name="rec_button" value="Recovery Password">
					<br><br>

					 
				</form>
				<br><br> 
				

				</center>
			</div>
			  
		</div>


 
 