<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$Cust_Det = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id =$q"));
echo '<input name=reciever_address type=text id=reciever_address    value='.$Cust_Det[0].' class=large  tabindex=7>';
?> 