

<?php

if (isset($_COOKIE['currentUser'])) {

	header("location: profile.php");
}


?>

<!-- Header Start -->
<?php require_once("header.php")?>



 <!-- Php Operation Start-->

<?php
	if (isset($_POST['sub'])) {
		$error=0;
		$useremail = htmlentities($_POST['useremail']);
			$password = htmlentities($_POST['password']);
			$authToken = md5(sha1($password.$useremail));

		if ($_POST['password'] != $_POST['cpassword']) {
			$mispass = "Password and Confirm Password Mismatch<br>";
			$error = 1;
		}

		if ((strlen($_POST['fname'])) < 2) {
			$fnameLength = "First name at least 2 characters.<br>";
			$error = 1;
		}
		if ((strlen($_POST['lname'])) < 4) {
			$lnameLength = "Last name at least 4 characters.<br>";
			$error = 1;
		}

		if (strlen($_POST['number'])!=11) {
			$numberLength = "11 digits number.";
			$error = 1;
		}

		if (strlen($_POST['password'])<6) {
			$passLength = "Password must be more than 5 characters.";
			$error = 1;
		}

		$sqlCheck = "SELECT * FROM users WHERE email_addr='$_POST[useremail]'";
		$rscheck = mysqli_query($connect,$sqlCheck);
		$count = mysqli_num_rows($rscheck);

		if ($count>0) {
			$exit = "Already have account for this email.Please try another email or <a href='signin.php'>Login</a>";
			echo "<span style='color:red;'>".$exit."</span>";
			$error=1;
		}


		$sql_Check = "SELECT * FROM users WHERE number='$_POST[number]'";
		$rs_check = mysqli_query($connect,$sql_Check);
		$count_number = mysqli_num_rows($rs_check);

		if ($count_number>0) {
			$exit = "Already have account for this Number.Please try another Number or <a href='signin.php'>Login</a>";
			echo "<span style='color:red;'>".$exit."</span>";
			$error=1;
		}


		if ($error==0) {
			 	//Sign Up Data Insert
		$insert = "INSERT INTO users SET
					title ='$_POST[title]',
					fname ='$_POST[fname]',
					lname = '$_POST[lname]',
					dept_section = '$_POST[dept_section]',
					email_addr = '$_POST[useremail]',
					number = '$_POST[number]',
					user_pwd = '$password',
					auth ='$authToken',
					avatar = 'avatar.png'";
		$run_matchQuery = mysqli_query($connect,$insert);



		//addd
		$last_id = mysqli_insert_id($connect);
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/JUST_vehicle_management_system/verify.php?id='.$last_id.'&token='.$authToken;

        $output = '<div>Thanks for registering with localhost. Please click this link to complete this registration<br>'.$url.'</div>';





  		if ($run_matchQuery==true) {
			//header("location: login.php?done_signup=Registration Successfull! Login Now..");

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

          $mail->Subject = "Registration Confirmation";
          $mail->Body    = $output;
        //  $mail->AltBody =  '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';

          if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {

          	header("location: login.php?done_signup=Registration Successfull! Veryfy email before Login Now..");
            //$msg = 'Congratulations! Your registration have been successful now verified email before login!';
          }



  			//End Php mailer operation




			}
		}


	}

?>
<!-- Php Operation Finish-->




<section id="Login_section">
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h2  class="text-center"> <i class="fa fa-lock"></i> Sign Up Form</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="login_box">


							<span style="color: red;">
						 <?php if(isset($mispass)){echo $mispass;} ?> &nbsp;&nbsp;
						 <?php if(isset($passLength)){echo $passLength;} ?>
						 <?php if(isset($numberLength)){echo $numberLength;} ?>  &nbsp;&nbsp;
						 <?php if(isset($fnameLength)){echo $fnameLength;} ?>
						 <?php if(isset($lnameLength)){echo $lnameLength;} ?> </span>

				<form action=" " method="POST">
					<p><b>All fields are required! <span style="color:red;">*</span> </b></p>

					<input type="text" name="title" class="form-control" required="1"   placeholder="What's your designation? " value="<?php if(isset($_POST['title'])){echo $_POST['title'];}?>"  >

					<input type="text" name="fname" class="form-control" required="1" placeholder="First Name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>" >

					<input type="text" name="lname" class="form-control" required="1" placeholder="Last Name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>">

					<input type="text" name="dept_section" class="form-control" required="1" placeholder="Department/Section" value="<?php if(isset($_POST['dept_section'])){echo $_POST['dept_section'];}?>">

					<input type="email" name="useremail" class="form-control" required="1" placeholder="Email" value="<?php if(isset($_POST['useremail'])){echo $_POST['useremail'];}?>">

						<br>
					<input type="number" name="number" class="form-control" required="1" placeholder="Mobile Number" value="<?php if(isset($_POST['number'])){echo $_POST['number'];}?>">

					<input type="password" name="password" class="form-control" required="1" placeholder="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">


			 		<input type="password" name="cpassword" class="form-control" required="1" placeholder="Confirm password" value="<?php if(isset($_POST['cpassword'])){echo $_POST['cpassword'];}?>">
				<!--	<select name="type" class="form-control" style="width: 80%;">
								<option>Select User Type</option>
								<option value="Super_Admin">Super Admin</option>
								<option value="Sub_Admin">Sub Admin</option>
								<option value="Teacher">Teacher</option>
							</select>

				-->
					<input type="submit" class="form-control btn btn-dark" name="sub" value="Sign Up">


					<p>Have any Account? <a href="login.php" class="btn btn-primary">Login</a> </p>
				</form>



            </div>

        </div>
    </div>
</div>
</section>




<?php require_once("footer.php")?>
