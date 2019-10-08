<?php include 'header.php';?>

<div class="container" style="margin-top:10px;background-color:WHITE; padding: 30px;padding-top:10px;border-radius: 15px">
<h1 class="display-4" style ="text-align: center;font-size:40px">About Q/A</h1>
        <CENTER>

        <p class="lead" style="font-size:20px">CSTEAM developers bring you the platform to post and answer questions regarding CS1 and CS2.<br></p>



        <?php
        if(isset($_SESSION['userName'])) { ?> 

        <p style="font-size:15px">Great you're registered! You may now start answering and posting questions! <br>Please remember to adhere to the SUNY New Paltz Academic Policies and Procedures! </p>
        <CENTER>
                <a class="btn btn-primary btn-md" style ="display:inline-block;font-size:15px" href="viewQuestions.php" role="button">Questions</a>
                <a class="btn btn-primary btn-md" style ="display:inline-block;font-size:15px" href="upQuestionsPage.php" role="button">Post</a>
                </CENTER>

        <?php } else{ ?>

        <p  style="font-size:15px">To begin, simply login or create an account to start posting/answering questions!<br>
        Please remember to adhere to the SUNY New Paltz Academic Policies and Procedures! See below. </p>
               <CENTER>
                <a class="btn btn-primary btn-md" style ="display:inline-block;font-size:15px" href="loginPage.php" role="button">Login</a>
                <a class="btn btn-primary btn-md" style ="display:inline-block;font-size:15px" href="registerPage.php" role="button">Register</a>
                </CENTER>

        <?php }?>
        </CENTER>

        <hr class="my-4">
        <div style="font-size:15px">
              <h2 style="font-size:30px;text-align:center">Important Disclaimer</h2>
              <p style="text-align:center">We require students to use this website responsibly to help each other.</p>
              <br>

        <h2 style="font-size:20px">Academic Policies and Procedures » Academic Integrity</h2>
       <p style="font-style: italic"> <span>&#8220;</span>Students are expected to maintain the highest standards of honesty in their college work. Cheating, forgery, and plagiarism are serious violations of academic integrity. Students found guilty of any violation of academic integrity are subject to disciplinary action, up to and including expulsion.

<br><br>Ignorance of the academic integrity policies does not constitute a defense. It is the student's responsibility to understand and to adhere to this policy.<span>&#8220;</span>  </p>
<a href="https://www.newpaltz.edu/ugc/policies/policies_integrity.html"target="_blank">Click here for SUNY New Paltz POLICIES: ACADEMIC INTEGRITY</a>

     
</div>
</div>

<?php include 'footer.php';?>


