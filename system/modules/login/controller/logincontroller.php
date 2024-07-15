<?php

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

echo $f_name= $recordcred['f_name'];
echo "<br/>";

echo $l_name=$recordcred['l_name'];
echo "<br/>";

echo $dob=$recordcred['dob'];
echo "<br/>";
?>
