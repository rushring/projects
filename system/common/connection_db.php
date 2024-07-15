<?php

class connection_db{ // class for database connetion
    
/*function for database connection    
    for the system*/
    
    function connect(){
        $h = "localhost";
        $u = "root";
        $p = "";
        $dbn = "bmis";
        
        $conn = new mysqli($h,$u,$p,$dbn);
        
        return $conn;
    }
    
}

$conobj = new connection_db();
$con = $conobj->connect();

?>

