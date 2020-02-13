 <?php

if (!isset($_COOKIE['currentUser'])) {

  header("location: index.php");
}


?>


<!-- Header Start -->

  <?php require_once("header.php")?>




<?php
 /*************************************************
        Active and Inactive action The User
**************************************************/
  if (isset($_GET['editId'])) {
    $editId = $_GET['editId'];
    $sqlEdit = "SELECT * FROM users WHERE id='$editId'";
    $rs = mysqli_query($connect,$sqlEdit);
    $row=mysqli_fetch_array($rs);

    if ($row['status']=='Active') {
      $st = 'Inactive';
    }
    else{
      $st = 'Active';
    }
    $sqlUpdate = "UPDATE users SET status='$st' WHERE id='$editId'";
    mysqli_query($connect,$sqlUpdate);
  }



?>

<?php

/***************************************
        Delete The User
***************************************/
  if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $sqlDelete = "DELETE FROM users WHERE id='$deleteId'";
    $rs = mysqli_query($connect,$sqlDelete);

  }


?>
 

    <section id="All_users_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title"> <i class="fa fa-users" aria-hidden="true"></i>  All User List</h2>
                </div>
            </div>
            
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-9">
                          <div class="form-group">
                             <!--  <input type="text" class="form-control" placeholder="Type any keyword"> -->
                             <input type="text" name="search" class="form-control" placeholder="Keywords any type">
        
                          </div>
                    </div>
                    <div class="col-md-3">
                      <button type="submit" name="searchSubmit" class="btn btn-primary">Click to Search</button>
                     <!-- <input type="submit" name="searchSubmit" class="btn btn-success" value="Search"> -->
                    </div>
                  
                  </div>
            </form>




  <?php
 /***************************************
       Search Operation Start
***************************************/
   if (isset($_POST['searchSubmit'])) {
    $sqlSearch = "SELECT * FROM users
          WHERE fname LIKE '%$_POST[search]%' OR
            lname LIKE '%$_POST[search]%' OR
            type LIKE '%$_POST[search]%' OR
            email_addr LIKE '%$_POST[search]%' OR
            dept_section LIKE '%$_POST[search]%'";

    $rsSearch = mysqli_query($connect,$sqlSearch);
    $countSearch = mysqli_num_rows($rsSearch);

    if ($countSearch>0) {
  ?>
  <caption> <span>Your Searching result for keyword <u style="color: red">"<?php echo $_POST['search']?>"</u> is "<?php echo $countSearch ;?>" times here. </span> </caption>
    <table class="table table-hover table-light" style="background: pink">
                        <thead>
                          <tr>
                            <th class="hideInSmall">Sl.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Dept/Section</th>
                            <th class="hideInSmall">Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>


  <?php
    $j=0;
      while ($rowSearch = mysqli_fetch_array($rsSearch)) {
        $j++;
  ?> <tbody>
        <tr>
          <th class="hideInSmall" scope="row"><?php echo $j;?></th>
        <!--   <td><?php echo $j;?></td> -->
          <td><?php echo $rowSearch['fname'];?> </td>
          <td><?php echo $rowSearch['lname'];?></td>
          <td><?php echo $rowSearch['email_addr'];?></td>
          <td><?php echo $rowSearch['dept_section'];?></td>
            <td class="hideInSmall"><img width='40px' src="avatar/<?php echo $rowSearch['avatar'];?>" alt='Pic'> </td>
          <td><?php echo $rowSearch['status'];?></td>
          <td> <a href="allusers.php?editId=<?php echo $rowSearch['id'];?>" onclick="return confirm('Are you want to block?');" >Status</a> | <a href="allusers.php?delete_id=<?php echo $rowSearch['id'];?>" onclick="return confirm('Are you want to delete ?');" >Delete</a></td>
        </tr>
      </tbody>
  <?php
        //echo $row['name']."<br>";
      }
    echo "</table>";
    }

    else{
  ?>
      <span style="color: brown;">Sorry!Your Searching result for keyword <u style="color: red">"<?php echo $_POST['search']?>"</u> is not found here. Try Another keywords.</span>
  <?php
    }
  }


?>

<!-- Search Option Operation Finish-->

<p>
    <?php
                if(isset($_REQUEST['editId'])){
                echo '<b style="color:green">Your operation is applied successfully!</b>';
              }
              if(isset($_REQUEST['delete_id'])){
                echo '<b style="color:green">Your operation is applied successfully!</b>';
              }

          ?>
</p>

   
 

            <div class="row">
        

                <div class="col"> 
                    <table class="table table-hover table-light">
                        <thead>
                          <tr>
                            <th class="hideInSmall">Sl.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Dept/Section</th>
                            <th class="hideInSmall">Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

        <?php
          if (isset($_COOKIE['currentUser'])) {
            //$currentUserTarget = $_COOKIE['currentUser'];

            //$query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
            $query = "SELECT * FROM users";
            $run_query = mysqli_query($connect,$query);

            if ($run_query==true) {
              $i = 1;
              while($data = mysqli_fetch_array($run_query)){ ?>

                    <tbody>
                      <tr>
                      <th class="hideInSmall" scope="row"><?php echo $i;$i++;?></th>
                      
                      <td> <?php echo $data['fname'];?> </td>
                      <td> <?php echo $data['lname'];?> </td>
                      <td> <?php echo $data['email_addr'];?> </td>
                      <td> <?php echo $data['dept_section'];?> </td>
                      
                      <td class="hideInSmall"><img src="avatar/<?php echo $data['avatar']?>" alt='Pic'> </td>
                      <td><?php echo $data['status'];?></td>
                      <td><a onclick="return confirm('Are you sure?');" href="allusers.php?editId=<?php echo $data['id']?>">Status</a> | <a onclick="return confirm('Are you sure to delete?');" href="allusers.php?delete_id=<?php echo $data['id']?>">Delete</a> </td>

                    </tr>

                     </tbody>



    <?php }   } }  ?>
 
                      </table>
 

                </div>
            </div>
            
            
        </div>
    </section>


 <!-- Header Start -->

  <?php require_once("footer.php")?>