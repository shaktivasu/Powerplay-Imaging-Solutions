<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php 
//if the orders transaction result is failure then delete that orders
$deleteSQL1 = sprintf("DELETE FROM power_orders WHERE transaction_result = 'Failure'");
mysql_select_db($database_objConn, $objConn);

$Result1 = mysqli_query($objConn,$deleteSQL1, $objConn) or die(mysql_error());

//if the order status is new and the order date is less than today date then delete it too
$today_date = date('Y-m-d');
//echo $today_date;

$deleteSQL2 = sprintf("DELETE FROM power_orders WHERE order_date < '".$today_date."' AND transaction_result = 'New'");
mysql_select_db($database_objConn, $objConn);

$Result2 = mysqli_query($objConn,$deleteSQL2, $objConn) or die(mysql_error());

?>