<?php
session_start();
if( isset($_SESSION['userName'])){
  header("location:profile.php");// ithink its this so username is set
  die();
}
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if($conn){
  $userName=($_POST['userName']);
  $password=($_POST['password']);
  $password=md5($password); //Remember we hashed password before storing las t time

  $sql="SELECT * FROM csteamUsers WHERE userName ='$userName' AND password ='$password'";
  $result=$conn->query($sql);
  $result = mysqli_query($conn, $sql); 

  if ($result && mysqli_num_rows($result) > 0) {
    $_SESSION['message']="You are now logged in.";
    $_SESSION['userName']=$userName;
    header("location:profile.php");
  }else{
    $_SESSION['message']="Username or password incorrect.";
    header("location:loginPage.php");
  }
}
?>
