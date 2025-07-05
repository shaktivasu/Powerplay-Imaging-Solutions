<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php
mysql_select_db($database_objConn, $objConn);
if($_GET['catid']!='')
{
$query_list_all_products = sprintf("SELECT power_products.*, power_menu.category_name FROM power_products INNER JOIN (power_menu) ON (power_products.category_id = power_menu.category_id) where power_products.category_id=".$_GET['catid']." ORDER BY sortnumber");
$list_all_products = mysqli_query($objConn,$query_list_all_products, $objConn) or die(mysql_error());
$row_list_all_products = mysql_fetch_assoc($list_all_products);
$totalRows_list_all_products = mysqli_num_rows($list_all_products);
}
?>
<?php
$query_all_category = sprintf("SELECT * FROM power_menu where category_status=0");
$all_category = mysqli_query($objConn,$query_all_category, $objConn) or die(mysql_error());
$row_all_category = mysql_fetch_assoc($all_category);
$totalRows_all_category = mysqli_num_rows($all_category);
if($totalRows_all_category) {
	do {	
		$all_cat_ids[] = $row_all_category['category_id'];
	}while($row_all_category = mysql_fetch_assoc($all_category));
}
for($i=0; $i<=count($all_cat_ids); $i++ ) {
	//echo $all_cat_ids[$i]."<hr/>";
	//check the id is exist as root category
	if(isset($all_cat_ids[$i]) && $all_cat_ids[$i] != '') {
		mysql_select_db($database_objConn, $objConn);
		$query_check_root_category = sprintf("SELECT * FROM power_menu WHERE category_parent =".$all_cat_ids[$i])." and category_status=0";
		$check_root_category = mysqli_query($objConn,$query_check_root_category, $objConn) or die(mysql_error());
		$row_check_root_category = mysql_fetch_assoc($check_root_category);
		$totalRows_check_root_category = mysqli_num_rows($check_root_category);
		if($totalRows_check_root_category) {
			$all_cat_ids[$i] = '';
		}
	}	
}
$k=1;
for($j=0; $j<=count($all_cat_ids); $j++ ) {
	//echo $all_cat_ids[$j]."<hr/>";
	if(isset($all_cat_ids[$j]) && $all_cat_ids[$j] != '' ) {
		$all_ids[$k] = $all_cat_ids[$j];
		$k++;
	}
	
}
//TREE
//echo count($ind_category_tree);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link href="../stylesheet.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="../js/formvalidation.js"></script>
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript">
function confirmDeleteLink(str, url){
	if(confirm(str)){		
		//window.location = url;
		return true
		
	} else {
			return false;
	}
}
function validate(actionval) {
	//alert(actionval);
	//alert(document.product_listing.totalcount.value)	
	var valflag = "false";
	var tot = document.product_listing.totalcount.value;
	
	var actval = '';
	var e=document.forms['product_listing'].elements;
	for(a=1; a<=tot; a++) {
		var chkbox = 'product_'+a;
		if(e[chkbox].checked == true) {
			actval = e[chkbox].value+","+actval;
			valflag = "true";
		}
	}
	e['sel_values'].value = actval
	e['action'].value = actionval
	if(valflag == "true") {
		if(valflag == "true" && actionval != 'delete') {
			//window.location.href='products_delete.php?action='+actionval;
			document.product_listing.submit();
		} 
		if(valflag == "true" && actionval == 'delete') {
			var res = confirmDeleteLink('Do you really want to delete the selected Events?','products_delete.php?ection=delete');
			if(res == true) {
				document.product_listing.submit();
			}
		}
	} else {
		alert("Please select atleast one product")
	}	
	//return true;
}
function all_option() {
	var e=document.forms['product_listing'].elements;
	var tot = document.product_listing.totalcount.value;
	for(a=1; a<=tot; a++) {
		var chkbox = 'product_'+a;
		if(e['checkall'].checked == true) {
			e[chkbox].checked = true;
		} else {
			e[chkbox].checked = false;
		}
		
	}
	
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
            <td height="25" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="20" align="left" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                </tr>
                
                <tr>
                  <td colspan="2" align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td colspan="3" align="center" valign="middle" class="pagehead">News &amp; Events</td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td class="message">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="30%">&nbsp;</td>
                      <td width="17%" class="message">&nbsp;</td>
                      <td width="53%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><table width="350" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                          <td width="25%" align="center" valign="middle">						  </td>
                          <td width="37%" align="center" valign="middle"> <?php if($_GET['catid']!='') { ?>
                              <a href="javascript:validate('delete');" class="innerlink">Delete</a>
                              <?php } ?></td>
                          <td width="38%" align="center" valign="middle"><?php  if($_GET['catid']!='') { ?>
                              <a href="product_new.php?catid=<?php echo $_GET['catid'];?>" class="innerlink">Add Events</a>
                              <?php } ?></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <?php if(isset($_GET['res']) && $_GET['res'] != '') {?>
                      <tr class="message">
                        <td colspan="10" bgcolor="#FFFFFF" align="center" height="30">Event has been <?php echo $_GET['res'];?> successfully.</td>
                        </tr>
					<?php } ?>	
</table>
                    <?php
      if($_GET['catid']!='')
{?>
<form id="product_listing" name="product_listing" method="post" action="products_delete.php">
                    <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#E4E8E9">
                    
                      
                      <tr class="tablehead">
                        <td width="5%" align="center" valign="middle" bgcolor="#D632A5"><input type="checkbox" name="checkall" id="checkall" onclick="all_option();" /></td>
                        <td width="17%" align="center" valign="middle" bgcolor="#D632A5">Name
                          <input name="MM_Update_Status" type="hidden" id="MM_Update_Status" value="Update Status" />
                          <input type="hidden" name="action" id="action" />
                          <input type="hidden" name="sel_values" id="sel_values" />
                          <input name="catid" type="hidden" id="catid" value="<?php echo $_GET['catid'];?>" /></td>
                      
                       
                        <td width="12%" align="center" valign="middle" bgcolor="#D632A5">Status</td>
                        <td width="5%" align="center" valign="middle" bgcolor="#D632A5">Up</td>
                        <td width="5%" align="center" valign="middle" bgcolor="#D632A5">Down</td>
                        <td width="10%" align="center" valign="middle" bgcolor="#D632A5">Edit</td>
                      </tr>
                      <?php 
					  if($totalRows_list_all_products) {
						  $i=1;
						  do {?>
						  <tr bgcolor="#f9f2e2">
							<td align="center" bgcolor="#F9C6F1"><input type="checkbox" id="product_<?php echo $i;?>" name="product_<?php echo $i;?>" value="<?php echo $row_list_all_products['id'];?>" />                            </td>
							<td bgcolor="#F9C6F1"> <?php echo $row_list_all_products['name'];?> &nbsp;<?php 
							if($row_list_all_products['newarrival']=='Yes')
							{ ?> 
							<img src="images/New_icons_10.gif" width="28" height="11" border="0" />
                            <?php }
                            else
							{?>
                            <?php } ?>							                      </td>
						
							
							<td align="center" bgcolor="#F9C6F1"><?php 
				if($row_list_all_products['status']=='Active')
				 echo "<img src=images/icon_yes.gif width=60 height=15>";
				 else
				  echo "<img src=images/icon_no.gif width=60 height=15>";
				
				?></td>
						   <td align="center" valign="middle" bgcolor="#F9C6F1">
							     <?php 
								  if($i == 1) { 
									echo "-";
								  } else {?>
									<a href="update_sort.php?catid=<?php echo $_GET['catid'];?>&sign=d&amp;id=<?php echo $row_list_all_products['id']; ?>" > <img src="images/up.gif" border="0" /></a>
								 <?php  }
								?></td>
							<td align="center" valign="middle" bgcolor="#F9C6F1">
                            	<?php 
								if($totalRows_list_all_products == $i) {
									echo "-";
								} else { ?>
                                      <a href="update_sort.php?catid=<?php echo $_GET['catid'];?>&sign=u&amp;id=<?php echo $row_list_all_products['id']; ?>"> <img src="images/down.gif" border="0" /></a>
                                <?php 
								}
								?>                            </td>
							<td align="center" valign="middle" bgcolor="#F9C6F1"><a href="product_edit.php?catid=<?php echo $_GET['catid'];?>&id=<?php echo $row_list_all_products['id'];?>" class="innerlink">Edit</a></td>
						  </tr>
						  <?php
						  $i++;
						  } while($row_list_all_products = mysql_fetch_assoc($list_all_products)); $i--;
                      } else {
					  	$i=0; ?>
                        <tr bgcolor="#f9f2e2">
                        	<td bgcolor="#F9C6F1">&nbsp;</td>
                            <td colspan="5" bgcolor="#F9C6F1" class="message">Products not found.</td>
                        </tr>
					<?php	
					  }   
					  ?>  
                    <input type="hidden" name="totalcount" id="totalcount" value="<?php echo $i;?>" />
                    </table>
                        </form>
                        <?php } ?>                  </td>
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
