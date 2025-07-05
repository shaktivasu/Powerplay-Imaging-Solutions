<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
$find="select category_parent from power_menu where category_id=".$_REQUEST['id']."";
$find1=mysqli_query($objConn,$find);
$find2=mysqli_fetch_array($find1);
$find2['category_parent'];
include_once ('Editor/editor_functions.php');
include_once ('Editor/config.php');
include_once ('Editor/editor_class.php');

if(isset($_REQUEST['Submit']))
{
	import_request_variables('pg','');
	//Uploading Images......
	$gettime=mysqli_query($objConn,"select unix_timestamp(now())");
	$timeresult=mysql_result($gettime,0);
	$imagename=$_FILES['F1']['name'];
	$photoname=$timeresult.$imagename;
	$target_path2 = "upload/category/";
	$target_path =$target_path2.$timeresult.basename( $_FILES['F1']['name']); 
	move_uploaded_file ($_FILES["F1"]['tmp_name'],'../'.$target_path);
	$desc = str_replace("'", "&rsquo;", $_POST['desc']);
	$desc = str_replace('"', '&quot;', $desc);
	if($_FILES['F1']['name']=="")
	{
	   $ins="update power_menu set category_name='".$catname."',category_desc='".$desc."',category_title='".$title."',category_status=".$status." where category_id=".$_REQUEST['id'];
	
	 $ins1=mysqli_query($objConn,$ins);
	  $up=$_POST['par'];
	 }
	 else
	 {
	  $ins="update power_menu set category_name='".$catname."',category_banner='".$target_path."',category_desc='".$desc."',category_title='".$title."',category_status=".$status." where category_id=".$_REQUEST['id'];
	
	$ins1=mysqli_query($objConn,$ins); 
	 $up=$_POST['par'];
	 }
	 header('Location:cate_sub_list.php?id='.$par.'&res=updated');
}
?>
<?php 
$edit="select * from power_menu where category_id=".$_REQUEST['id'];
$edit1=mysqli_query($objConn,$edit);
$edit2=mysqli_fetch_array($edit1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript">
function val()
 {
	//title, date, status
	var e = document.forms['addcat'].elements;

	if(e['catname'].value == '')
	 {
		alert("Please enter the category Nmae");
		document.addcat.focus();
		return false;
	}
	if(e['F1'].value != '') 
	{
		var imgfile = e['F1'].value;
		var file_extn = imgfile.split(".");
		var extn = file_extn[1];
		var extnflg;
		if(extn == 'jpg' || extn == 'jpeg' || extn == 'gif' || extn == 'bmp' ||extn == 'swf') {
			extnflg = "true";
		} else {
			extnflg = "false";
		}
		if(extnflg == "false") {
			alert("Invalid Thumb Image file format")
			return false;
		}	
	}
	if(e['title'].value == '')
	 {
		alert("Please enter the Title");
		return false;
	}
	return true;
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
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF" class="box"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right"><table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="60" align="left" valign="middle"><a href="cate_sub_list.php?id=<?php echo $find2['category_parent'] ;?>" class="innerlink" onclick="return val();">Category List</a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle">
           <form name="addcat"  method="post" enctype="multipart/form-data" onsubmit="return val();">
              <table width="700" border="0" cellpadding="2" cellspacing="2">
                <tr>
                  <td colspan="3" align="center" valign="middle" class="pagehead">Edit Sub Category</td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td width="102" align="left" valign="middle" class="text">Sub Category Name</td>
                  <td width="4" align="left" valign="middle" class="text">:</td>
                  <td width="574" align="left" valign="middle"><input name="catname" type="text" id="textfield" size="50" value="<?php echo $edit2['category_name']?>" />
                      
                      <input name="par" value="<?php echo $find2['category_parent'];?>" type="hidden" /></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="text">Sub Category  Image</td>
                  <td align="left" valign="middle" class="text">:</td>
                  <td align="left" valign="middle"><input type="file" name="F1" id="F1" />
                    <a href="../<?php echo $edit2['category_banner']?>" target="_blank" class="innerlink">
                    <?php echo $edit2['category_banner']?>                    </a></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text">Title</td>
                  <td align="left" valign="top" class="text">:</td>
                  <td align="left" valign="middle"><input name="title" type="text" id="title" size="50" value="<?php echo $edit2['category_title']?>" /></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text">Visible</td>
                  <td align="left" valign="top" class="text">:</td>
                  <td align="left" valign="middle"><?php if($edit2['category_status']==0) 
			  {?>
                      <span class="row1">
                      <input type="radio" name="status" id="status" value="0" checked="checked" />
                        Yes
                        <input type="radio" name="status" id="status" value="1" />
                        No</span>
                      <?php }
				else
				{ ?>
                      <span class="row1">
                      <input type="radio" name="status" id="status" value="0" />
                        Yes
                        <input type="radio" name="status" id="status" value="1" checked="checked" />
                        No</span>
                      <?php
				}?></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text">Description</td>
                  <td align="left" valign="top" class="text">:</td>
                  <td align="left" valign="middle"><?php
					  	$product_desc=$edit2['category_desc'];
						  		$editor = new wysiwygPro();
								//$editor->disablebookmarkmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disablelinkmngr(true);
								//$editor->removebuttons('document');
								$editor->removebuttons('bookmark');
								//$editor->removebuttons('image');
								
								$editor->set_name('desc');						
								$editor->set_code($product_desc);
								$editor->print_editor(550, 390); 
						  	?>                  </td>
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
                  <td align="left" valign="middle">
                  <input  type="submit" name="Submit" id="Submit" value="Edit" />
                    &nbsp;
                    <input type="submit" name="button2" id="button2" value="Cancel" /></td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">&nbsp;</td>
                </tr>
              </table>
            </form></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
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
