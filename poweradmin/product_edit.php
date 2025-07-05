<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php 
include_once ('Editor/editor_functions.php');
include_once ('Editor/config.php');
include_once ('Editor/editor_class.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_edit_product = "-1";
if (isset($_GET['id'])) {
  $colname_edit_product = $_GET['id'];
}
mysql_select_db($database_objConn, $objConn);
$query_edit_product = sprintf("SELECT power_products.*, power_menu.category_name FROM power_products INNER JOIN (power_menu) ON (power_products.category_id = power_menu.category_id) WHERE id= %s", GetSQLValueString($colname_edit_product, "int"));
$edit_product = mysqli_query($objConn,$query_edit_product, $objConn) or die(mysql_error());
$row_edit_product = mysql_fetch_assoc($edit_product);
$totalRows_edit_product = mysqli_num_rows($edit_product);
if(!$totalRows_edit_product) {
	header('Location:products_list.php');
	exit;
}
/*
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}*/

//TREE
mysql_select_db($database_objConn, $objConn);
$query_all_category = sprintf("SELECT * FROM power_menu where category_status=0");
$all_category = mysqli_query($objConn,$query_all_category, $objConn) or die(mysql_error());
$row_all_category = mysql_fetch_assoc($all_category);
$totalRows_all_category = mysqli_num_rows($all_category);
if($totalRows_all_category) {
	do {	
		$all_cat_ids[] = $row_all_category['category_id'];
	}while($row_all_category = mysql_fetch_assoc($all_category));
}
//echo count($all_cat_ids);
for($i=1; $i<count($all_cat_ids); $i++ ) {
	//echo $all_cat_ids[$i]."<hr/>";
	//check the id is exist as root category
	mysql_select_db($database_objConn, $objConn);
	$query_check_root_category = sprintf("SELECT * FROM power_menu WHERE category_parent =".$all_cat_ids[$i]." and  category_status=0");
	$check_root_category = mysqli_query($objConn,$query_check_root_category, $objConn) or die(mysql_error());
	$row_check_root_category = mysql_fetch_assoc($check_root_category);
	$totalRows_check_root_category = mysqli_num_rows($check_root_category);
	if($totalRows_check_root_category) {
		$all_cat_ids[$i] = '';
	}
}
$k=1;
for($j=1; $j<count($all_cat_ids); $j++ ) {
	//echo $all_cat_ids[$j]."<hr/>";
	if(isset($all_cat_ids[$j]) && $all_cat_ids[$j] != '' ) {
		$all_ids[$k] = $all_cat_ids[$j];
		$k++;
	}
	
}
//TREE

?>
<?php
/*$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript" src="../js/formvalidation.js"></script>
<script language="javascript" src="js/checkcodeedit.js"></script>
<script language="javascript" src="../js/setelementstyle.js"></script>
<script type="text/javascript">
<!--
function validateproductedit() {
	//alert("fun is call.."); isEmpty
	//var e= document.forms['edit_product'].elements;
//	if(e['category_id'].value == '') {
//		alert("Please select the Category");
//		e['category_id'].focus();
//		return false;
//	}
	if(isEmpty(e['name'].value)) {
		alert("Please enter the Name");
		e['name'].focus();
		return false;
	}
	/*un = e['name'].value
	val_char_flg = CheckLetters(un);
	if(val_char_flg == "true") {
	} else {	
		alert("Please enter valid Name")
		return false;
	}*/
	if(isEmpty(e['code'].value)) {
		alert("Please enter the Code");
		e['code'].focus();
		return false;
	}

	if(isEmpty(e['item_size'].value)) {
		alert("Please enter the Size");
		e['item_size'].focus();
		return false;
	}
	var l = e['status'].length;
	l--;
	var chkd = "false";
	for(i=0; i<=l; i++) {
		if(document.edit_product.status[i].checked == true) {
			chkd = "true";
			break;
		}
	}
	if(chkd == "false") {
		alert("Please select the Status")
		return false;
	}
	
	var nl = e['newarrival'].length;
	var nc = "false";
	for(j=0; j<nl; j++) {
		if(document.edit_product.newarrival[j].checked == true) {
			nc = "true";
			break;
		}
	} 
	if(nc == "false") {
		alert("Please select the New Arrival option")
		return false;
	}
	var bl = e['best_seller'].length;
	var bc = "false";
	for(k=0; k<bl; k++) {
		if(document.edit_product.best_seller[k].checked == true) {
			bc = "true";
			break;
		}
	} 
	if(bc == "false") {
		alert("Please select the Best Selling option")
		return false;
	}
	
	if(isEmpty(e['weight'].value)) {
		alert("Please enter the Weight");
		e['weight'].focus();
		return false;
	}
	var wtflag;
	wtflag = isFloat(e['weight'].value);
	if(wtflag == false) {
		alert("Please enter the valid Weight");
		e['weight'].focus();
		return false;
	} 
	/*
	if(isEmpty(e['occasion'].value)) {
		alert("Please select the Occasion");
		e['occasion'].focus();
		return false;
	}
	*/
	if(isEmpty(e['stock_quantity'].value)) {
		alert("Please enter the Stock Quantity");
		e['stock_quantity'].focus();
		return false;
	}
	if(isEmpty(e['reorder_quantity'].value)) {
		alert("Please select the Reorder Quantity");
		e['reorder_quantity'].focus();
		return false;
	}
	if(isEmpty(e['image'].value) && isEmpty(e['old_image'].value)) {
		alert("Please select the Image");
		e['image'].focus();
		return false;
	}
	if(e['image'].value != "")
	{
		var pattern=/(GIF|JPG|gif|jpg|jpeg|png|PNG)/;
		var thumb1=e['image'].value ;
		var thumb2=thumb1.split(".");
		var no=thumb2.length;
		var pat=thumb2[no-1];
		var matchval=pat.match(pattern);
		if(matchval==null)
		{
				alert("Invalid image format !");
				return false;
		}
	}
	var pl = e['price_type'].length;
	var pc = "false";
	for(m=0; m<pl; m++) {
		if(document.edit_product.price_type[m].checked == true) {
			pc = "true";
			break;
		}
	} 
	if(pc == "false") {
		alert("Please select the Price Type")
		return false;
	}
	if(e['discount_price'].value != '') {
		var dpflag;
		dpflag = isFloat(e['discount_price'].value);
		if(dpflag == false) {
			alert("Please enter the valid Discount Price");
			e['discount_price'].focus();
			return false;
		} 
	}
	if(document.edit_product.price_type[2].checked == false) {
		var bl = e['enable_to_b2b'].length;
		var bc = "false";
		for(n=0; n<bl; n++) {
			if(document.edit_product.enable_to_b2b[n].checked == true) {
				bc = "true";
				break;
			}
		} 
		if(bc == "false") {
			alert("Please select the option for 'Show this item to B2B?'")
			return false;
		}
	}
	/////////////
	if(document.edit_product.price_type[0].checked == true) {
		if(isEmpty(e['price'].value)) {
			alert("Please enter the Price");
			e['price'].focus();
			return false;
		}
		var prflag;
		prflag = isFloat(e['price'].value);
		if(prflag == false) {
			alert("Please enter the valid Price");
			e['price'].focus();
			return false;
		} 
		
		var dpflag;
		dpflag = isFloat(e['discount_price'].value);
		if(dpflag == false) {
			alert("Please enter the valid Discount Price");
			e['discount_price'].focus();
			return false;
		} 
		if(e['discount_price'].value >= 100) {
			alert("Please enter the valid Discount Price and it should be < 100");
			e['discount_price'].focus();
			return false;
		}
	} 
	if(document.edit_product.price_type[1].checked == true) {
		if(isEmpty(e['wastage'].value)) {
			alert("Please enter the Wastage");
			e['wastage'].focus();
			return false;
		}
		var waflag;
		waflag = isFloat(e['wastage'].value);
		if(waflag == false) {
			alert("Please enter the valid Wastage Price");
			e['wastage'].focus();
			return false;
		} 
		if(isEmpty(e['making_charge'].value)) {
			alert("Please enter the Making Charge");
			e['making_charge'].focus();
			return false;
		}
		var maflag;
		maflag = isFloat(e['making_charge'].value);
		if(maflag == false) {
			alert("Please enter the valid Making Price");
			e['making_charge'].focus();
			return false;
		} 
		var sl = e['stones'].length;
		var sc = "false";
		for(n=0; n<sl; n++) {
			if(document.edit_product.stones[n].checked == true) {
				sc = "true";
				break;
			}
		} 
		if(sc == "false") {
			alert("Please select the Stone")
			return false;
		}
		if(e['stones'].value != 'None') {
			if(e['stones'].value == 'Price') {
				if(isEmpty(e['number_of_pieces'].value)) {
					alert("Please enter the Number of Pieces");
					e['number_of_pieces'].focus();
					return false;
				}
				if(isEmpty(e['price_per_piece'].value)) {
					alert("Please enter the Price per Piece");
					e['price_per_piece'].focus();
					return false;
				}
				var ppflag;
				ppflag = isFloat(e['price_per_piece'].value);
				if(ppflag == false) {
					alert("Please enter the valid Price per Piece");
					e['price_per_piece'].focus();
					return false;
				} 
			} else {
				if(isEmpty(e['weight_of_stone'].value)) {
					alert("Please enter the Weight of Stone");
					e['weight_of_stone'].focus();
					return false;
				}
				if(isEmpty(e['price_per_stone'].value)) {
					alert("Please enter the Price per Stone");
					e['price_per_stone'].focus();
					return false;
				}
				var ppsflag;
				ppsflag = isFloat(e['price_per_stone'].value);
				if(ppsflag == false) {
					alert("Please enter the valid Price per Stone");
					e['price_per_stone'].focus();
					return false;
				} 
			}
		}
	}
	return true;
}
function show_price_type(val) {
	var pr_ty_val = '';
	if(val == 'Fixed')  {
		pr_ty_val = '<table border="0" cellspacing="2" cellpadding="2" width="100%">';
		pr_ty_val += '<tr>';
		pr_ty_val += '<td width="18%" align="left">Price</td>';
		pr_ty_val += '<td align="left"><input type="text" name="price" id="price" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['price']; ?>" />&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
		pr_ty_val += '</tr>';
		pr_ty_val += ' 	</table>';
	} 
	if(val == 'General') {
		pr_ty_val = '<table border="0" cellspacing="2" cellpadding="2" width="100%">';
        pr_ty_val += '<tr>';
        pr_ty_val += '<td width="18%" align="left">Wastage in Percentage</td>';
		pr_ty_val += '<td align="left"><input type="text" name="wastage" id="wastage" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['wastage']; ?>"/>&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
		pr_ty_val += '</tr>';
		pr_ty_val += '<tr>';
        pr_ty_val += '<td align="left">Making Charge</td>';
        pr_ty_val += '<td align="left"><input type="text" name="making_charge" id="making_charge" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['making']; ?>" />&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
        pr_ty_val += '</tr>';
        pr_ty_val += '<tr>';
        pr_ty_val += '<td align="left">Stone</td>';
        pr_ty_val += '<td align="left"><input <?php if (!(strcmp($row_edit_product['stone_type'],"Price"))) {echo "checked=\"checked\"";} ?> type="radio" name="stones" id="radio" value="Price" onclick="stone_option(this.value)" />Price &nbsp;&nbsp;<input <?php if (!(strcmp($row_edit_product['stone_type'],"Weight"))) {echo "checked=\"checked\"";} ?> type="radio" name="stones" id="radio2" value="Weight" onclick="stone_option(this.value)" />Weight &nbsp;&nbsp;<input <?php if (!(strcmp($row_edit_product['stone_type'],"None"))) {echo "checked=\"checked\"";} ?> type="radio" name="stones" id="radio3" value="None" onclick="stone_option(this.value)" />None&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
        pr_ty_val += '</tr>';
        pr_ty_val += '</table>';
	}
	setElementStyle('B2Boptions', 'display', 'block');
	document.getElementById('price_types').innerHTML = pr_ty_val 
	document.getElementById('stone_options').innerHTML = '';
	setElementStyle('Discount_Percentage', 'display', 'block');
}
function stone_option(val) {
	//stone_options
	var stone_options = ''
	if(val != 'None' && val != '') {
		if(val == 'Price') {
			stone_options = '<table width="100%" border="0" cellspacing="2" cellpadding="2">';
            stone_options += '<tr>';
            stone_options += '<td width="18%" align="left">Number of Pieces</td>';
            stone_options += '<td align="left"><input type="text" name="number_of_pieces" id="number_of_pieces" onkeypress="return numbersonly(this, event, false);" value="<?php echo $row_edit_product['stone_piece_num']; ?>"/>&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
            stone_options += '</tr>';
            stone_options += '<tr>';
            stone_options += '<td align="left">Price per Piece</td>';
            stone_options += '<td align="left"><input type="text" name="price_per_piece" id="price_per_piece" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['stone_piece_num_price']; ?>" />&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
            stone_options += '</tr>';
            stone_options += '</table>';
		} else {
			stone_options = '<table width="100%" border="0" cellspacing="2" cellpadding="2">';
            stone_options += '<tr>';
            stone_options += '<td width="18%" align="left">Weight of Stone (in grams)</td>';
            stone_options += '<td align="left"><input type="text" name="weight_of_stone" id="weight_of_stone" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['stone_weight']; ?>"/>&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
            stone_options += '</tr>';
            stone_options += '<tr>';
            stone_options += '<td align="left">Price per Piece (price per gram)</td>';
            stone_options += '<td align="left"><input type="text" name="price_per_stone" id="price_per_stone" onkeypress="return numbersonly_dot(this, event, false);" value="<?php echo $row_edit_product['stone_weight_price']; ?>"/>&nbsp;<!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>';
            stone_options += '</tr>';
            stone_options += '</table>';
		}
	}
	document.getElementById('stone_options').innerHTML = stone_options;
	

}
function show_hide_b2b() {

	if(document.edit_product.price_type[2].checked == true) {
		document.getElementById('price_types').innerHTML = '';
		document.getElementById('stone_options').innerHTML = '';
		//B2Boptions
		setElementStyle('B2Boptions', 'display', 'none');
		setElementStyle('Discount_Percentage', 'display', 'none');
	} else {
		setElementStyle('B2Boptions', 'display', 'block');
		setElementStyle('Discount_Percentage', 'display', 'block');
	}
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
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
                      <td align="right" valign="middle"><a href="products_list.php?catid=<?php echo $_GET['catid'];?>" class="innerlink">Back to List</a></td>
                    </tr>
                    <tr>
                      <td align="center" valign="middle" class="pagehead">Edit Events</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                  </tr>
                
                <tr>
                  <td colspan="2" align="left" valign="middle"><form action="products_update.php" method="POST" enctype="multipart/form-data" name="edit_product" id="edit_product" onsubmit="return validateproductedit();">
                   <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1">
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td colspan="3" align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="40" colspan="5" align="left" valign="middle"  class="tabletext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="middle">&nbsp;</td>
                            <td align="left" valign="middle"><input type="hidden" name="category_id" value="1" />
                                <!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="pagehead">*</span><!-- #EndLibraryItem --></td>
                            <td align="left" valign="middle"><!-- #BeginLibraryItem "/Library/mandatory.lbi" --><span class="mandatory">Fields marked with <span class="asteriks">*</span> are Mandatotry</span><!-- #EndLibraryItem --></td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td width="19%" align="left" valign="top"  class="tabletext">Name</td>
                        <td width="31%" align="left" valign="top" ><input name="name" type="text" id="name" value="<?php echo $row_edit_product['name']; ?>" />
                         <!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>
                        <td width="1%" align="left" valign="top">&nbsp;</td>
                        <td width="19%" align="left" valign="top"  class="tabletext">&nbsp;</td>
                        <td width="31%" align="left" valign="top" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"  class="tabletext">Status</td>
                        <td align="left" valign="top" ><input <?php if (!(strcmp($row_edit_product['status'],"Active"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio" value="Active" />
                          Active&nbsp;&nbsp;
                          <input <?php if (!(strcmp($row_edit_product['status'],"Inactive"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio2" value="Inactive" />
                          Inactive <!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --></td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top"  class="tabletext">&nbsp;</td>
                        <td align="left" valign="top" >&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td align="left"  class="tabletext">Image</td>
                        <td align="left" valign="top" ><input type="file" name="image" id="image" />
                          <!-- #BeginLibraryItem "/Library/asteriks.lbi" --><span class="asteriks">*</span><!-- #EndLibraryItem --> <br />
Image size 400 X 400 pixels[*.png fils only]
<?php
							$image_name = '';
							if(isset($row_edit_product['image']) && $row_edit_product['image'] != '' && file_exists($row_edit_product['image'])) { ?>
<br />
<a target="_blank" href="<?php echo $row_edit_product['image']; ?>" class="innerlink"><?php echo $row_edit_product['image']; ?></a>
<?php
								$image_name = $row_edit_product['image'];
                            }
							?>
<input type="hidden" name="old_image" id="old_image" value="<?php echo $image_name;?>" /></td>
                        <td>&nbsp;</td>
                        <td align="left"  class="tabletext">&nbsp;</td>
                        <td align="left" valign="top" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"  class="tabletext">Description</td>
                        <td align="left" valign="top" ><?php
					  	$product_desc=$row_edit_product['description'];
						  		$editor = new wysiwygPro();
								//$editor->disablebookmarkmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disableimgmngr(true);
								//$editor->disablelinkmngr(true);
								$editor->removebuttons('document');
								$editor->removebuttons('bookmark');
								//$editor->removebuttons('image');
								
								$editor->set_name('description');						
								$editor->set_code($product_desc);
								$editor->print_editor(550, 390); 
						  	?></td>
                        <td>&nbsp;</td>
                        <td valign="top"  class="tabletext">&nbsp;</td>
                        <td align="left" valign="top" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="5" valign="top"  class="tabletext">&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td colspan="5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="18%" height="30">&nbsp;</td>
                            <td width="82%"><input type="submit" name="button" id="button" value="Submit" />
                              &nbsp;&nbsp;
                              <input name="button2" type="button" id="button2" onclick="MM_goToURL('parent','products_list.php?catid=<?php echo $_GET['catid'];?>');return document.MM_returnValue" value="Cancel" />
                              <input name="id" type="hidden" id="id" value="<?php echo $row_edit_product['id']; ?>" /></td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table>
                   <input type="hidden" name="MM_update" value="edit_product" />
                  </form></td>
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
<script language="javascript" type="text/javascript">show_price_type('<?php echo $row_edit_product['price_type']; ?>'); stone_option('<?php echo $row_edit_product['stone_type']; ?>'); show_hide_b2b();</script>
</body>

</html>
<?php
mysql_free_result($get_all_occasion);

mysql_free_result($edit_product);
?>

