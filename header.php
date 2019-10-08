<?php 
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
 
    </style>

    <nav class="navbar sticky-top navbar-expand-lg nav-fill navbar-dark" style="background-color: #5AA6FC;font-size: 13px;padding-top:5px;padding-bottom:5px"">
        
        <a class="navbar-brand" href="index.php"style="font-size: 15px;">CSTEAM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a class="nav-link" href="viewQuestions.php" >Questions</a>
                    </li>                    
               


                    <?php
                    if (session_status() != PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                    if(isset($_SESSION['userName'])) { ?> 

                        <li class="nav-item">
                            <a class="nav-link" href="upQuestionsPage.php">Post</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="stackOverFlow.php">Developer Survey</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="info.php">About Q/A</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="club.php">Club</a>
                    </li>
                </ul>
        
		<ul class="navbar-nav justify-content-end">          
            <?php
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            if(isset($_SESSION['userName'])) { ?>

                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                    <i class="fas fa-user mr-3"></i><?php
                    echo ($_SESSION['userName']);
                     ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>

            <?php }else { ?>

                <li class="nav-item">
                    <a class="nav-link" href="loginPage.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registerPage.php">Register</a>
                </li>

            <?php } ?>       
		</ul>
    </div>
</nav>
</head>
<body style= "background-image: url('pics/csteam.jpg');background-position: left top; background-size: cover; background-repeat: repeat; background-attachment: fixed;">

   