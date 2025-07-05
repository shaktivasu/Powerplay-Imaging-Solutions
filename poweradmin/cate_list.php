<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
$count=(isset($_POST['del']))?$_POST['del']:NULL; 
$count1=count($count);
for($i=0;$i<=$count1;$i++)
{
	/*
	$del="delete from power_menu where category_parent=".$_POST['del'][$i];
	$del1=mysqli_query($objConn,$del);
	$del="delete from power_menu where category_id=".$_POST['del'][$i];
	$del1=mysqli_query($objConn,$del);
	*/
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
					if($totalRows_event_image && isset($row_event_image['category_banner']) && $row_event_image['category_banner'] != '' && file_exists($row_event_image['category_banner'])) {
						//remove the  cat image
						unlink($row_event_image['category_banner']);
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
					if(isset($row_product_image['image']) && $row_product_image['image'] != '' && file_exists($row_product_image['image'])) {
						unlink($row_product_image['image']);
					}
				} while($row_product_image = mysql_fetch_assoc($product_image));
				
			}
			//remove the products
			$del_product="delete from power_products where category_id in (".$all_cat.")";
			$del2=mysqli_query($objConn,$del_product);
		}
	}

	$sort="select * from power_menu where category_parent=0 order by category_display";
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
header("location:cate_list.php?del=1");
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
	getForm("form1");
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
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="25" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="20" align="left" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle"><table width="100" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="29" align="right" valign="middle">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="middle" class="pagehead">Category List Page</td>
                  </tr>
                <?php if($_GET['res'] != '') {?>
                <tr>
                  <td colspan="2" align="left" valign="middle" class="message"><?php echo "Category has been ".$_GET['res']." Successfully.";?></td>
                  </tr>
                  <?php } ?>
            </table></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="5" colspan="2" align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top"><form action="" method="post" name="frm1" id="frm1">
                <table width="50%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#a8fbbd">
                  <tr>
                    <td width="37%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead"> Category Name</td>
                    <td width="15%" height="25" align="center" valign="middle" bgcolor="#008721" class="tablehead">Sub Category</td>
                    </tr>
                  <?php  
			  $i=0;
			  $sel="select * from power_menu where category_parent=0 order by category_display";
			  $sel1=mysqli_query($objConn,$sel);
			  $max="select max(category_display) from power_menu where category_parent=0";
			  $max1=mysqli_query($objConn,$max);
			  $max2=mysqli_fetch_row($max1);
			  while($sel2=mysqli_fetch_array($sel1))
			  {
			
			   if($i==1)
			  $bg="bgcolor=#82d597";
			   if($i==0)
			  $bg="bgcolor=#FFFFFF";
			  
			  ?>
                  <tr>
                    <td align="center" valign="middle"   <?php echo $bg?> ><?php
                if($sel2['category_id']==$_REQUEST['id'] && $_REQUEST['up']==1)
				{?>
                        <a href="cate_list.php?id=<?php echo $sel2['category_id']?>" class="tabletext">&nbsp;<?php echo $sel2['category_name']?></a>
                        <?php }
				else
				{?>
                        <a href="cate_list.php?id=<?php echo $sel2['category_id']?>" class="tabletext"><?php echo $sel2['category_name']?></a>
                        <?php
				}?></td>
                    <td align="center" valign="middle"  class="tabletext"  <?php echo $bg?>>
					<?php
				$sub="select * from power_menu where category_parent=".$sel2['category_id'];
				$sub1=mysqli_query($objConn,$sub);
				$sub2=mysqli_fetch_row($sub1);
				if($sub2[0]>0)
				{
				echo "Yes &nbsp;<span  class=devid1>l</span>&nbsp; ";
				?>
                        <a href="cate_sub_list.php?id=<?php echo $sel2['category_id']?>" class="tabletext">View</a>
                        <?php }
				else
				{
				echo "No  &nbsp;<span  class=devid1>l</span>&nbsp;  ";
					//if the catid have products then "ADD" is not open
					$qry_pro_ext="select * from power_products where category_id=".$sel2['category_id'];
					$pro_ext=mysqli_query($objConn,$qry_pro_ext);
					$tot_pro_ext=mysqli_num_rows($pro_ext);
					if($tot_pro_ext) {
						echo "NA";
					} else {
					  ?>
                        <a href="cate_sub_list.php?id=<?php echo $sel2['category_id']?>&amp;par=<?php echo $sel2['category_id']?>" class="tabletext">Add</a>
                        <?php
					}
					}
				
				?></td>
                    </tr>
                  <?php 
			  if($i==0)
			  $i++;
			  else
			  $i--;
			  }?>
                </table>
            </form></td>
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
