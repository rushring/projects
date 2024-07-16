<?php

class loginmodule{
    
    function loginCredentials($username, $password){ // creating a function with two parameters
        
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user u, login l WHERE l.u_id=u.u_id AND l.username = '$username' AND l.password = '$password'";
        $result = $con->query($sql);
        return $result;
        
    }
    
    function loginLog($log_ip,$user_id){ // creating a function with two parameters
        
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO login_log VALUES ('', NOW(), '', '$log_ip', 'In', '$user_id')";
        $result = $con->query($sql);
        $login_log_id = $con -> insert_id;
        return $login_log_id;
        
    }
    
        function updateLogout($login_log_id){ // creating a function with two parameters
        
        $con = $GLOBALS['con'];
        $sql = "UPDATE login_log SET logout_date_time = NOW(), login_status = 'OUT' WHERE login_log_id='$login_log_id'";
        $result = $con->query($sql);
        $login_log_id = $con -> insert_id;
        return $login_log_id;
        
    }
}

?>
