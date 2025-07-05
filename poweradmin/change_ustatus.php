<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$moduser="select * from power_user where user_serialno=".$_REQUEST['id'];
$moduser1=mysqli_query($objConn,$moduser);
$moduser2=mysqli_fetch_array($moduser1);
if(isset($_POST['Submit']))
{
$up="update power_user set user_status='".$_POST['status']."' where user_serialno=".$_REQUEST['id'];
$up1=mysqli_query($objConn,$up);
?>
<script language="javascript" type="text/javascript">
window.close();
window.opener.location.reload();
</script> 
<?php }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#f9f2e2">
<form action="" method="post">
  <table width="700" border="0" cellpadding="2" cellspacing="2" align="center">
    <tr>
      <td colspan="3" bgcolor="#F9F2E2" class="tabletext">Change User Status</td>
    </tr>
    <tr>
      <td width="102" align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">Name</td>
      <td width="4" align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td width="574" align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext"><?php echo $moduser2['user_name'];?></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">Gender</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext"><?php echo $moduser2['user_gender']; ?> </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">Address</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext"><?php echo $moduser2['user_address_1']; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">City</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext"><?php echo $moduser2['user_city']; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">State</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext"><?php echo $moduser2['user_state']; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">Country</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><span class="tabletext"><?php echo $moduser2['user_country']; ?></span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">Postal</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><span class="tabletext"><?php echo $moduser2['user_postal']; ?></span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">Email id</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><span class="tabletext"><?php echo $moduser2['user_mailid']; ?></span></td>
    </tr>
    
    <tr>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">Phone</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><span class="tabletext"><?php echo $moduser2['user_phone']; ?></span></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">Mobile</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><span class="tabletext"><?php echo $moduser2['user_mobile']; ?></span></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#F9F2E2" class="tabletext">Status Active</td>
      <td align="left" valign="top" bgcolor="#F9F2E2" class="tabletext">:</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2">
       <input type="radio" name="status" id="status2"  value="Active" <?php if($moduser2['user_status']=='Active') echo "checked";?>  /> 
       Active
        <input type="radio" name="status" id="status"  value="Inactive" <?php if($moduser2['user_status']=='Inactive') echo "checked";?> /> 
        Inactive</td>
    </tr>
    <tr>
      <td height="8" colspan="3" align="left" valign="middle" bgcolor="#F9F2E2"></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#F9F2E2">&nbsp;</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2">&nbsp;</td>
      <td align="left" valign="middle" bgcolor="#F9F2E2"><input type="submit" name="Submit" id="Submit" value=" Update " />
        &nbsp;</td>
    </tr>
  </table>

</form>
</body>
</html>
