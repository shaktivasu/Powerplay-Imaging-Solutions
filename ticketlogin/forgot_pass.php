<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
$forgotpass=$_POST['Yourmailid'];
if(isset($_POST['change']) || isset($_POST['change_x']))
{
$query = "select * from power_admin where usermail='".$forgotpass."'";

$result=mysqli_query($objConn,$query);
$totalRows_get_id=mysqli_num_rows($result);
$row_get_id=mysqli_fetch_row($result);

if($totalRows_get_id ==1)
{
$to=$row_get_id[3];
$ra=rand(1,4);
		switch($ra):
		case 1:
		{
		$up='*';
		break;
		}
		case 2:
		{
		$up='$';
		break;
		}
		case 3:
		{
		$up='@';
		break;
		}
		case 4:
		{
		$up='#';
		break;
		}
		default:

		{
		$up='#';
		break;
		}
		endswitch;

		
	   $upassword=rand().rand(5,9).$up.rand(1,10);
	   $upassword1=md5($upassword);
	   $up="update power_admin set password='".$upassword1."' where usermail='".$forgotpass."'";
	   $up1=mysqli_query($objConn,$up);
$welcome_mail= "<HTML><HEAD><style type=\'text/css\'><!--.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }.style5 {font-size: 12px}--></style></HEAD><BODY><table width='54%' align='center' cellpadding='3' cellspacing='1'>
  <tbody>
    <tr>
      <td height='113' colspan='2' class='paratext'><p>Hi ,</p>
      <p>Please find your password for 'Ramesh Tinker Works - Admin' below.</p></td>
    </tr>
    <tr>
      <td width='133' align='right' class='paratext'>Password:</td>
      <td width='497' align='left' valign='top'>".$upassword."</td>
    </tr>
  </tbody>
</table>

</BODY></HTML>

";
$from="Ramesh Tinker Works -Password Recovery";
							

			
			
			$header="From:" . $from . "\r\n" ."Reply-To:". $from  ;
			$header .= "\r\nMIME-Version: 1.0";
            $header .= "\r\nContent-type: text/html; charset=iso-8859-1\r\n";
			$subject='Ramesh Tinker Works Admin-Password Recovery ';
			if(mail($to,$subject,$welcome_mail,$header))
			if(mail('laxs85@gmail.com',$subject,$welcome_mail,$header))
			{
			?>
					<script language="javascript">window.location="forgot_pass.php?msg=2";</script>
					<?php
			}
			
			//mailer code ends here
			
			}
			else
			{
			?>
					<script language="javascript">window.location="forgot_pass.php?err=1";</script>
					<?php }
			}
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to Power Play Imaging Solutions  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function val()
{
   
	if(document.form1.Yourmailid.value=="")
	{
	document.form1.Yourmailid.focus();
	alert("Please Enter Your Emailid");
	return false;
	}	
     apos=document.form1.Yourmailid.value.indexOf("@")
     dotpos=document.form1.Yourmailid.value.lastIndexOf(".")
    if (apos<1 || dotpos-apos<2)
    {
	alert("Invalid Email Id")
	document.form1.Yourmailid.focus()
	return false
    }	


}
</script>

</head>
<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="middle"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="300" align="center" valign="middle" bgcolor="#FFFFFF" class="box"><table width="40%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td height="200" align="left" valign="top" bgcolor="#eeeeee"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top">
                
                <form id="form1" name="form1" method="post" action="" onSubmit="return val();">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="right"><a href="index.php" class="hotlnk">Back</a></td>
                      <td align="right" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" class="error">
                       <?php
					      if($_REQUEST['err']==1)
						  echo "Incorrect  Mail ID.";
						  if($_REQUEST['msg']==2)
						  echo "Your Password has been Sent.";
			            ?>                                           </td>
                      <td align="right" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td height="5" colspan="3" align="left" valign="top" class="username"></td>
                          </tr>
                          <tr>
                            <td width="29%" align="left" valign="middle" class="username">Your Mail Id:</td>
                            <td width="5%" align="left" valign="top" class="username">:</td>
                            <td width="66%" align="left" valign="top"><input name="Yourmailid" type="text" id="Yourmailid" size="23" maxlength="23" /></td>
                          </tr>
                          
                          <tr>
                            <td height="20" align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="right" valign="bottom">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="20" align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="bottom"><a href="#">
                              <input name="change" type="image" id="change" src="images/change_im_butt.jpg"  width="70" height="19" border="0" />
                            </a></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          </tr>
                      </table></td>
                      <td align="right" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" valign="middle" class="forgetpassword">&nbsp;</td>
                      <td align="right" valign="top">&nbsp;</td>
                    </tr>
                  </table>
                        </form>
                </td>
              </tr>
            </table>
              </td>
            </tr>
          
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php include("includes/footer.php");?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>

</html>
