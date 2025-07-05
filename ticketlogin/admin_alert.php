<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
include_once('inc_delete_old_order.php');
require_once('../Connections/objConn.php'); 
require_once('inc_functions.php'); 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$start_date = date("d") - 2;
$cur_mont = date("m");
$cur_year = date("Y");

$st_date = $cur_year."-".$cur_mont."-".$start_date;
$ed_date = gmdate("Y-m-d");

mysql_select_db($database_objConn, $objConn);
$query_get_offers = "SELECT offer_id, offer_name, offer_start FROM power_offer WHERE offer_end BETWEEN '".$st_date."' AND '".$ed_date."' ORDER BY offer_end DESC";
$get_offers = mysqli_query($objConn,$query_get_offers, $objConn) or die(mysql_error());
$row_get_offers = mysql_fetch_assoc($get_offers);
$totalRows_get_offers = mysqli_num_rows($get_offers);

$query_stock_detail = "SELECT id, category_id, name, stock, reorder FROM power_products WHERE stock <= reorder";
$stock_detail = mysqli_query($objConn,$query_stock_detail, $objConn) or die(mysql_error());
$row_stock_detail = mysql_fetch_assoc($stock_detail);
$totalRows_stock_detail = mysqli_num_rows($stock_detail);

$query_sales_report = "SELECT power_orders.order_date, power_orderchild.product_id, power_products.name FROM power_orderchild INNER JOIN (power_products, power_orders) ON (power_orderchild.product_id = power_products.id AND power_orders.order_id = power_orderchild.order_id) WHERE MONTH(order_date)=".$cur_mont." GROUP BY product_id";
$sales_report = mysqli_query($objConn,$query_sales_report, $objConn) or die(mysql_error());
$row_sales_report = mysql_fetch_assoc($sales_report);
$totalRows_sales_report = mysqli_num_rows($sales_report);

$query_order_report = "SELECT power_orders.order_id, power_orders.order_code, power_status.name as status_name FROM power_orders INNER JOIN (power_status) ON (power_status.id = power_orders.order_status) WHERE order_status = 1 OR order_status = 4 ORDER BY power_orders.order_date DESC";
$order_report = mysqli_query($objConn,$query_order_report, $objConn) or die(mysql_error());
$row_order_report = mysql_fetch_assoc($order_report);
$totalRows_order_report = mysqli_num_rows($order_report);

$query_b2b_user = "SELECT name, b2b_id, date_added FROM  power_b2b WHERE status = 'Inactive'";
$b2b_user = mysqli_query($objConn,$query_b2b_user, $objConn) or die(mysql_error());
$row_b2b_user = mysql_fetch_assoc($b2b_user);
$totalRows_b2b_user = mysqli_num_rows($b2b_user);

$query_b2b_enquiries = "SELECT power_b2benquiry.pid, power_b2benquiry.quantity, power_b2benquiry.name, power_b2benquiry.b2bid, power_b2b.name AS username FROM  power_b2benquiry INNER JOIN (power_b2b) ON (power_b2benquiry.b2bid = power_b2b.b2b_id) WHERE MONTH(date) = ".$cur_mont;
$b2b_enquiries = mysqli_query($objConn,$query_b2b_enquiries, $objConn) or die(mysql_error());
$row_b2b_enquiries = mysql_fetch_assoc($b2b_enquiries);
$totalRows_b2b_enquiries = mysqli_num_rows($b2b_enquiries);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to Power Play Imaging Solutions  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function popup(url) {
	window.open(url,"msg","height=500,width=500,left=300,right=300");
}
</script>
</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0" class="box">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="350" align="center" valign="top" bgcolor="#FFFFFF"><table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%">&nbsp;</td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/offer_icon.jpg" alt="Offer alert" width="25" height="25" /></td>
                    <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">Offer Alert</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                    <?php if($totalRows_get_offers) {?>
                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                      <tr>
                        <td width="66%"><strong>Name</strong></td>
                        <td width="34%"><strong>Start Date</strong></td>
                      </tr>
                      	<?php do {?>
                          <tr>
                            <td><a href="offer_edit.php?id=<?php echo $row_get_offers['offer_id']; ?>"><?php echo $row_get_offers['offer_name']; ?></a></td>
                            <td><?php echo Date_SQL_JS($row_get_offers['offer_start']); ?></td>
                          </tr>
                       <?php } while($row_get_offers = mysql_fetch_assoc($get_offers));?>
                    </table> 
                    <?php } else { 
								echo "<p>Offers not found to update at this time.</p>";
						  }
					?>                  
                     <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/startalert_icon.jpg" alt="Buffer Start Alert" width="25" height="25" /></td>
                      <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">Buffer Stock Alert</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                      <?php if($totalRows_stock_detail) {?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                        <tr>
                          <td width="53%"><strong>Name</strong></td>
                          <td width="23%" align="center"><strong>Reorder Stock</strong></td>
                          <td width="24%" align="center"><strong>Available Stock</strong></td>
                        </tr>
                        <?php do {?>
                        <tr>
                          <td><a href="product_edit.php?catid=<?php echo $row_stock_detail['category_id'];?>&id=<?php echo $row_stock_detail['id'];?>"><?php echo $row_stock_detail['name'];?></a></td>
                          <td align="center"><?php echo $row_stock_detail['reorder'];?></td>
                          <td align="center"><?php echo $row_stock_detail['stock'];?></td>
                        </tr>
                        <?php } while($row_stock_detail = mysql_fetch_assoc($stock_detail)); ?>
                      </table>
                      <?php } else {
					  		echo "Products are available with their reorder stock quantity";
					  }
					  ?>
                        <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/month_icon.jpg" alt="Total Sale of this current Month" width="25" height="25" /></td>
                      <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">Total Sale of this current Month</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                      <?php if($totalRows_sales_report) { ?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                          <tr>
                            <td width="75%"><strong>Product Name</strong></td>
                            <td width="25%" align="center"><strong>Sales Quantity</strong></td>
                          </tr>
                          <?php do {?>
                          <tr>
                            <td><?php echo $row_sales_report['name']; ?></td>
                            <td align="center"><?php echo Get_Product_Sales_Quantity($row_sales_report['product_id']);?></td>
                          </tr>
                          <?php } while($row_sales_report = mysql_fetch_assoc($sales_report));?>
                        </table>
                      <?php } else{ 
					  			echo "No sales for this month";
					  		}
					  ?>
                          <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/shipmentorder_icon.jpg" alt="Ready for Shipment Order" width="25" height="25" /></td>
                      <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">Ready for Shipment Order</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                      <?php if($totalRows_order_report) {?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                          <tr>
                            <td width="70%"><strong>Number</strong></td>
                            <td width="30%" align="center"><strong>Status</strong></td>
                          </tr>
                          <?php do {?>
                              <tr>
                                <td><a href="order_details.php?id=<?php echo $row_order_report['order_id'];?>"><?php echo $row_order_report['order_code'];?></a></td>
                                <td align="center"><?php echo $row_order_report['status_name'];?></td>
                              </tr>
                          <?php } while($row_order_report = mysql_fetch_assoc($order_report)); ?>
                        </table>
                        <?php } else {
								echo "Orders not available in Shipment status";
						}?>
                          <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/notapprove_icon.jpg" alt="Not Approved B2B Users" width="25" height="25" /></td>
                      <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">Not Approved B2B Users</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                      <?php if($totalRows_b2b_user) {?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                          <tr>
                            <td width="66%"><strong>Name</strong></td>
                            <td width="34%"><strong>Date Added</strong></td>
                          </tr>
                          <?php do {?>
                          <tr>
                            <td><a href="javascript:popup('b2b_change_status.php?id=<?php echo $row_b2b_user['b2b_id'];?>')"><?php echo $row_b2b_user['name'];?></a></td>
                            <td><?php echo Date_SQL_JS_Time($row_b2b_user['date_added']);?></td>
                          </tr>
                          <?php } while($row_b2b_user = mysql_fetch_assoc($b2b_user));?>
                        </table>
                        <?php } else {
									echo "B2B users are not available in the Inactive mode";
							  }
						?>
                          <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
            <td align="center" valign="top"><table width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="9%" align="left" valign="middle" bgcolor="#DBD9DA" class="pagehead"><img src="images/newb2b_icon.jpg" alt="New B2B Enquirys of Current Month" width="25" height="25" /></td>
                      <td width="91%" align="left" valign="top" bgcolor="#DBD9DA" class="pagehead">New B2B Enquirys of Current Month</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5">
                      <?php if($totalRows_b2b_enquiries) {?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                          <tr>
                            <td width="41%"><strong>User Name</strong></td>
                            <td width="41%"><strong>Product Name</strong></td>
                            <td width="18%" align="center" valign="middle"><strong>Quantity</strong></td>
                          </tr>
                          <?php do {?>
                          <tr>
                            <td><?php echo $row_b2b_enquiries['username'];?></td>
                            <td><a href="product_edit.php?id=<?php echo $row_b2b_enquiries['pid'];?>"><?php echo $row_b2b_enquiries['name'];?></a></td>
                            <td align="center" valign="middle"><?php echo $row_b2b_enquiries['quantity'];?></td>
                          </tr>
                          <?php } while($row_b2b_enquiries = mysql_fetch_assoc($b2b_enquiries)); ?>
                        </table>
                      <?php } else {
					  			echo "No B2B enquiries for this month";
					  		}
					   ?>
                          <p>&nbsp;</p></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
<?php
mysql_free_result($get_offers);
?>
