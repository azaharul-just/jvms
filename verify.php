<?php
  $conn = mysqli_connect("localhost","root","","vms_just");

  $id = $_GET['id'];
  $token = $_GET['token'];

  $update = "UPDATE users SET status='Active' WHERE id='$id' AND auth='$token'";

  $result = mysqli_query($conn,$update);

  if ($result) {
    echo "Your registration confirmation successful. Now you can <a href='login.php'>Login</a>";
  }else{
    echo "Sorry! Try again.";
  }



?>
