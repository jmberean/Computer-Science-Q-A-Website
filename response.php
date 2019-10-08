<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();

$userID = $_SESSION['userName'];
$id = $_SESSION['id'];
$data = mysql_real_escape_string($_POST['data']);
date_default_timezone_set("America/New_York");

$mysqltime = date('Y-m-d H:i:s');
$sql="INSERT INTO csteamResponses (qID,userID,data,dateTime) VALUES ('$id','$userID','$data','$mysqltime')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['message']="Response has been posted."; 
    header("location:vSingle.php?id=$id");  //redirect home page
} else {
    $_SESSION['message']="Error, response has not been posted."; 
    header("location:vSingle.php?id=$id");  //redirect home page
}


$conn->close();
?>
