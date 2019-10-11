<?php require_once('header.php'); 
if(!isset($_GET["id"])){
  header("Location: ./viewQuestionsPage.php");
  exit();
} else {
  $id = $_GET["id"];
  $_SESSION["id"] = $id;
}
?>
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container" style="margin-top:10px;background:WHITE;border-radius:10px;padding:15px;font-size:13px">

<?php
    if(!isset($_SESSION['userName'])){
    ?>
    <div class="alert alert-primary" role="alert">
      <?php
      echo "Login or register to reply.";
      ?>
    </div>      
    <?php      
        unset($_SESSION['message']);
    }
    ?>


<?php
    if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-primary" role="alert">
      <?php
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      ?>
    </div>      
    <?php      
        unset($_SESSION['message']);
    }
    ?>
  <div class="row justify-content-md-center" >

  <?php
    if(isset($_SESSION['userName'])){
    ?>

<div class="col-md-auto" style="padding-right:0px;margin-right:0px">
      <div class="btn-group-vertical">

        <?php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(isset($_SESSION['userName'])) {
        $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
        $conn = new mysqli($servername, $sqlusername, $password, $dbname);
        $userName = $_SESSION['userName'];
        $id = $_SESSION['id'];
        if($conn) {        
          $sql = "SELECT * FROM csteamQuestions WHERE userID = '$userName' AND  ID = '$id'";
          $result=$conn->query($sql);
          $result = mysqli_query($conn, $sql); 
          if ($result && mysqli_num_rows($result) > 0 || $_SESSION['userName'] == 'bereanj1') 
          {
        ?> 
      <a class="btn btn-primary" href="editQuestionPage.php" role="button" style="font-size:15px">Edit</a>

<?php 
      echo '
      <a class="btn btn-primary" href="deleteQuestion.php?id='.$id.'" role="button" style="font-size:15px">Delete</a>
        '; }}} ?>

        <?php
          if (session_status() != PHP_SESSION_ACTIVE) {
              session_start();
          }
          if(isset($_SESSION['userName'])) {
        ?>     

        <a class="btn btn-primary" href="#middle" role="button" style="font-size:15px">Respond</a>

        <?php } ?>

      </div>
    </div>


    
    <?php      
    }
    ?>

   

    <div class="col">
      <div class="container">


      <?php
            $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
            $conn = new mysqli($servername, $sqlusername, $password, $dbname);
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM csteamQuestions WHERE ID ='$id'";
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc()
            ?>

        <div class="card">
        <div class="card-header" style="font-size:15px;padding-bottom:5px">

        <h6 class="card-subtitle mb-2 text-muted" style="font-size:15px">
        <i class="fas fa-user mr-3"></i>
         <?php echo $row["userID"];?>  
         <!-- <i class="fa fa-university mr-3" style="margin-left:30px"></i>  -->
         <i class="fas fa-code mr-3"style="margin-left:30px"></i>
         <?php echo $row["subject"];?>

         

         <div style="float:right">  <i class="fas fa-clock mr-3" ></i> <?php 
          date_default_timezone_set("America/New_York");
          $date = date_create($row["dateTime"]);
           echo date_format($date, 'h:i A - m/d/Y');?> 
         </div>
         <br>
         <hr class="my-2">
          <i class="fas fa-thumb-tack mr-3"></i>
         <?php echo $row["topic"];?>

         </h6>
        </div>
        
          <div class="card-body">

          <dl class="row">
        <dt class="col-sm-2.5"style="font-size: 20px;margin-left:20px;padding:0px">Subject: &nbsp; </dt>
        <dd class="col-sm-9"style="font-size: 20px;margin:0px;padding:0px"><?php echo $row["point"];?></dd>
        </dl>





            <hr class="my-4">

            <p class="card-text" ><?php echo nl2br(htmlspecialchars($row["data"]));  ?></p>
            <div id="middle"></div>

            <?php
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

          </div >
        </div>

      <div class="card" >


      <?php
    if(isset($_SESSION['userName'])){
    ?>

<div class="card-header" style="text-align:center;font-size:15px;font-weight: bold;">
          Respond<i class="fa fa-pencil mr-3" style="margin-left:8px"></i> 

        </div>
      
<div class="container" style="background:WHITE;margin-top:15px;border-radius:15px">
          <div class="container">
            <!-- <p class="lead">Respond.</p>
            <hr class="my-4"> -->

            <form action="response.php" method="POST">


            <div class="form-group" style="margin-bottom:0px">
              <!-- <label for="comment">Response:</label> -->
              <textarea maxlength="5000" style="font-size:15px;" class="form-control" rows="5" id="comment" required="required" name = "data" placeholder="Enter response here (5,000 characters max)"></textarea>
            </div>

              <br><br>    
              <button type="submit" style="margin-bottom:10px;margin-top:0px;float:right;font-size:15px;;cursor: pointer;" class="btn-sm btn-primary btn-md">Submit</button>

            </form> 
          </div>
       </div> 


    <?php } ?>


        <div class="card-header" style="text-align:center;font-size:15px;font-weight: bold;">
          Responses<i class="fas fa-comment mr-3" style="margin-left:8px"></i>
        </div>
      
          <ul class="list-group list-group-flush">

          <?php
          $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
          $conn = new mysqli($servername, $sqlusername, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $sql = "SELECT * FROM csteamResponses WHERE qID = '$id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                ?>


            <li class="list-group-item" style="padding:0px">

            <div class="alert alert-primary" style="margin:10px;padding:15px:font-size:30px;color:black">
            <span style="font-size:15px;font-weight: bold;"><?php 
                  $_SESSION['respondingUserName']=$row["userID"];
                  $_SESSION['responseID']=$row["ID"];
                  echo $row["userID"];
            ?><i class="fa fa-comment-o" style="margin-left:8px"></i>   
                      </span>

            <div style="float:right;"><i class="fa fa-clock-o" ></i><span style="font-weight:bold"> <?php $date = date_create($row["dateTime"]); echo date_format($date, 'h:i A - m/d/Y');?>  </span>
            </div>
            </div>

            <hr class="my-4" style="margin:0px;margin-left:35px;margin-right:35px">

            <div style="padding-bottom:25px;padding-top:0px;padding-left:35px;padding-right:35px">
            <?php 
                  echo nl2br(htmlspecialchars($row["data"]));
            ?>
            </div>
            </li>


            <?php }} else {
                  $_SESSION['message1']="No responses yet.";
              }
              if(isset($_SESSION['message1'])){
              ?>
          <div class="alert alert-primary" role="alert" style="margin-bottom:0px">
              <?php
                echo "<div id='error_msg'>".$_SESSION['message1']."</div>";
                unset($_SESSION['message1']);
              ?>
                </div>
              <?php
              }
              $conn->close();
              ?>

          </ul>
      </div>


    </div>
       </div>


    </div>  
    </div> 

<?php require_once('footer.php'); ?>
