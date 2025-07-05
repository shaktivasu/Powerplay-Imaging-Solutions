<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = intval($_GET['q1']);
$s =$q+$q1;
$l_c = $s *10 /100;
$ul_c = $s *5 /100;
$tax_c = ($s+$l_c+$ul_c) *5 /100;
//echo '<input name=particular_amount type=hidden id=particular_amount  value='.$q.'  maxlength=50  class=large >'.number_format($q,2).'<input name=luggage_amount type=hidden id=luggage_amount  value='.$q1.'  maxlength=50  class=large >'.number_format($q1,2);
echo 'Total Fright Charges &nbsp;&nbsp;&nbsp;:&nbsp;<input name=particular_amount type=hidden id=particular_amount  value='.$q.'  maxlength=50  class=large >₹ <span class=new_title>'.number_format($q,2).'</span>';

                   echo ' <br><br>Loading Charges &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name=luggage_amount type=hidden id=luggage_amount  value='.$l_c.'  maxlength=50  class=large ><span class=new_title>₹ '.number_format($l_c,2).'</span> <br><br>Unloading Charges&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name=unluggage_amount type=hidden id=unluggage_amount  value='.$ul_c.'  maxlength=50  class=large ><span class=new_title>₹ '.number_format($ul_c,2).'</span><br><br>SGST+CGST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name=unluggage_amount type=hidden id=unluggage_amount  value='.$ul_c.'  maxlength=50  class=large ><span class=new_title>₹ '.number_format($tax_c,2).'</span><br><br>Grand Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name=unluggage_amount type=hidden id=unluggage_amount  value='.$ul_c.'  maxlength=50  class=large ><span class=new_title>₹ '.round($q+$l_c+$ul_c+$tax_c).'</span></td></tr>';


?> 
