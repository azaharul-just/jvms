 <?php 

if (!isset($_COOKIE['currentUser'])) {
  
  header("location: index.php");
}


?>
 <?php require_once("header.php");?>

<?php require_once("config.php");?>

<div id="content">
 
  <center>
    
  <h1>Post Update</h1>
  <hr>

   <?php 
          if(isset($_REQUEST['edited'])){
          echo '<b style="color:green">'.$_REQUEST['edited'].'</b>';
        }

        ?>
 
<?php 


if (isset($_REQUEST['edit_id'])) {
  $edit_id = $_REQUEST['edit_id'];
 
 $selectInfo = "SELECT * FROM post_tbl WHERE id=$edit_id";
 $run_selectInfo = mysqli_query($connect,$selectInfo);

 while($getData = mysqli_fetch_array($run_selectInfo)){ ?>
      
      <form action="edit_post_core.php" method="POST"  >
       <input type="text" name="title"  class="form-control w-50" placeholder="Title Here" value="<?php echo $getData['title']; ?>" ></ 
       <br> <br>


        <textarea name="description" rows="3" cols="8" class="form-control w-50" name="description" placeholder="Description " value=""><?php echo $getData['description']; ?></textarea> 
        <input type="hidden" name="editingID" value="<?php echo $edit_id;?>"><br>

        <input type="submit" class="form-control bg-dark w-50 text-light" name="editButton" value="Save">
      </form>


    

<?php } } ?>

  </center>

</div>
   


 