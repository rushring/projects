<?php

class loginmodule{
    
    function loginCredentials($username, $password){ // creating a function with two parameters
        
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user u, login l WHERE l.u_id=u.u_id AND l.username = '$username' AND l.password = '$password'";
        $result = $con->query($sql);
        return $result;
        
    }
    
}

?>
