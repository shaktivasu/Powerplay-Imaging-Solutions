<?php include_once('inc_setsession.php'); ?>
<?php include_once('../Connections/objConn.php'); ?>
<?php include_once('inc_admin_logincheck.php');?>
<?php include_once('inc_functions.php');?>
<?php 
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
/*foreach($_REQUEST as $l => $v) {
	echo $l." => ".$v."<br/>";
}*/

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "new_product")) {
  //file uploading
	$gettime=mysqli_query($objConn,"select unix_timestamp(now())");
	$timeresult=mysql_result($gettime,0);
	
	$imagename=$_FILES['image']['name'];
	$photoname=$timeresult.$imagename;
	
	$folder_location = "upload/products/";
	
	$target_path =$folder_location.$timeresult.basename( $_FILES['image']['name']); 
	move_uploaded_file($_FILES["image"]['tmp_name'],$target_path);

	///////////////
	$price = $dis_price = $bb_price = $was_price = $mak_charge = $no_of_piece = $pr_pe_piece = $wt_of_stone = $pr_pe_stone = '';
	if(isset($_POST['discount_price']) && $_POST['discount_price'] != '') $dis_price = $_POST['discount_price'];
	if($_POST['price_type'] == 'Fixed') {
		$price = $_POST['price'];
		
		$bb_price = $_POST['bb_price'];
	} elseif($_POST['price_type'] == 'General') { 
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
	} else {
		$todo = "nothing";
	}
	///////////////
	////////// GET MAX id for SORTNUMBER
	$quer_get_max_id = "select max(sortnumber) as max_id from power_products where category_id=".$_POST['category_id'];
	$get_max_id = mysqli_query($objConn,$quer_get_max_id);
	$row_get_max_id = mysqli_fetch_row($get_max_id);
	
	if($row_get_max_id['max_id'] > 1) {
		$maxid = $row_get_max_id['max_id']+1;
	} else {
		$maxid= 1;
	}
 	/////////
	
  $insertSQL = sprintf("INSERT INTO power_products (category_id, name, description, `size`, newarrival, status, image, code, weight, best_seller, stock, reorder, wastage, making, stone_piece_num, stone_piece_num_price, stone_weight, stone_weight_price, occasion, price_type, price, discount_price, bb_price, stone_type, sortnumber, enable_to_b2b) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['category_id'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
					   GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString(0, "text"),
                       GetSQLValueString(0, "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($target_path, "text"),
                       GetSQLValueString(0, "text"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "text"),
                       GetSQLValueString(0, "int"),
                       GetSQLValueString(0, "int"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "int"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "int"),
                       GetSQLValueString(0, "text"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "double"),
                       GetSQLValueString(0, "text"),
					   GetSQLValueString($maxid, "int"),
					   GetSQLValueString(0, "text"));

  mysql_select_db($database_objConn, $objConn);
  $Result1 = mysqli_query($objConn,$insertSQL, $objConn) or die(mysql_error());

  $insertGoTo = "products_list.php?catid=".$_POST['category_id'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}


header('Location:products_list.php?catid='.$_GET['catid'].'&res=added');
exit;
?>