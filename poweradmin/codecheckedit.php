<?php include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php'); ?>
<?php
$q=$_GET["q"];
$id = $_GET['id'];
$par="select code from power_products where code = '".$q."' and id != ".$id;
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