 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 <?php require_once("header.php");?>

<?php require_once("config.php");?>

<div id="content">
<a href="bus_manages.php" class="btn btn-info"> Go Back </a>
<br> 

    
        <center>
        	<h1>Bus Update</h1>
        	<hr>

         <?php 
              if(isset($_REQUEST['edited'])){
              echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
            }

              if(isset($_REQUEST['error_done'])){
               echo '<b style="color:red">'.$_REQUEST['error_done'].'</b>';
              }

        ?>
        	 
<?php 


if (isset($_REQUEST['edit_id'])) {
  $edit_id = $_REQUEST['edit_id'];
 
 $selectInfo = "SELECT * FROM addbus_tbl WHERE id=$edit_id";
 $run_selectInfo = mysqli_query($connect,$selectInfo);

 while($getData = mysqli_fetch_array($run_selectInfo)){ ?>
      
      <form action="edit_bus_core.php" method="POST" style="width: 80%; ">
       <input type="text" name="bus_id" value="<?php echo $getData['bus_id'];?>" class="form-control" required="1" placeholder="Bus Id" style="width: 80%;"><br>
       <input type="text" name="bus_name" value="<?php echo $getData['bus_name'];?>" required="1" class="form-control" placeholder="Bus Name" style="width:80%;"><br>
 	 <select name="bus_type" class="form-control" required="1" style="width: 80%;"> 
			<option value="<?php echo $getData['bus_type'];?>"><?php echo $getData['bus_type'];?> </option>
			<option value="Micro-Bus">Micro-Bus</option>
			<option value="Pick-Up">Pick-Up</option> 
			<option value="AC-Minibus">AC-Minibus</option>
			<option value="Non-AC Minibus">Non-AC Minibus</option> 
			<option value="Single Deck Bus">Single Deck Bus</option>
			<option value="Double Deck Bus">Double Deck Bus</option> 
			 

		</select>  <br>
		 <input type="hidden" name="editingID" value="<?php echo $edit_id;?>">
			 
	 	<input type="submit" name="updateButton" style="width: 80%;" class="form-control btn btn-primary" value="Update Bus">
	 	<br><br>
      </form>


    

<?php } } ?>
        </center>

</div>
   


<?php require_once("footer.php");?>