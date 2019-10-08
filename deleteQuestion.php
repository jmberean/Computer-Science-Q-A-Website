<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET["id"])){
    
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM csteamResponses WHERE qID = '$id'";
    $result=$conn->query($sql);
    if($result){
        $sql = "DELETE FROM csteamResponses WHERE qID ='$id'";
        $conn->query($sql);
    }
    
    $sql = "SELECT * FROM csteamQuestions WHERE ID ='$id'";
    $result=$conn->query($sql);
    if($result){
        $sql = "DELETE FROM csteamQuestions WHERE ID ='$id'";
        $result = $conn->query($sql);
    } 
    
    if($result){
        session_start();
         $_SESSION['message']="Record deleted successfully."; 
         header("location:profile.php");  //redirect home page
    } else {
        session_start();
        $_SESSION['message']="Error deleting record: " . $conn->error; 
       header("location:profile.php");  //redirect home page
    }
}  
else {
    session_start();
    $_SESSION['message']="Error deleting record: "; 
    header("location:profile.php");  //redirect home page
    exit();
}


$conn->close();
?>