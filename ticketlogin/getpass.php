<?php
//get the q parameter from URL
$q=md5($_GET["q"]);
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$par="select password from power_admin where password = '".$q."'";
$par1=mysqli_query($objConn,$par);
$par3=mysqli_num_rows($par1);
if($par3){
	$response="exist";
} else {
	$response="notexist";
}

//output the response
echo $response;
?>