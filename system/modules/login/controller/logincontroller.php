<?php

//start the session
if(!isset($_SESSION)){
    session_start();
}

include '../../../common/connection_db.php';
include '../model/loginmodel.php';

$loginobj = new loginmodule();

echo "<h4> This is Login Controller </h5>";

echo $username=$_POST['username']; //create a variable and asssigned the value POST method returned
echo "<br>";

echo $password=$_POST['password'];  //create a variable and asssigned the value POST method returned
echo "<br/>";

echo $passworde = sha1($password);
echo "<br/>";

$resultcredentials = $loginobj->loginCredentials($username, $passworde);

echo $crednor = $resultcredentials->num_rows;
echo "<br/>";

$recordcred = $resultcredentials->fetch_assoc(); //you can use fetch_array()

//echo $f_name= $recordcred['f_name'];
//echo "<br/>";
//
//echo $l_name=$recordcred['l_name'];
//echo "<br/>";
//
//echo $dob=$recordcred['dob'];
//echo "<br/>";


if ($username == '' OR $password = ''){
    echo 'Condition 01- Username and/or password fields are empty';
    
    $msg = "Username and/or password fields are empty/"; // description of the redirection
    $msg = base64_encode($msg);
    header("Location:../view/login.php?msg=$msg"); //redirect the page
}
elseif ($crednor !=0 ) {

    // Function to get the IP address of the client
    function get_ip_address() {
        // Initialize the IP address variable
        $ip_address = '';

        // Check for shared internet/ISP IP
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        // Check for IP behind a proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Check for IP from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        // Return the IP address
        return $ip_address;
    }
    
    $log_ip= get_ip_address();
    
    $user_id = $recordcred['u_id'];
    
    $login_log_id = $loginobj->loginLog($log_ip, $user_id);
    
    $_SESSION['bimsuserdetails']=$recordcred;
    
    $_SESSION['bimsloginlogid']=$login_log_id;
    
    header("Location:../view/home1.php"); //redirect the page
    
}
else{
    $msg = "Please enter the correct username and/or password"; // description of the redirection
    $msg = base64_encode($msg);
    header("Location:../view/login.php?msg=$msg"); //redirect the page
}
?>
