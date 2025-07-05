<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = $_GET['q1'];
$Cust_Det = mysqli_fetch_row(mysqli_query($objConn,"select * from power_customers where id =$q"));
if($Cust_Det[3]!='')
echo '<input name=sender_id type=hidden id=sender_id  value='.$q.'  maxlength=50  class=large > <input name=sender_phone type=text id=sender_phone  value='.$Cust_Det[2].'  maxlength=50  class=large ><br><br><input name=sender_address type=text id=sender_address  value='.$Cust_Det[3].'  maxlength=50  class=large >';
else
echo '<input name=sender_id type=hidden id=sender_id  value='.$q.'  maxlength=50  class=large > <input name=sender_phone type=text id=sender_phone  value='.$Cust_Det[2].'  maxlength=50  class=large ><br><br><input name=sender_address type=text id=sender_address   maxlength=50  class=large >';
?> 