<?php

//error_reporting(0); //turn off error reporting

include '../../../common/connection_db.php';
include '../model/loginmodel.php';


//start the session
if(!isset($_SESSION)){
    session_start();
}

$userdetails = $_SESSION['bimsuserdetails'];
$login_log_id = $_SESSION['bimsloginlogid'];

$loginobj = new loginmodule();

$loginobj->updateLogout($login_log_id);

if(!$_SESSION['bimsuserdetails']){
    
    $msg = "please login first";
    $msg = base64_encode($msg);
    header("Location:login.php?msg=$msg");
    die;
}

unset($_SESSION['bimsuserdetails']);
unset($_SESSION['bimsloginlogid']);

$msg = "You are successfully log out from the system";
$msg = base64_encode($msg);
header("refresh:3,url=login.php?msg=$msg");

?>



<html>
    <head>
        <title>BIMS - Login</title>
    </head>
    
    <body>
        <h4 style = "color: red"> Hi <?php echo $userdetails['f_name'].' '.$userdetails['l_name']; ?> You are successfully log out from the system</h4>
        <h5 style = "color: green">You will redirect to the home page within 3 seconds</h5>
    </body>
</html>
