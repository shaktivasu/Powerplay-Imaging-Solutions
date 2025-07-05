<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');?>
<?php include_once('inc_functions.php');?>
<?php
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

mysql_select_db($database_objConn, $objConn);
$query_product_detail = "SELECT id, name, stock FROM power_products";
$product_detail = mysqli_query($objConn,$query_product_detail, $objConn) or die(mysql_error());
$row_product_detail = mysql_fetch_assoc($product_detail);
$totalRows_product_detail = mysqli_num_rows($product_detail);
if($totalRows_product_detail) {
	do {
		$produt[ucfirst($row_product_detail['name'])] = $row_product_detail['stock']."--".$row_product_detail['id'];
	} while($row_product_detail = mysql_fetch_assoc($product_detail));
}
/*
@ksort($produt);

foreach($produt as $key => $value) {
	print $key . " = " . $value . "<br />";
}
echo "<hr/>";

@asort($produt);
foreach($produt as $key => $value) {
	print $key . " = " . $value . "<br />";
}

exit;*/

?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript" src="../js/setelementstyle.js"></script>
<script language="javascript" type="text/javascript">
function showreport(id) {
	if(id == 1) {
		setElementStyle('sort_by_name', 'display', 'none');
		setElementStyle('sort_by_sales', 'display', 'block');
		
	} else {
		setElementStyle('sort_by_name', 'display', 'block');
		setElementStyle('sort_by_sales', 'display', 'none');
	}
}
</script>
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
                  <td colspan="2" align="center" valign="middle" class="pagehead">Stock Report</td>
                  </tr>
            </table></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="5" colspan="2" align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="right" valign="top"><a href="javascript:showreport('1')" class="add_delete">Sort by Product Name</a>&nbsp;&nbsp;&nbsp;<a href="javascript:showreport('2')" class="add_delete">Sort by Stock Quantity</a></td>
            <td align="right" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#E3C277">
              <tr>
                <td width="69%" height="25" align="left" valign="middle" bgcolor="#e1ad45" class="tablehead"> Product Name</td>
                <td width="31%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Stock  Quantity</td>
              </tr>
             <?php  if($totalRows_product_detail) {?>
          	  <tr>
              	<td colspan="2" bgcolor="#F9F2E2">
                	<?php @asort($produt);?>
                	<div id="sort_by_name" style="display:none">
                	<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#E1AD45">
						<?php foreach($produt as $key => $value) {
							$split = explode("--", $value);
						?>                    
                        <tr>
                        	<td align="left" valign="middle" bgcolor="#f9f2e2"  <?php echo $bg?>><a href="product_edit.php?id=<?php echo $split[1];?>" class="hotlnk"><?php echo "<u>".$key."</u>"; ?></a></td>
                        	<td width="255" align="center" valign="middle" bgcolor="#f9f2e2" class="tabletext"  <?php echo $bg?>><?php echo $split[0];?></td>
						</tr>
                        <?php } ?>
                    </table>
                    </div>
                    <div id="sort_by_sales">
                    <?php @ksort($produt);?>
                	<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#E1AD45">
                    	<?php foreach($produt as $key => $value) {
							$split = explode("--", $value);
						?>            
                        <tr>
                        	<td align="left" valign="middle" bgcolor="#f9f2e2"  <?php echo $bg?>><a href="product_edit.php?id=<?php echo $split[1];?>" class="hotlnk"><?php echo "<u>".$key."</u>"; ?></a></td>
                        	<td width="255" align="center" valign="middle" bgcolor="#f9f2e2" class="tabletext"  <?php echo $bg?>><?php echo $split[0];?></td>
						</tr>
                        <?php } ?>
                    </table>
                    </div>
                </td>
              </tr>
              <?php } else {?>
              	<tr><td class="error" colspan="2">Products not found</td></tr>
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
<?php
mysql_free_result($product_detail);
?>
