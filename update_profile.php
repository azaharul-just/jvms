 <?php 

if (!isset($_COOKIE['currentUser'])) {
    
    header("location: login.php");
}


?> 
<?php require_once("header.php");?>



<section id="Update_profile_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title"> <i class="fa fa-user"></i> Update profile </h2>
                <hr>

                <?php
                    if (isset($_REQUEST['edited'])) {
                        echo '<span style="color:green;">'.$_REQUEST['edited'].'</span>';

                    }

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="profile.php" class="btn btn-info"> Go Back </a>
            </div>
        </div>


        <?php
                    if (isset($_COOKIE['currentUser'])) {
                        $currentUserTarget = $_COOKIE['currentUser'];

                        $query = "SELECT * FROM users WHERE auth='$currentUserTarget'";
                        $run_query = mysqli_query($connect,$query);

                        if ($run_query==true) {
                            while($getRow = mysqli_fetch_array($run_query)){?>






        <form action="update_profile_core.php" method="POST">
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold">First name</label>
                        <input type="text" name="fname" value="<?php echo $getRow['fname'];?>" class="form-control" required="1" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Last name</label>
                        <input type="text" name="lname" value="<?php echo $getRow['lname'];?>" class="form-control" required="1" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="text" name="useremail" value="<?php echo $getRow['email_addr'];?>" class="form-control" required="1"  placeholder="Email">
                    </div>
                    <input type="submit" class="form-control btn btn-info my-2" name="updateButton" value="Update Profile">
                </div>
            </div>
        </form>


            <?php   }}} ?>
    </div>
</section>




 <!-- Header Start -->

  <?php require_once("footer.php")?>