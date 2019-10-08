<?php session_start(); ?>
<?php 
if(isset($_SESSION['userName'])){
header("location:profile.php");
die();
}
?>
<?php require_once('header.php'); ?>

<div style="padding-right:20%;padding-left:20%">
<div class="container" style="margin-top:10px;background-color:WHITE;padding:30px;padding-top:10px;border-radius: 15px">
<h1 class="display-4" style="font-size:30px">Login</h1>
        <p class="lead"style="font-size:20px">Please login with your username and password below.</p>

        <?php
    if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-primary" role="alert" style="font-size:15px">
      <?php
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      ?>
    </div>      
    <?php      
        unset($_SESSION['message']);
    }
    ?>



        <hr class="my-4">
        <div class="container" >
                   
        <form method="post" action="login.php">
        <div class="form-group">
          <label for="exampleInputUsername" style="font-size:15px;font-weight:bold">Username</label>
          <input style="font-size:15px"type="username" name = "userName" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter username"required="required"minlength=4 maxlength=12>
        </div>
        <div class="form-group">
          <label style="font-size:15px;font-weight:bold"for="exampleInputPassword1">Password</label>
          <input style="font-size:15px"type="password" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required="required" minlength=8>
        </div>

        <button style="font-size:15px" type="submit" class="btn btn-primary">Submit</button>


        </form>
</div>
</div>
</div>
<?php include 'footer.php';?>

