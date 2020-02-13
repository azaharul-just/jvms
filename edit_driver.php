 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 <?php require_once("header.php");?>

<?php require_once("config.php");?>

<div id="content">
<a href="driver_manages.php" class="btn btn-info"> Go Back </a>
<br> 
  <center>
    
   <?php 
          if(isset($_REQUEST['edited'])){
          echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
        }

        ?>
 
<?php 


if (isset($_REQUEST['edit_id'])) {
  $edit_id = $_REQUEST['edit_id'];
 
 $selectInfo = "SELECT * FROM adddriver_tbl WHERE id=$edit_id";
 $run_selectInfo = mysqli_query($connect,$selectInfo);

 while($getData = mysqli_fetch_array($run_selectInfo)){ ?>
   <center>
        <h1>Driver Update</h1>
        <hr>
      <form action="edit_driver_core.php" method="POST" style="width: 80%;">
        
        <input type="text" name="driver_id" value="<?php echo $getData['driver_id']?>" required="1" class="form-control" placeholder="Driver Id"> <br>  

         <input type="text" name="driver_name" value="<?php echo $getData['driver_name']?>" required="1" class="form-control" placeholder="Driver Name"  ><br>



          <select name="driver_ride" class="form-control" id="default"   required="required">
            <option value="<?php echo $getData['driver_ride']?>">Select One</option>
            <?php 

            $query = "SELECT * FROM addbus_tbl";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              while($data = mysqli_fetch_array($run_query)){ ?>
            <option value="<?php echo $data['id']; ?>"><?php echo $data['bus_name']; ?>&nbsp; (<?php echo $data['bus_type']; ?>) &nbsp; <p style="color: red;">(<?php echo $data["bus_id"]; ?>) </p> </option>
            <?php }} ?>
         </select>  <br>  

          <input type="text" name="driver_number" value="<?php echo $getData['driver_number']?>" class="form-control" placeholder="Mobile" required="1"  ><br>

          <input type="email" name="driver_email" value="<?php echo $getData['driver_email']?>" class="form-control" placeholder="Email (Optional)"   > <br>  


        <input type="hidden" name="editingID" value="<?php echo $edit_id;?>">

        <input type="submit" class="btn form-control btn-success" name="updateButton"  value="Save"><br>
      </form><br>

     </center>

    

<?php } } ?>


  </center>

</div>
   


<?php require_once("footer.php");?>