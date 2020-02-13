<?php 

setcookie("currentUser","",time()-(86400*7));

header("location: login.php");
 
?>