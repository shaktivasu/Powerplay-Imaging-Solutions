<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$q = intval($_GET['q']);
$q1 = intval($_GET['q1']);
$q2 = intval($_GET['q2']);
$q3 = intval($_GET['q3']);
//echo $q;
echo '<table width=50% height=81 border=0 align=right cellpadding=0 cellspacing=0 >
			     <tr>
			      
			       <td></td>
			       <td>&nbsp;</td>
			       </tr>
			     <tr>
			       <td height=33 class=new_title>Total Quantity</td>
			       <td><div id=txttransQTY>
			         <input name=tot_qty type=hidden id=tot_qty  value='.number_format($q3,2).' maxlength=50  class=large><span class=new_title>
			         '.number_format($q3,2).'</span></div></td>
		          </tr>
			     <tr>
			       <td height=33 class=new_title>Total Fright Charges</td>
			       <td><div id=txttransHint>
			         <input name=particular_amount type=hidden id=particular_amount  value='.number_format($q3,2).' maxlength=50  class=large><span class=new_title>
			         '.number_format($q2,2).'</span></div></td>
			       </tr>
			     <tr>
			       <td width=19% height=33 class=new_title>Loading Charges</td>
			       <td width=19%><div id=txtluggage>
			         <input id=luggage_amount name=luggage_amount type=hidden  value='.number_format($q3,2).' maxlength=50  class=large /><span class=new_title>
			         '.number_format($q,2).'</span></div></td>
			       </tr>
                   	
 					<tr>
			       <td width=19% height=33 class=new_title>Unloading Charges</td>
			       <td width=19%><div id=txtluggage1>
			         <input id=unluggage_amount name=unluggage_amount type=hidden  value='.number_format($q3,2).' maxlength=50  class=large /><span class=new_title>
			         '.number_format($q1,2).'</span></div></td>
			       </tr>
			     </table>';
?> 