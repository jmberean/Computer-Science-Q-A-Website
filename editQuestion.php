<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();
$id = $_SESSION['id'];
$userID = $_SESSION['userName'];
$data =  mysql_real_escape_string($_POST['data']);
$subject = mysql_real_escape_string($_POST['subject']);
$point = mysql_real_escape_string($_POST['point']);
$topic = mysql_real_escape_string($_POST['topic']);

$sql="UPDATE csteamQuestions SET subject = '$subject',data = '$data',topic = '$topic',point = '$point'  WHERE ID='$id'"; 

if ($conn->query($sql) === TRUE) {
    $_SESSION['message']="Question has been updated"; 
    header("location:vSingle.php?id=$id");  //redirect home page
} else {
    $_SESSION['message']="Question has not been updated"; 
    header("location:vSingle.php?id=$id");  //redirect home page
}
$conn->close();
?>
