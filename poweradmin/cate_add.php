<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php

include_once ('Editor/editor_functions.php');
include_once ('Editor/config.php');
include_once ('Editor/editor_class.php');

import_request_variables('pg','');
if(isset($_REQUEST['Submit']))
{
	$sel="select max(category_id) from power_menu";
	$sel1=mysqli_query($objConn,$sel);
	$sel2=mysqli_fetch_row($sel1);
	if($sel2[0] > 1) {
		$max=$sel2[0]+1;
	} else {
		$max= 1;
	}
	
	$dis="select max(category_display) from power_menu where category_parent=0";
	$dis1=mysqli_query($objConn,$dis);
	$dis2=mysqli_fetch_row($dis1);
	$dis3=$dis2[0]+1;
	//Uploading Images......
							$gettime=mysqli_query($objConn,"select unix_timestamp(now())");
							$timeresult=mysql_result($gettime,0);
							$imagename=$_FILES['F1']['name'];
							$photoname=$timeresult.$imagename;
							$target_path2 = "upload/category/";
							$target_path =$target_path2.$timeresult.basename( $_FILES['F1']['name']); 
							move_uploaded_file ($_FILES["F1"]['tmp_name'],'../'.$target_path);
	 $ins="insert into power_menu values(".$max.",'".$catname."','".$target_path."','".$desc."','".$title."',0,0,0,0,0,".$dis3.")";
	 $ins1=mysqli_query($objConn,$ins);
	 header('Location:cate_list.php?add=1&res=added');
	 exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript">
function callMe()
{
	getForm("form1");
	if(!IsEmpty("catname", "Please Enter Main Category Name"))
	return false;
	
	if(!IsAlpha("catname", "Please Enter Valid Main Category Name"))
	return false;
	
	thumbimg=document.form1.F1.value;
	if(thumbimg=="")
	{
		alert("Please upload Image");
		document.form1.F1.value="";
		document.form1.F1.focus();
		return false;
	}
	if(thumbimg!="")
	{
			var pattern=/(GIF|JPG|gif|jpg|jpeg)/;
			var thumb1=document.form1.F1.value;
			var thumb2=thumb1.split(".");
			var no=thumb2.length;
			var pat=thumb2[no-1];
			var matchval=pat.match(pattern);
			if(matchval==null)
			{
					alert("Invalid image format !");
					document.form1.F1.value="";
					document.form1.F1.focus();
					return false;
			}
	}
	if(!IsEmpty("title", "Please Enter the Title"))
	return false;
	if(!IsAlpha("title", "Please Enter Valid Title"))
	return false;
		
	if(!IsEmpty("desc", "Please Enter the Description"))
	return false;
	return true;
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
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
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" align="left" valign="middle">&nbsp;</td>
            <td align="right" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="right" valign="middle"><table width="100" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="60" align="left" valign="middle"><a href="cate_list.php" class="innerlink" onclick="return val();">Menu List</a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="12%">&nbsp;</td>
                <td align="center" valign="middle"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return callMe();">
                  <table width="700" border="0" cellpadding="2" cellspacing="2">
                    <tr>
                      <td colspan="3" align="center" valign="middle" class="pagehead">Add Category</td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="102" align="left" valign="middle" class="text">Main Category Name</td>
                      <td width="4" align="left" valign="middle" class="text">:</td>
                      <td width="574" align="left" valign="middle"><input name="catname" type="text" id="textfield" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" class="text">Category Image</td>
                      <td align="left" valign="middle" class="text">:</td>
                      <td align="left" valign="middle"><input type="file" name="F1" id="F1" /></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="text">Title</td>
                      <td align="left" valign="top" class="text">:</td>
                      <td align="left" valign="middle"><input name="title" type="text" id="textfield2" size="50" /></td>
                    </tr>
                    
                    <tr>
                      <td align="left" valign="top" class="text">Description</td>
                      <td align="left" valign="top" class="text">:</td>
                      <td align="left" valign="middle"><?php
					  	//$product_desc=$sel2['menu_desc'];
						  		$editor = new wysiwygPro();
								//$editor->disablebookmarkmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disablelinkmngr(true);
								$editor->removebuttons('document');
								$editor->removebuttons('bookmark');
								//$editor->removebuttons('image');
								
								$editor->set_name('desc');						
								$editor->set_code($product_desc);
								$editor->print_editor(550, 390); 
						  	?>                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" class="text">&nbsp;</td>
                      <td align="left" valign="middle" class="text">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="8" colspan="3" align="left" valign="middle"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle"><input type="submit" name="Submit" id="Submit" value=" Add " />
                        &nbsp;
                        <input name="button2" type="button" id="button2" onclick="MM_goToURL('parent','cate_list.php');return document.MM_returnValue" value="Cancel" /></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                  </table>
                </form></td>
                <td width="12%">&nbsp;</td>
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
