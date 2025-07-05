<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
mysql_select_db($database_objConn, $objConn);
$query_get_customer_orders = "SELECT * FROM power_orders WHERE user_code = ".$_GET['cid'];
$get_customer_orders = mysqli_query($objConn,$query_get_customer_orders, $objConn) or die(mysql_error());
$row_get_customer_orders = mysql_fetch_assoc($get_customer_orders);
$totalRows_get_customer_orders = mysqli_num_rows($get_customer_orders);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/checkForm.js"></script>
</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="25" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="94%" height="20" align="left" valign="middle">&nbsp;</td>
                  <td width="6%" align="right" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="middle"><?php include_once('inc_report_navigation.php');?></td>
                  <td align="right" valign="middle"><a href="report_customer.php" class="add_delete">Back</a></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="middle" class="pagehead">Customer wise Sales Report</td>
                  </tr>
            </table></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="5" colspan="2" align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#E3C277">
              <?php if($totalRows_get_customer_orders) {
			  	do {
				?>
                <tR><td colspan="3" bgcolor="#FFFFFF">&nbsp;</td></tR>
              <tr bgcolor="#FFFFFF">
              	<td colspan="3">
              		<fieldset>
                    <legend><a href="order_details.php?id=<?php echo $row_get_customer_orders['order_id'];?>"><?php echo $row_get_customer_orders['order_code'];?></a></legend>
                    	<table align="center" cellpadding="2" cellspacing="2" width="80%" border="0">
                        	<tr>
                            	<td></td>
                                <td width="15%">Date : <?php echo Date_SQL_JS($row_get_customer_orders['order_date']);?></td>
                                <td width="15%">&nbsp;</td>
                        	</tr>
                            <?php 
							//gget the produst
							mysql_select_db($database_objConn, $objConn);
							$query_get_order_detail = "SELECT * FROM power_orderchild WHERE order_id = ".$row_get_customer_orders['order_id'];
							$get_order_detail = mysqli_query($objConn,$query_get_order_detail, $objConn) or die(mysql_error());
							$row_get_order_detail = mysql_fetch_assoc($get_order_detail);
							$totalRows_get_order_detail = mysqli_num_rows($get_order_detail);
							if($totalRows_get_order_detail) {?>
  <tr>
                                <td width="37%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead"> Product Name</td>
                                <td width="15%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Purchase Quantity</td>                                
                                <td width="15%" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Price</td>
  </tr>
                            <?php
								do {
							?>
                            <tr>	
                            	<td align="left" valign="middle" bgcolor="#f9f2e2"><?php echo $row_get_order_detail['name'];?></td>
                                <td align="left" valign="middle" bgcolor="#f9f2e2"><?php echo $row_get_order_detail['qty'];?></td>
                                <td align="left" valign="middle" bgcolor="#f9f2e2"><?php echo "INR ".round($row_get_order_detail['inr_litem_total'], 2);?></td>
                            </tr>
                            <?php 
								} while($row_get_order_detail = mysql_fetch_assoc($get_order_detail));?>
                             <tr>
                             	<td colspan="2" bgcolor="#f9f2e2">Sub Total</td>
                                <td bgcolor="#f9f2e2">INR <?php echo round($row_get_customer_orders['sub_total'],2);?></td>
                             </tr>  
                              <tr>
                             	<td colspan="2" bgcolor="#f9f2e2">Shipping Charges</td>
                                <td bgcolor="#f9f2e2">INR <?php echo round($row_get_customer_orders['ship_rate'],2);?></td>
                             </tr>  
                              <tr>
                             	<td colspan="2" bgcolor="#f9f2e2">Banking Charges</td>
                                <td bgcolor="#f9f2e2">INR <?php echo round($row_get_customer_orders['bank_charge'],2);?></td>
                             </tr>  
                              <tr>
                             	<td colspan="2" bgcolor="#f9f2e2">Tax</td>
                                <td bgcolor="#f9f2e2">INR <?php echo round($row_get_customer_orders['tax_rate'],2);?></td>
                             </tr>  
                              <tr>
                             	<td colspan="2" bgcolor="#f9f2e2">Grand Total</td>
                                <td bgcolor="#f9f2e2">INR <?php echo round($row_get_customer_orders['order_amt'],2);?></td>
                             </tr>   
                            <?php    
							}
							?>
                        </table>
                    </fieldset><br />

              	</td>
              </tr>
              <tr>
              
              <?php 
			  	} while($row_get_customer_orders = mysql_fetch_assoc($get_customer_orders));
			  } ?>
            </table></td>
            <td align="right" valign="top"><?php //include_once('inc_right_panel.php');?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php include("includes/footer.php");?> </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>

</html>
