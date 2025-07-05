<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php 

if(isset($_POST['MM_Update_Status']) && $_POST['MM_Update_Status'] == 'Update Status') {
	$all_ids = $_POST['sel_values'];
	$all_ids = substr($all_ids, 0, strlen($all_ids)-1);
	
	//get the image ids
	$query_get_product_image = sprintf("SELECT image FROM power_products WHERE id IN (".$all_ids.")");
	$get_product_image = mysqli_query($objConn,$query_get_product_image, $objConn) or die(mysql_error());
	$row_get_product_image= mysql_fetch_assoc($get_product_image);
	$totalRows_get_product_image = mysqli_num_rows($get_product_image);
	
	if($totalRows_get_product_image) {
		do {
			$image_path = $row_get_product_image['image'];
			//delete the image
			if(isset($image_path) && $image_path != '' && file_exists('../'.$image_path)) unlink($image_path);
		} while($row_get_product_image= mysql_fetch_assoc($get_product_image));
	}
	//delete the product
	$delete_SQL = "DELETE FROM power_products WHERE id IN(".$all_ids.")";
	$Result = mysqli_query($objConn,$delete_SQL);
	//redirect
	header('Location:products_list.php?catid='.$_POST['catid'].'&res=deleted');
	exit;
}
header('Location:products_list.php');
exit;	
?>