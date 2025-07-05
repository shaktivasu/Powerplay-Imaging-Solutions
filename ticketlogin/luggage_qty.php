<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);

echo ' <input name=tot_qty type=text id=tot_qty  value='.$s.'  maxlength=50  class=large ><span class=new_title>'.number_format($q,2).'</span>';
?> 