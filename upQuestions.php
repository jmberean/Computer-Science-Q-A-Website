<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();

$userID = $_SESSION['userName'];
$data =  mysql_real_escape_string($_POST['data']);
$subject = mysql_real_escape_string($_POST['subject']);
$point = mysql_real_escape_string($_POST['point']);
$topic = mysql_real_escape_string($_POST['topic']);
date_default_timezone_set("America/New_York");

$mysqltime = date('Y-m-d H:i:s');
$sql="INSERT INTO csteamQuestions (userID,data,subject,topic,dateTime,point) VALUES ('$userID','$data','$subject','$topic','$mysqltime','$point')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['message']="Your question for the class ".$subject." regarding ".$topic." has been uploaded."; 
    header("location:profile.php");
} else {
    $_SESSION['message']= "Error posting question: " . $sql . "<br>" . $conn->error; 
    header("location:profile.php");
}

$conn->close();
?>
