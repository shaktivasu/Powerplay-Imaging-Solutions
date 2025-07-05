<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
mysql_select_db($database_objConn, $objConn);
$query_get_customers = "SELECT power_user.user_name, power_orders.user_code FROM power_orders INNER JOIN (power_user) ON (power_user.user_serialno = power_orders.user_code) GROUP BY user_code";
$get_customers = mysqli_query($objConn,$query_get_customers, $objConn) or die(mysql_error());
$row_get_customers = mysql_fetch_assoc($get_customers);
$totalRows_get_customers = mysqli_num_rows($get_customers);
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
                  <td align="right" valign="middle"><a href="reports.php" class="add_delete">Back</a></td>
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
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#E3C277">
              <tr>
                <td width="37%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead"> Customer Name</td>
                <td width="15%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Total Amount</td>
                <td width="14%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Action</td>
              </tr>
              <?php if($totalRows_get_customers) {
			  	do {
				?>
              <tr>
                <td align="left" valign="middle" bgcolor="#f9f2e2" ><?php echo $row_get_customers['user_name']?></td>
                <td align="center" valign="middle" bgcolor="#f9f2e2" class="tabletext" ><?php echo "INR ".round(Get_Customer_Order_Amout($row_get_customers['user_code']), 2);?></td>
                <td align="center" valign="middle" bgcolor="#f9f2e2"  <?php echo $bg?>><a href="report_customer_details.php?cid=<?php echo $row_get_customers['user_code'];?>" class="add_delete">View</a></td>
              </tr>
              <?php 
			  	} while($row_get_customers = mysql_fetch_assoc($get_customers));
			  } else {?>
              	<tr>
                	<td colspan="3" class="message">Report not found.</td>
                </tr>
              <?php } ?>
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
