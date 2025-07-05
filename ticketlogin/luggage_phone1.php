<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = $_GET['q1'];
$Cust_Det = mysqli_fetch_row(mysqli_query($objConn,"select cust_phone from power_customers where id =$q"));
if($Cust_Det[0]!='')
echo ' <input name=reciever_id type=hidden id=reciever_id  value='.$q.'  maxlength=50  class=large ><input name=reciever_phone type=text id=reciever_phone  value='.$Cust_Det[0].'  maxlength=50  class=large  tabindex=9><br><br>';
else
echo ' <input name=reciever_id type=hidden id=reciever_id  value='.$q.'  maxlength=50  class=large ><input name=reciever_phone type=text id=reciever_phone  value='.$Cust_Det[0].'  maxlength=50  class=large  tabindex=9><br><br>';
?> 