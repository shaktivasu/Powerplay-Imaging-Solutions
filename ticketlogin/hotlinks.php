<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
include_once ('Editor/editor_functions.php');
include_once ('Editor/config.php');
include_once ('Editor/editor_class.php');
if(isset($_POST['save']))
{
//echo "update power_faq set faq='".$_POST['description']."'  ";
 $edit_news=mysqli_query($objConn,"update power_faq set faq='".mysql_real_escape_string($_POST['description'])."'  ");
header("location:faq.php?msg=2");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to Power Play Imaging Solutions  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Are you sure you want to delete the data ";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
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
        <td height="300" align="center" valign="top" bgcolor="#FFFFFF" class="box"><table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top">
                    <form id="form1" name="form1" method="post" action="" onsubmit="return val();">
                      <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" >
                        <tr>
                          <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" ><p>&nbsp;</p>
                            <p class="error">
							<?php
                          $msg=$_GET["msg"];
							switch ($msg)
							{
								case "1":
									$message="Added Successfully";
									break;
								case "2":
									$message="Updated Successfully";
									break;
								case "3":
									$message="Deleted Successfully";
									break;
								case "4":
								$message="Ordered Successfully";
								break;
							}
							echo $message;
						  ?></p></td>
                          </tr>
                        <tr bgcolor="#FFFFFF" class="tablehead">
                          <td align="center" valign="middle" bgcolor="#D632A5" class="tablehead"><strong>FAQ</strong><strong></strong></td>
                          </tr>
					<?php
					//Maximum of News & Events
					
                    $news_events_flow=mysqli_query($objConn,"select * from power_faq ") or die("FAQ error:".mysql_error());
					$news_events_flow1=mysqli_fetch_array($news_events_flow);
					
                    ?>
                        <tr>
                        <td align="center" valign="middle" bgcolor="#F9C6F1"><?php
					  	//$product_desc=$sel2['menu_desc'];
						  		$editor = new wysiwygPro();
								//$editor->disablebookmarkmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disablelinkmngr(true);
								$editor->removebuttons('document');
								$editor->removebuttons('bookmark');
								//$editor->removebuttons('image');
								
								$editor->set_name('description');						
								$editor->set_code($news_events_flow1['faq']);
								$editor->print_editor(550, 390); 
						  	?></td>
                        </tr>
                   
                       <tr>
                          <td align="center" valign="middle" bgcolor="#F9C6F1"><input type="submit" name="save" id="save" value="Save" /></td>
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
