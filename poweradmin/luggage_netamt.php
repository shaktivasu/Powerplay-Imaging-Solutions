<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = intval($_GET['q1']);;
echo '<span class=day_bk_menu_selct> <input name=particular_amount type=hidden id=particular_amount  value='.$q.'  maxlength=50  class=large >'.number_format($q,2).'</span>';
echo '<span class=day_bk_menu_selct> <input name=luggage_amount type=hidden id=luggage_amount  value='.$q1.'  maxlength=50  class=large >'.number_format($q1,2).'</span>';
?> 