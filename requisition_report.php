  <?php

if (!isset($_COOKIE['currentUser'])) {

	header("location: index.php");
}


?>


<?php require_once("header.php");?>

 		<div id="content">
			 <center>
			 	<h1 >Requisition Cost Form </h1>
			 <hr>

			 <?php
					if(isset($_REQUEST['done_added'])){
					echo '<b style="color:green">'.$_REQUEST['done_added'].'</b>';
				}

				?>
 <?php
if (isset($_REQUEST['report_id'])) {
  $report_id = $_REQUEST['report_id'];






  ?>

			 <form action="requisition_report_core.php?report_id=<?php echo $report_id;?>" method="POST" style="width: 80%;background:#fff">
			 	  <br>
			 	  <input type="number" name="miles" class="form-control" style="width:80%;" placeholder="Enter miles">
			 	  <br>
			 	   <input type="number" name="rate_liter" class="form-control" style="width:80%;" placeholder="Enter tk (per liter)"><br>

				<!--  <input type="hidden" name="editingID" value="<?php echo $accept_id;?>"> -->
				 <input type="submit" name="add_confirm" style="width:80%;"  class="form-control btn btn-primary" value="Add Cost"> <br><br>

			 </form> <br>


	<?php }   ?>
			 </center>
		</div>
