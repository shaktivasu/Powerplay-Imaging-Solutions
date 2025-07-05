<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="350" align="center" valign="middle" bgcolor="#FFFFFF"  class="box"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="208" align="center" valign="top"><a href="products_list.php?catid=1"><img src="images/category_master.png" alt="Product Master" width="208" height="37" border="0" /></a></td>
                <td width="17" align="center" valign="top">&nbsp;</td>
                <td width="208" align="center" valign="top"><a href="news_events.php"><img src="images/gallery.png" alt="News &amp; Events" width="208" height="37" border="0" /></a></td>
                <td width="18" align="left" valign="top">&nbsp;</td>
                </tr>
              <tr>
                <td align="center" valign="top">&nbsp;</td>
                <td align="center" valign="top">&nbsp;</td>
                <td align="center" valign="top">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
              <tr>
                <td align="center" valign="top"><a href="faq.php"><img src="images/faq.png" alt="FAQ" width="208" height="37" border="0" /></a></td>
                <td align="center" valign="top">&nbsp;</td>
                <td align="center" valign="top"><a href="#"><img src="images/hot-links.png" alt="FAQ" width="208" height="37" border="0" /></a></td>
                <td align="left" valign="top">&nbsp;</td>
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
