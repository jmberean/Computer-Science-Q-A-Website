<?php
session_start();
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$userName=($_POST['userName']);
$fName=($_POST['firstName']);
$lName=($_POST['lastName']);
$password=($_POST['password']);
$password2=($_POST['password2']);  

$sql = "SELECT * FROM csteamUsers WHERE userName = '$userName'";
$result=$conn->query($sql);
if($result){
  if( mysqli_num_rows($result) > 0){
    $_SESSION['message']="Sorry, the username ".$userName." is already taken!";
    header("location:registerPage.php");
  } 
  else {
    if($password==$password2) {           
      $password=md5($password); //hash password before storing for security purposes
      $sql="INSERT INTO csteamUsers(userName, password,firstName,lastName ) VALUES('$userName','$password','$fName','$lName')"; 
      if ($conn->query($sql) === TRUE) {
      $_SESSION['message']="You are now registered."; 
      $_SESSION['userName']=$userName;
      header("location:profile.php");  //redirect home page
      } 
    }
    else {
      $_SESSION['message']="The two passwords do not match.";   
      header("location:registerPage.php");
    }
  }
}
?>


