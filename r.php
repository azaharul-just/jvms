 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 <?php require_once("header.php");?>
 

<div id="content">
<a href="forward_request.php" class="btn btn-info"> Go Back </a>
<br> 
  <center>
    
   <?php 
          if(isset($_REQUEST['edited'])){
          echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
        }
        if(isset($_REQUEST['accept_id'])){
          echo '<b style="color:green">'.$_REQUEST['accept_id'].'</b>';
        }
         if(isset($_REQUEST['reject_id'])){
          echo "<span style='color:red'>The requistion request is rejected!</span>";
        }
         


?>







 
<?php 


if (isset($_REQUEST['view_id'])) {
  $view_id = $_REQUEST['view_id'];
 
 $selectInfo = "SELECT * FROM rq_tbl WHERE id=$view_id";
 $run_selectInfo = mysqli_query($connect,$selectInfo);

 while($getData = mysqli_fetch_array($run_selectInfo)){ ?>
   <center>
        <h1>Requisition Info</h1>
        <hr>
        <table class="table table-striped" style="border: 2px solid gray;width: 80%; ">
          <thead style="background: gray;text-align: center;">
             <tr> 
              <th>Type</th>
              <th>info</th>
            </tr>
          </thead>
          <tbody style="text-align: center;">
            <tr>
              <td> <b>First Name : </b> </td>
              <td><?php echo $getData['fname'];?></td>
            </tr>
            <tr>
              <td> <b>Last Name : </b> </td>
              <td><?php echo $getData['lname'];?></td>
            </tr>

            <tr>
              <td> <b>Dept/Section : </b> </td>
              <td><?php echo $getData['dept_section'];?></td>
            </tr>
            
            <tr>
              <td> <b>Email : </b> </td>
              <td><?php echo $getData['email_addr'];?></td>
            </tr>
            <tr>
              <td> <b>Vehicle : </b> </td>
              <td><?php echo $getData['bus_type'];?></td>
            </tr>
            <tr>
              <td> <b style="color: red;">Journey Date :  </b></td>
              <td><b style="color: red"><?php echo $getData['date'];?></b></td>
            </tr>
            <tr>
              <td> <b>Departure Time :  </b></td>
              <td><span style="color: blue;"> <?php echo $getData['d_time'].":".$getData['d_min'].$getData['d_ap'];?> </span> </td>
            </tr>
            <tr>
              <td> <b>Return Time : </b> </td>
              <td><span style="color: green;"> <?php echo $getData['r_time'].":".$getData['r_min'].$getData['r_ap'];?></span></td>
            </tr>
            <tr>
              <td> <b>Route : </b> </td>
              <td><?php echo $getData['destination'];?></td>
            </tr>
            <tr>
              <td> <b>Purpose : </b> </td>
              <td><?php echo $getData['p_type'];?></td>
            </tr>
            <tr>
              <td width="250px;"> <b>Purpose Details : </b> </td>
              <td><?php echo $getData['purpose'];?></td>
            </tr>
             

          </tbody>
          
         
        </table><br> 

 

        <a href="f_accept.php?accept_id=<?php echo $getData['id'];?>&bus_type=<?php echo $getData['bus_type'];?>" class="btn btn-success">Accept</a> <a onclick="return confirm('Are you sure?');" href="r.php?reject_id=<?php echo $getData['id'];?>" class="btn btn-danger">Reject</a>  <br>
     

     </center>

    

<?php } } ?>


  </center>

</div>
   


 









 <?php
 /*************************************************
        Active and Inactive action The User
**************************************************/
  if (isset($_GET['reject_id'])) {
    $reject_id = $_GET['reject_id'];
    $sqlEdit = "SELECT * FROM rq_tbl WHERE id='$reject_id'";
    $rs = mysqli_query($connect,$sqlEdit);
    $row=mysqli_fetch_array($rs);

    if ($row['confirm_vehicle'] == 0 ) {
      $st = -999 ;
    }else{
      $st = 0;
    }

    $sqlUpdate = "UPDATE rq_tbl SET confirm_vehicle='$st' WHERE id='$reject_id'";
    $run_sqlUpdate = mysqli_query($connect,$sqlUpdate);

    if ($run_sqlUpdate) {
      $select_rq_table = "SELECT * FROM rq_tbl WHERE id='$reject_id'";
      $run_select_rq_table = mysqli_query($connect,$select_rq_table);
      while ($info = mysqli_fetch_array($run_select_rq_table)) {
          $info_confirm_vehicle = $info['confirm_vehicle'];
          $info_email = $info['email_addr'];
          $info_date = $info['date'];
      }

        if ($info_confirm_vehicle < 0) {
           //php mailer

                $rq_date = $info_date;
                        $result = '<div>Sorry! Your vehicle requistion of '.$rq_date.' is Rejected for some special reasons. For more details, please <a href="http://localhost/JUST_vehicle_management_system/login.php">Login</a></div>';
                       

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
                        $mail->addAddress($info_email);     // Add a recipient
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

        } else {
          # code...
        }
        
    } else {
      # code...
    }
    












    }




?>

