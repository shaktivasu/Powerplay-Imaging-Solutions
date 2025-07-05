<?php $hostname_objConn = "localhost";
$database_objConn = "powerplayimasolu_data";
$username_objConn = "powerplayimasolu_user1";
$password_objConn = "Ru5JiYd@h3io";

$objConn = mysqli_connect($hostname_objConn, $username_objConn, $password_objConn) or die("Unable to Connect to '$hostname_objConn'");
mysqli_select_db($objConn,$database_objConn);
?>