  <?php 

if (!isset($_COOKIE['currentUser'])) {
	
	header("location: index.php");
}


?>

  
<?php require_once("header.php");?>
 		
 		<div id="content">
			 <center>
			 	<h1 >Requisition Confirm Form </h1>
			 <hr>

			 <?php 
					if(isset($_REQUEST['done_added'])){
					echo '<b style="color:green">'.$_REQUEST['done_added'].'</b>';
				}

				?>
 <?php 
if (isset($_REQUEST['accept_id'])) {
  $accept_id = $_REQUEST['accept_id'];
  $bus_type= $_REQUEST['bus_type'];


  ?>
   
			 <form action="accept_core.php?confirm_id=<?php echo $accept_id;?>" method="POST" style="width: 80%; ">
			 	  
			 	 <br> 
			 	  <select name="driver_ride" class="form-control" id="default" style="width:80%;" required="required">
						<option value="">Select Vehicle</option>
						<?php 

						$query = "SELECT * FROM addbus_tbl WHERE bus_type='$bus_type'";
						$run_query = mysqli_query($connect,$query);

						if ($run_query==true) {
							while($data = mysqli_fetch_array($run_query)){
							if($data['status']=='Active'){ ?>
						<option value="<?php echo $data['id']; ?>"><?php echo $data['bus_name']; ?>&nbsp; (<?php echo $data['bus_type']; ?>) &nbsp; <p style="color: red;">(<?php echo $data["bus_id"]; ?>)	</p> </option>
						<?php }}} ?>
				 </select>  <br>

				<!--  <input type="hidden" name="editingID" value="<?php echo $accept_id;?>"> -->
				 <input type="submit" name="add_confirm" style="width:80%;"  class="form-control btn btn-primary" value="Add Bus"> <br><br>
					 
			 </form> <br>
			 	 

	<?php }   ?>		 	 
			 </center> 
		</div>




 
 