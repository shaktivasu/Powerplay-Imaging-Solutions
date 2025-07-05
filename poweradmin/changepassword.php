<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$newpass1=$_POST['newpass1'];
 
if(isset($_POST['Submit']) || isset($_POST['Submit_x']))
        
{
		
		$query="select * from power_admin where password='".md5($oldpass)."'";
		$result=mysqli_query($objConn,$query)or die("Query Failed : ".mysql_error());
		$row=mysqli_fetch_row($result);
		$num=mysqli_num_rows($result);
		
		if($num==1)
		{
		$query="update power_admin set password='".md5($newpass)."' where password='".md5($oldpass)."'";
		$result=mysqli_query($objConn,$query)or die("Query Failed : ".mysql_error());
		header("location:changepassword.php?msg=1");
		}
		
		else
		{
			header("location:changepassword.php?err=1");
		}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function resetform()
{
document.form1.reset();

}
</script>

<script type="text/javascript">
function val()
{
   if(document.form1.oldpass.value=="")
	{
	document.form1.oldpass.focus();
	alert("Please Enter Old Password");
	return false;
	}
	
	
	 if(document.form1.newpass.value=="")
	{
	document.form1.newpass.focus();
	alert("Please Enter New Password");
	return false;
	}
	
	
	 if(document.form1.newpass1.value=="")
	{
	document.form1.newpass1.focus();
	alert("Please Enter Retype New Password");
	return false;
	}
	
	if(document.form1.newpass.value!=document.form1.newpass1.value)
	{
	document.form1.newpass.focus();
	alert("Mismatch Password and Retype Password");
	return false;
	}
	
}
</script>
<script src="clienthint_chngpass.js"></script>

</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="300" align="center" valign="top" bgcolor="#FFFFFF" class="box"><table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td align="center" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top" class="content_heading">Change Password</td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top"><form id="form1" name="form1" method="post" action="" onsubmit="return val();">
                      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                          <td height="5" colspan="3" align="left" valign="top" class="username"></td>
                        </tr>
                        <tr>
                          <td colspan="3" align="center" valign="middle" class="username">&nbsp;<span class="error">
                            <?php
                          if($_REQUEST['msg']==1)
						  {
						  echo "Updated Successfully";
						  }
						   if($_REQUEST['err']==1)
						  {
						  echo "Wrong Old password";
						  }
						  
						  
						  
						  ?>
                          </span></td>
                        </tr>
                        <tr>
                          <td width="29%" align="left" valign="middle" class="username">Old Password</td>
                          <td width="5%" align="left" valign="top" class="username">:</td>
                          <td width="66%" align="left" valign="top"><input name="oldpass" type="password" id="oldpass" size="23" maxlength="23"  onblur="showHint(this.value)"  />
                            &nbsp;<span id="txtHint" class="error"></span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle" class="username">New Password</td>
                          <td align="left" valign="top" class="username">:</td>
                          <td align="left" valign="top"><input name="newpass" type="password" id="newpass" size="23" maxlength="23" /></td>
                        </tr>
                        <tr>
                          <td height="20" align="left" valign="top">Retype New Password</td>
                          <td align="left" valign="top">:</td>
                          <td align="left" valign="bottom"><input name="newpass1" type="password" id="newpass1" size="23" maxlength="23" />
                              <input type="hidden" name="pass_exist_status" id="pass_exist_status" /></td>
                        </tr>
                        <tr>
                          <td height="20" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="20" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="bottom"><a href="#">
                            <input name="Submit" type="image" id="Submit" src="images/change_im_butt.png"  width="70" height="19" border="0" />
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">
                              <img src="images/reset_butt.png"  width="62" height="19" border="0" onclick="resetform();" />
                            </a></td>
                        </tr>
                      </table>
                                        </form>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="top">&nbsp;</td>
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
