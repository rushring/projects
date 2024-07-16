<?php

//error_reporting(0); //turn off error reporting

//start the session
if(!isset($_SESSION)){
    session_start();
}

$userdetails = $_SESSION['bimsuserdetails'];

if(!$_SESSION['bimsuserdetails']){
    
    $msg = "please login first";
    $msg = base64_encode($msg);
    header("Location:login.php?msg=$msg");
    die;
}

?>


<html>
    <head>
        <title>BIMS - Login</title>
    </head>
    
    <body>
        <h4> Welcome <?php echo $userdetails['f_name'].' '.$userdetails['l_name']; ?> to the BIMS - Home Page </h4>
        <a href="logout.php"><button type="button"> Log Out </a>
    </body>
</html>



