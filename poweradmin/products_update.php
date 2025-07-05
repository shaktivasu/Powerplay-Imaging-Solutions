<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php'); ?>
<?php include_once('inc_admin_logincheck.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php 
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit_product")) {
	
	if($_FILES['image']['name'] != '' && isset($_FILES['image']['name'])) {
		//delete old file if exists
		if(isset($_REQUEST['old_image']) && $_REQUEST['old_image'] != '' && file_exists($_REQUEST['old_image'])) {
			unlink($_REQUEST['old_image']);
		}
		//file uploading
		$gettime=mysqli_query($objConn,"select unix_timestamp(now())");
		$timeresult=mysql_result($gettime,0);
		
		$imagename=$_FILES['image']['name'];
		$photoname=$timeresult.$imagename;
		
		$folder_location = "upload/products/";
		
		$target_path =$folder_location.$timeresult.basename( $_FILES['image']['name']); 
		move_uploaded_file($_FILES["image"]['tmp_name'],$target_path);
	} else {
		$target_path = $_REQUEST['old_image'];
	}
	///////////////
	$price = $dis_price = $bb_price = $was_price = $mak_charge = $no_of_piece = $pr_pe_piece = $wt_of_stone = $pr_pe_stone = '';
	if(isset($_POST['discount_price']) && $_POST['discount_price'] != '') $dis_price = $_POST['discount_price'];

	if($_POST['price_type'] == 'Fixed') {
		$price = $_POST['price'];
		$bb_price = $_POST['bb_price'];
	} else {
		$was_price = $_POST['wastage'];
		$mak_charge = $_POST['making_charge'];
		if($_POST['stones'] != 'None') {
			if($_POST['stones'] == 'Price') {	
				$no_of_piece = $_POST['number_of_pieces'];
				$pr_pe_piece = $_POST['price_per_piece'];
			} else {
				$wt_of_stone = $_POST['weight_of_stone'];
				$pr_pe_stone = $_POST['price_per_stone'];
			}
		} 
	}
	///////////////
	
echo 	$updateSQL = sprintf("UPDATE power_products SET category_id=%s, name=%s, `size`=%s, newarrival=%s, status=%s, image=%s, code=%s, weight=%s, best_seller=%s, stock=%s, reorder=%s, occasion=%s, price_type=%s, description=%s, wastage=%s, making=%s, stone_piece_num=%s, stone_piece_num_price=%s, stone_weight=%s, stone_weight_price=%s, price=%s, discount_price=%s, bb_price=%s, stone_type=%s, enable_to_b2b =%s WHERE id=%s",
                       GetSQLValueString($_POST['category_id'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['item_size'], "text"),
                       GetSQLValueString($_POST['newarrival'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($target_path, "text"),
                       GetSQLValueString($_POST['code'], "text"),
                       GetSQLValueString($_POST['weight'], "double"),
                       GetSQLValueString($_POST['best_seller'], "text"),
                       GetSQLValueString($_POST['stock_quantity'], "int"),
                       GetSQLValueString($_POST['reorder_quantity'], "int"),
                       GetSQLValueString($_POST['occasion'], "int"),
                       GetSQLValueString($_POST['price_type'], "text"),
					   GetSQLValueString($_POST['description'], "text"),
					   GetSQLValueString($was_price, "double"),
                       GetSQLValueString($mak_charge, "double"),
					   GetSQLValueString($no_of_piece, "int"),
                       GetSQLValueString($pr_pe_piece, "double"),
                       GetSQLValueString($wt_of_stone, "double"),
                       GetSQLValueString($pr_pe_stone, "double"),
					   GetSQLValueString($price, "double"),
                       GetSQLValueString($dis_price, "double"),
                       GetSQLValueString($bb_price, "double"),
					   GetSQLValueString($_POST['stones'], "text"),
					   GetSQLValueString($_POST['enable_to_b2b'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

    mysql_select_db($database_objConn, $objConn);
    $Result1 = mysqli_query($objConn,$updateSQL, $objConn) or die(mysql_error());
	
	
	$updateGoTo = "product_list.php";
	if (isset($_SERVER['QUERY_STRING'])) {
	$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
	$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header("Location:products_list.php?catid=".$_POST['category_id']."&res=updated");
	exit;
}

?>
