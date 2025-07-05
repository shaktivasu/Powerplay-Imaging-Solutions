<?php include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$sel="select tax_val from power_tax";
$sel1=mysqli_query($objConn,$sel);
$sel2=mysqli_fetch_row($sel1);
if(isset($_POST['sub']))
{
echo $up="update power_tax set tax_val=".$_POST['tax_entry'];
$up1=mysqli_query($objConn,$up);
header("location:taxentry.php?up=1");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<script language="javascript" src="../js/formvalidation.js"></script>

<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="189" align="center" valign="middle" bgcolor="#FFFFFF"><table width="75%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
          <tr>
            <td width="100%" align="center" valign="middle" bgcolor="#DBD9DA" class="pagehead">Control Panel</td>
          </tr>
          <tr>
            <td height="60" colspan="5" align="center" valign="middle" bgcolor="#F5F5F5"><table width="80%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="8%" align="left" valign="middle"><img src="images/taxentry_icon.jpg" alt="Tax Entry" width="39" height="28" /></td>
                <td width="25%" align="left" valign="middle"><a href="taxentry.php" class="innerlink">Tax Entry</a></td>
                <td width="8%" align="left" valign="middle"><img src="images/bankcharge_icon.jpg" alt="Tax Entry" width="39" height="28" /></td>
                <td width="19%" align="left" valign="middle"><a href="bank_details.php" class="innerlink">Banking Charges</a></td>
                <td width="4%" align="left" valign="middle">&nbsp;</td>
                <td width="7%" align="left" valign="middle"><img src="images/shippingcharge_icon.jpg" alt="Tax Entry" width="39" height="28" /></td>
                <td width="1%" align="left" valign="middle" class="innerlink">&nbsp;</td>
                <td width="28%" align="left" valign="middle"><a href="shipping_details1.php" class="innerlink">Shipping Charges</a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="300" align="center" valign="middle" bgcolor="#FFFFFF"><table width="64%" border="0" cellpadding="1" cellspacing="1" bgcolor="#D8D8D8">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" bgcolor="#DBD9DA"><div align="center" class="pagehead">Tax Master</div></td>
                </tr>
              <tr>
                <td align="center" valign="top" bgcolor="#F5F5F5"><form id="form1" name="form1" method="post" action="">
                    <table width="80%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                      <tr>
                        <td colspan="2" align="center" valign="top" bgcolor="#F5F5F5" class="redtext">&nbsp;
                            <?php 
				  if($_REQUEST['up']!='')
				  echo "Updated Successfully.";
				  ?>                        </td>
                      </tr>
                      <tr>
                        <td bgcolor="#F5F5F5" class="text">&nbsp;</td>
                        <td bgcolor="#F5F5F5">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="34%" align="left" valign="middle" bgcolor="#F5F5F5" class="text"><strong>Tax Value (% )</strong></td>
                        <td width="66%" align="left" valign="middle" bgcolor="#F5F5F5"><input name="tax_entry" type="text" class="bluetextbold" id="tax"  value="<?php echo $sel2[0]?>" onkeypress="return numbersonly(this, event, false);"/></td>
                      </tr>
                      <tr>
                        <td height="10" align="left" valign="middle" bgcolor="#F5F5F5"></td>
                        <td height="10" align="left" valign="middle" bgcolor="#F5F5F5"></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#F5F5F5">&nbsp;</td>
                        <td align="left" valign="middle" bgcolor="#F5F5F5"><input type="submit" name="sub" id="sub" value="Change" /></td>
                      </tr>
                      <tr>
                        <td bgcolor="#F5F5F5">&nbsp;</td>
                        <td bgcolor="#F5F5F5">&nbsp;</td>
                      </tr>
                    </table>
                </form></td>
              </tr>
            </table></td>
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
