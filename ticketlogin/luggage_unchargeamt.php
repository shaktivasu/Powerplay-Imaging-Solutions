<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = 0;
$s =$q+$q1;
echo ' <input name=unluggage_amount type=hidden id=unluggage_amount  value='.$s.'  maxlength=50  class=large ><span class=new_title>'.number_format($s,2).'</span>';
?> 