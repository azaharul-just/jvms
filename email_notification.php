 <?php

if (!isset($_COOKIE['currentUser'])) {
  error_reporting(0);

  header("location: index.php");
}


?>
 <?php require_once("header.php");?>

<?php require_once("config.php");?>

<div id="content">
<a href="index.php" class="btn btn-info"> Go Back </a>
<br>

  <center>
     <h1>Requisition Result</h1>
                  <hr>
   <?php
          if(isset($_REQUEST['edited'])){
          echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
        }

        ?>

<?php

   if (isset($_COOKIE['currentUser'])) {
            $currentUserTarget = $_COOKIE['currentUser'];

            $query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              while($getRow = mysqli_fetch_array($run_query)){

                $user_id = $getRow['id'];
                $user_email = $getRow['email_addr'];
           }
         }
?>
<table class="table table-striped text-center">
 <tr style="background: #434443;color: white">

          <th>Date</th>

          <th>Driver</th>
           <th>Phone</th>
           <th>Status</th>
          <!--  <th>Cost</th> -->

        </tr>

<?php


           $selectInfo = "SELECT * FROM rq_tbl WHERE user_id='$user_id' ";
           $run_selectInfo = mysqli_query($connect,$selectInfo);

           while($getData = mysqli_fetch_array($run_selectInfo)){
                    $driver_ride = $getData['confirm_vehicle'];

                    // if ($driver_ride==0) {
                    //    echo "<span style='color:blue;'>Wait!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is pending....<hr>";
                    // }
                    // if ($driver_ride=='') {
                    //    echo "<span style='color:blue;'>Wait!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is pending to admin....<hr>";
                    // }
                    //  if ($driver_ride < 0) {
                    //    echo "<span style='color:red;'>Sorry!</span>".'Your vehicle requisition of '.'<span style="color:red">'.$getData['date'].'</span>'." day request is canceled for some reasonns!<hr>";
                    // }

                    ?>




<?php
                  if ($driver_ride >0) {
                    $driverInfo = "SELECT * FROM adddriver_tbl WHERE driver_ride='$driver_ride' ";
                    $run_driverInfo = mysqli_query($connect,$driverInfo);

                   


                        $rq_date = $getData["date"];
                        $result = '<div>Thank You! Your vehicle requistion of '.$rq_date.' is accepted</div>';

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


                        $mail->Subject = "Requis Confirmation";
                        $mail->Body    = $result; 

                      //  $mail->AltBody =  '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';

                        if(!$mail->send()) {
                          echo 'Message could not be sent.';
                          echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }// else {
                          
                        //  // header("location: login.php?done_signup=To see details please Login Now..");
                        //   //$msg = 'Congratulations! Your registration have been successful now verified email before login!';
                        // }



                      //End Php mailer operation






                        ?>


                 <?php   while ($driver_data = mysqli_fetch_array($run_driverInfo)) {?>

                        



                  <tr>

                    <td><?php echo $getData['date'] ?></td>

                    <td>
                      <?php echo $driver_data['driver_name'];?>

                    </td>
                     <td>
                      <?php echo $driver_data['driver_number']; ?>

                    </td>

                    <td>
                      <?php echo "Accepted"; ?>

                    </td>













                   <!--  <td>
                      <?php
                      $select_cost_Info = "SELECT cost_tbl.id,cost_tbl.rq_id,cost_tbl.user_id,cost_tbl.cost,rq_tbl.id from cost_tbl join rq_tbl on cost_tbl.rq_id=rq_tbl.id";
                       $run_cost_selectInfo = mysqli_query($connect,$select_cost_Info);

                      while($costData = mysqli_fetch_array($run_cost_selectInfo)){

                        $cost = $costData['cost'];
                        echo $cost;
                      }

                       ?>

                    </td> -->






                  </tr>

<?php  } }elseif($driver_ride < 0){ ?>

              <tr>

                    <td><?php echo $getData['date'];?></td>

                    <td>
                      <?php echo "No";?>
                   </td>
                   <td>
                      <?php echo "No"; ?>

                    </td>

                    <td>
                      <?php echo "<span style='color:red'>Canceled</span>"; ?>

                    </td>
                     <!-- <td>
                      <?php echo "0"; ?>

                    </td> -->





                  </tr>


<?php }else{ ?>

              <tr>

                    <td><?php echo $getData['date'];?></td>

                    <td>
                      <?php echo "No";?>
                   </td>
                   <td>
                      <?php echo "No"; ?>

                    </td>

                    <td>
                      <?php echo "<span style='color:blue'>Pending</span>"; ?>

                    </td>
                    <!-- <td>
                      <?php echo "0"; ?>

                    </td> -->







                  </tr>


<?php } }   ?>


</table>



  </center>

</div>



<?php }  require_once("footer.php");?>
