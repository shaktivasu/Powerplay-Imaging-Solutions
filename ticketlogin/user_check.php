<?php
//get the q parameter from URL
$q=$_GET["q"];
include_once('Connections/objConn.php');
$par="select usermail from power_user where user_mailid = '".$q."'";
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