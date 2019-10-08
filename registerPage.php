<?php
if(isset($_SESSION['userName'])){
header("location:profile.php");// ithink its this so username is set
die();
}
?>
<?php include 'header.php';?>

<div style="padding-left:20%;padding-right:20%;padding-top:10px">
<div class="container" style="background-color:WHITE; padding: 30px;padding-top:10px;border-radius: 15px">
        <h1 class="display-4"style="font-size:30px">Register</h1>

        <p class="lead"style="font-size:20px">Please register with a unique username and password below.<br>
        </p>
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
                   
        <form method="post" action="register.php" autocomplete="off">
        

        <div class="row">
          <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1"style="font-size:15px;font-weight:bold">First Name </label>
                <input style="font-size:15px"required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(Required) maximum length (10)" name="firstName"maxlength="10">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label style="font-size:15px;font-weight:bold"for="exampleInputEmail1">Last Name  </label>
                <input style="font-size:15px"required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(Required) maximum length (15)" name="lastName"maxlength="15">
            </div>
          </div>
        </div>

        <div class="form-group">
                <label style="font-size:15px;font-weight:bold"for="exampleInputEmail1">Username </label>
                <input style="font-size:15px"required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" minlength="4"maxlength="12" placeholder="Enter unique username (Required) minimum length (4) maximum length (12)" name="userName">
            </div>

        <div class="row">
          <div class="col">
          <div class="form-group">
                <label style="font-size:15px;font-weight:bold"for="exampleInputPassword1">Password</label>
                <input style="font-size:15px"required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="Min-length (8) max-length (15)" name="password" minlength="8"maxlength="15">
              </div>
          </div>
          <div class="col">
          <div class="form-group">
                <label style="font-size:15px;font-weight:bold"for="exampleInputPassword1">Confirm Password</label>
                <input style="font-size:15px"required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-enter password (Required)" name="password2" minlength="8"maxlength="15">
              </div>
          </div>
        </div>
           

              
             

<div style="font-size:15px">
              <hr class="my-4">
              <h2 style="font-size:30px;text-align:center">Important Disclaimer</h2>
              <p style="text-align:center">We require students to use this website responsibly to help each other.</p>

<br>
              <h2 style="font-size:20px">Academic Policies and Procedures » Academic Integrity</h2>
                <p style="font-style: italic"> <span>&#8220;</span>Students are expected to maintain the highest standards of honesty in their college work. Cheating, forgery, and plagiarism are serious violations of academic integrity. Students found guilty of any violation of academic integrity are subject to disciplinary action, up to and including expulsion.

              <br><br>Ignorance of the academic integrity policies does not constitute a defense. It is the student's responsibility to understand and to adhere to this policy.<span>&#8220;</span>  </p>
              <a href="https://www.newpaltz.edu/ugc/policies/policies_integrity.html"target="_blank">Click here for SUNY New Paltz POLICIES: ACADEMIC INTEGRITY</a>
              <hr class="my-4">

              <div class="form-check" style="padding-bottom:20px">
                <input required="required" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                I have read and agree to the Terms
                </label>
              </div>


            <button type="submit" name="register_btn" class="Register btn btn-primary">Submit</button>
            </div>

          </form>

          </div>
          </div>
          </div>

<?php include 'footer.php';?>


