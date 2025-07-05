<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
$delete=0;
$count=(isset($_POST['del']))?$_POST['del']:NULL; 
$count1=count($count);
for($i=0;$i<=$count1;$i++)
{
	//get the sub category ids
	$all_cat ='';
	if(isset($_POST['del'][$i]) && $_POST['del'][$i] != '') {
		$all_cat = GetSubcategory($_POST['del'][$i]).$_POST['del'][$i];
		if(isset($all_cat) && $all_cat != '') {
			$image_file = explode(",", $all_cat);
			for($j=0; $j<count($image_file); $j++) {
				//echo $j." --> ".$image_file[$j]."<br/>";
				if(isset($image_file[$j]) && $image_file[$j] != '') {
					//get the image path
					$query_event_image = "SELECT category_banner FROM power_menu WHERE category_id = ".$image_file[$j]."";
					$event_image = mysqli_query($objConn,$query_event_image) or die(mysql_error());
					$row_event_image = mysql_fetch_assoc($event_image);
					$totalRows_event_image = mysqli_num_rows($event_image);
					if($totalRows_event_image && isset($row_event_image['category_banner']) && $row_event_image['category_banner'] != '' && file_exists("../".$row_event_image['category_banner']))
					 {
						//remove the  cat image
						unlink("../".$row_event_image['category_banner']);
					}
				}
			}
			$del="delete from power_menu where category_id in (".$all_cat.")";
			$del1=mysqli_query($objConn,$del);
			
			$query_product_image = "SELECT image FROM power_products WHERE category_id IN ( ".$all_cat.")";
			$product_image = mysqli_query($objConn,$query_product_image) or die(mysql_error());
			$row_product_image = mysql_fetch_assoc($product_image);
			$totalRows_product_image = mysqli_num_rows($product_image);
			//check that ids have products
			if($totalRows_product_image) {	
				//remove the prodcut image
				do {
					if(isset($row_product_image['image']) && $row_product_image['image'] != '' && file_exists("../".$row_product_image['image'])) {
						unlink("../".$row_product_image['image']);
					}
				} while($row_product_image = mysql_fetch_assoc($product_image));
				
			}
			//remove the products
			$del_product="delete from power_products where category_id in (".$all_cat.")";
			$del2=mysqli_query($objConn,$del_product);
		}
	}

	//sort number
	$sort="select * from power_menu where category_parent=".$_REQUEST['id']." order by category_display";
	$sort1=mysqli_query($objConn,$sort);
	$asc=1;
	while($sort2=mysqli_fetch_array($sort1))
	{
		$up="update power_menu set category_display=".$asc." where category_id=".$sort2['category_id'];
		$up1=mysqli_query($objConn,$up);
		$asc++;
	}
	

}
if($count1>0)
header("location:cate_sub_list.php?del=1&id=".$_REQUEST['id']."");
$delete=1;
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
		if(!IsEmpty("oldpass", "Please Enter Password"))
			return false;
		if(!IsEmpty("newpass", "Please Enter New Password"))
			return false;
		if(!IsEmpty("newpass1", "Please Enter Retype New Password"))
			return false;
		if(!IsSame("newpass1","newpass", "Mismatch Password"))
			return false;
			return true;
}
function val()
{
    dml1=document.frm1;
	len1 = dml1.elements.length;
	var j=0;
	
	delselect=0;
	for( j=0 ; j<len1 ; j++)
	 {
		if (dml1.elements[j].name=='del[]')
		 {
				if((dml1.elements[j].checked))
				{
				delselect=1;
				}
		}
	}
  if(delselect==0)
	{
		alert("Select atleast one Detail");
		return false;
	}
	if(!confirm('Are you sure you want to delete the Main Category and all associated Subcategory?\n- to Delete the Category, hit OK\n- otherwise, hit Cancel'))
		return false;
  document.frm1.submit();
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
            <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td colspan="3" align="left" valign="middle" class="pagehead">                        <?php $main="select * from power_menu where category_id=".$_REQUEST['id'];
				   $main1=mysqli_query($objConn,$main);
				   $main2=mysqli_fetch_array($main1);
				   echo $main2['category_name'];
				?>                      </td>
                      </tr>
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="right" valign="middle" class="message">
					  <?php
					   if($_GET['del'] != '')
					    echo "Category has been deleted successfully.";
						if($_GET['res'] != '' && $_GET['res'] != 'updated')
					    echo "Category has been added cuccessfully.";
						if($_GET['res'] == 'updated')
						echo "Category has been updated cuccessfully.";
						if($_GET['sort'] != '')
					    echo "Category has been ordered successfully.";
						?></td>
                      <td align="right" valign="middle"><table width="50%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="145" align="center" valign="middle">
                            
                            
                            <?php /*?><?php
					     $cmsback="select category_name,category_id,category_parent from power_menu where category_id=".$_REQUEST['id']."";
					     $cmsback1=mysqli_query($objConn,$cmsback);
					     $cmsback2=mysqli_fetch_array($cmsback1);
				         ?>
                           <?php
                              if($cmsback2['category_parent']==0)
							  {?>
                            <a   href="cate_list.php" class="innerlink" >Category List</a>
                           <?php
                               }
							   else
							   {?>
                    <a   href="cate_sub_list.php?id=<?php echo $cmsback2['category_parent'];?>" class="innerlink">Back To list</a>
                            <?php } ?>                           </td>
                            <td width="25" align="left" valign="middle"><span class="devid1">l</span></td> <?php */?>
                            <td width="27" align="left" valign="middle"><a href="cate_sub_add.php?id=<?php echo $_REQUEST['id']?>" class="innerlink">Add</a></td>
                            <td width="23" align="center" valign="middle" class="devid1">l</td>
                            <td width="137" align="left" valign="middle"><a href="#" class="innerlink"   onclick="return val();">Delete</a></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="5" colspan="2" align="left" valign="top"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><form action="" method="post" name="frm1" id="frm1">
                    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#a8fbbd">
                      <tr>
                        <td width="4%" height="25" bgcolor="#008721">&nbsp;</td>
                        <td width="36%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead"> Category Name</td>
                        <td width="21%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead">Sub Category</td>
                        <td width="8%" align="center" valign="middle" bgcolor="#008721" class="tablehead">Up</td>
                        <td width="8%" align="center" valign="middle" bgcolor="#008721" class="tablehead">Down</td>
                        <td width="10%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead">Status</td>
                        <td width="12%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead">Edit</td>
                      </tr>
                      <?php //#CBD0D3   #DEE1E2
			  $sel="select * from power_menu where category_parent=".$_REQUEST['id']." order by category_display";
			  $sel1=mysqli_query($objConn,$sel);
			   $max="select max(category_display) from power_menu where category_parent=".$_REQUEST['id'];
			  $max1=mysqli_query($objConn,$max);
			  $max2=mysqli_fetch_row($max1);
			  $sel3=mysqli_num_rows($sel1);
			  if($sel3==0)
			  {?>
                      <tr>
                        <td height="25" colspan="7" align="center" valign="middle" bgcolor="#82d597" class="text" > No Subcategories Available.</td>
                      </tr>
                      <?php
			  }
			  else
			  {
			  while($sel2=mysqli_fetch_array($sel1))
			  {
			  ?>
                      <tr>
                        <td align="center" valign="middle" bgcolor="#82d597"><input type="checkbox" name="del[]" id="del" value="<?php echo $sel2['category_id']?>" /></td>
                        <td align="left" valign="middle" bgcolor="#82d597" class="tabletext"><?php echo $sel2['category_name']?></td>
                        <td align="center" valign="middle" bgcolor="#82d597" class="tabletext"><?php
				$sub="select * from power_menu where category_parent=".$sel2['category_id'];
				$sub1=mysqli_query($objConn,$sub);
				$sub2=mysqli_fetch_row($sub1);
				if($sub2[0]>0)
				{
				echo "Yes &nbsp;<span  class=devid1> l </span>&nbsp; ";
				?>
                            <a href="cate_sub_list.php?id=<?php echo $sel2['category_id']?>" class="tabletext">View</a>
                            <?php }
				else
				{
				echo "No  &nbsp;<span  class=devid1> l </span>&nbsp; ";
					//if the catid have products then "ADD" is not open
					$qry_pro_ext="select * from power_products where category_id=".$sel2['category_id'];
					$pro_ext=mysqli_query($objConn,$qry_pro_ext);
					$tot_pro_ext=mysqli_num_rows($pro_ext);
					if($tot_pro_ext) {
						echo "NA";
					} else {
				?>
                            <a href="cate_sub_list.php?id=<?php echo $sel2['category_id']?>" class="tabletext">Add</a>
                <?php } ?>    
                      
                           <?php }
				
				?></td>
                        <td align="center" valign="middle" bgcolor="#82d597"><?php if($sel2['category_display']==1)
				  {?>
                          -
                          <?php
				  }
				  else
				  {
				  ?>
                            <a  href="update_order_sub.php?sign=d&amp;id=<?php echo $sel2['category_id']; ?>&amp;par=<?php echo $_REQUEST['par']?>&amp;cat=<?php echo $_REQUEST['id']?>" > <img src="images/up.gif" border="0" /></a>
                            <?php
				  }?></td>
                        <td align="center" valign="middle" bgcolor="#82d597"><?php if($max2[0]==$sel2['category_display'])
				  {?>
                          -
                          <?php
				  }
				  else
				  {?>
                            <a  href="update_order_sub.php?sign=u&amp;id=<?php echo $sel2['category_id']; ?>&amp;par=<?php echo $_REQUEST['par']?>&amp;cat=<?php echo $_REQUEST['id']?>"> <img src="images/down.gif" border="0" /></a>
                            <?php
				  }?></td>
                        <td align="center" valign="middle" bgcolor="#82d597"><?php 
				if($sel2['category_status']==0)
				 echo "<img src=images/icon_yes.gif width=60 height=15>";
				 else
				  echo "<img src=images/icon_no.gif width=60 height=15>";
				
				?>                        </td>
                        <td align="center" valign="middle" bgcolor="#82d597"><a href="cate_sub_edit.php?id=<?php echo $sel2['category_id'];?>"> <img src="images/icon_edit.gif" width="60" height="15" border="0" /></a></td>
                      </tr>
                      <?php }
			  }
			  ?>
                    </table>
                </form></td>
                <td align="right" valign="top"><?php //include_once('inc_right_panel.php');?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
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
