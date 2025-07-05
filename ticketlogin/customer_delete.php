<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
		 $up ="delete from power_customers where id = ".$_REQUEST['cust_id'];
		 $up1 = mysqli_query($objConn,$up);
	header("location:customer.php?del=success");

?>