<?php
mysql_select_db($database_objConn, $objConn);
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
function CategoryTree($cat){
	$query_Category_Tree = "SELECT * FROM power_menu WHERE category_id = " . $cat;
	$Category_Tree = mysqli_query($objConn,$query_Category_Tree) or die(mysql_error());
	$row_Category_Tree = mysql_fetch_assoc($Category_Tree);
	$totalRows_Category_Tree = mysqli_num_rows($Category_Tree);
	if($totalRows_Category_Tree){
		if($row_Category_Tree['category_parent'] == "0"){
			$Return_string = " ".$row_Category_Tree['category_name'] . " &raquo;";
					}else{
			$Return_string = " " . $row_Category_Tree['category_name'] . " &raquo;";
		}
		return(CategoryTree($row_Category_Tree['category_parent']) . $Return_string);
	}else{
		return false;
	}
	mysql_free_result($Category_Tree);


}

function GetSubcategory($mid) 
{
	$query_SubCateGory = "SELECT category_id FROM power_menu WHERE category_parent= '".$mid."'";
	$SubCateGory = mysqli_query($objConn,$query_SubCateGory) or die(mysql_error());
	$row_SubCateGory = mysql_fetch_assoc($SubCateGory);
	$totalRows_SubCateGory = mysqli_num_rows($SubCateGory);
	
	if($totalRows_SubCateGory) {
		do {
			$return2 .= $row_SubCateGory['category_id'].",";
			$return2 .=  GetSubcategory($row_SubCateGory['category_id']);
		} while($row_SubCateGory = mysql_fetch_assoc($SubCateGory));
		
	} 
	return $return2;
	mysql_free_result($SubCateGory);
}
function RootCategory($cat){
	//echo $cat;
	$query_Root_Category = "SELECT category_id, category_parent FROM power_menu  WHERE category_id = " . $cat;
	$Root_Category = mysqli_query($objConn,$query_Root_Category) or die(mysql_error());
	$row_Root_Category = mysql_fetch_assoc($Root_Category);
	$totalRows_Root_Category = mysqli_num_rows($Root_Category);
	if($totalRows_Root_Category){
		if($row_Root_Category['category_parent'] == "0"){
			$Return_string = $row_Root_Category['category_id'];
		}
		return(RootCategory($row_Root_Category['category_parent']) . $Return_string);
	}else{
		return false;
	}
	mysql_free_result($Root_Category);

}
function Get_Product_Sales_Quantity($pid) {

	$query_Sales_Quantity = "SELECT qty FROM power_orderchild WHERE product_id = " . $pid."";
	$Sales_Quantity = mysqli_query($objConn,$query_Sales_Quantity) or die(mysql_error());
	$row_Sales_Quantity = mysql_fetch_assoc($Sales_Quantity);
	$totalRows_Sales_Quantity = mysqli_num_rows($Sales_Quantity);
	$qty= 0;
	if($totalRows_Sales_Quantity) {
		do {
			$qty += $row_Sales_Quantity['qty'];
		} while($row_Sales_Quantity = mysql_fetch_assoc($Sales_Quantity));
	}
	return $qty;
}
function Get_Customer_Order_Amout($cid) {

	$query_Customer_Order_Amount = "SELECT order_amt FROM power_orders WHERE user_code = " . $cid."";
	$Customer_Order_Amount = mysqli_query($objConn,$query_Customer_Order_Amount) or die(mysql_error());
	$row_Customer_Order_Amount = mysql_fetch_assoc($Customer_Order_Amount);
	$totalRows_Customer_Order_Amount = mysqli_num_rows($Customer_Order_Amount);
	$amt= 0;
	if($totalRows_Customer_Order_Amount) {
		do {
			$amt += $row_Customer_Order_Amount['order_amt'];
		} while($row_Customer_Order_Amount = mysql_fetch_assoc($Customer_Order_Amount));
	}
	return $amt;
}

function Date_JS_SQL ($date) {
	//dd/mm/yyyy to yyy-mm-dd
	$split = explode("/", $date);
	$return_date = $split[2]."-".$split[1]."-".$split[0];
	
	return $return_date;
}
function Date_SQL_JS ($date) {
	//yyy-mm-dd to dd/mm/yyyy
	$split = explode("-", $date);
	$return_date = $split[2]."/".$split[1]."/".$split[0];
	
	return $return_date;
}
function Date_SQL_JS_Time ($date) {
	//yyy-mm-dd h:i:s to dd/mm/yyyy
	$date = explode(" ", $date);
	$date = $date[0];
	$split = explode("-", $date);
	$return_date = $split[2]."/".$split[1]."/".$split[0];
	
	return $return_date;
}
function Order_Status_Name ($sid) {
	$query_Get_Status_Name = "SELECT name FROM power_status WHERE id = " . $sid."";
	$Get_Status_Name = mysqli_query($objConn,$query_Get_Status_Name) or die(mysql_error());
	$row_Get_Status_Name = mysql_fetch_assoc($Get_Status_Name);
	
	return $row_Get_Status_Name['name'];
}
function update_stock($order_id) {
	$send_stock_mail = "no";
	$product_list = '';
	//get the order products with their stock and reorder stock qantity
	$query_Update_Stock = "SELECT power_orderchild.product_id, power_orderchild.qty, power_orderchild.name, power_products.stock, power_products.reorder FROM power_orderchild INNER JOIN (power_products) ON (power_orderchild.product_id = power_products.id) WHERE power_orderchild.order_id = " . $order_id."";
	$Update_Stock = mysqli_query($objConn,$query_Update_Stock) or die(mysql_error());
	$row_Update_Stock = mysql_fetch_assoc($Update_Stock);
	$totalRows_Update_Stock = mysqli_num_rows($Update_Stock);
	if($totalRows_Update_Stock) {
		do {
			$new_stk = $row_Update_Stock['stock'] -  $row_Update_Stock['qty'];
			$pid = $row_Update_Stock['product_id'];
			//update the new stk qty with purchase qty
			$updateSQL_stk = sprintf("UPDATE power_products SET stock=%s WHERE id=%s",                     GetSQLValueString($new_stk, "int"), GetSQLValueString($pid, "int"));

  			mysql_select_db($database_objConn);
			//check whether the new stk qty is less than reorder qty
			if($new_stk <= $row_Update_Stock['reorder'] && $new_stk > 0) {
				$send_stock_mail = "yes";
				$product_list .= '<tr><td><a href="'.$web.'/admin/product_edit.php?id='.$pid.'">'.$row_Update_Stock['name'].'</a></td><td>'.$new_stk.'</td><td>'.$row_Update_Stock['reorder'].'</td></tr>';
			}
			if($new_stk <= 0) {
				$send_stock_mail = "yes";
				$product_list .= '<tr><td bgcolor="#FF9191"><a href="'.$web.'/admin/product_edit.php?id='.$pid.'">'.$row_Update_Stock['name'].'</a></td><td bgcolor="#FF9191">0</td><td bgcolor="#FF9191">'.$row_Update_Stock['reorder'].'</td></tr>';
			}
			
		} while($row_Update_Stock = mysql_fetch_assoc($Update_Stock));
	}
	if($send_stock_mail == "yes") {
		//if yes then send mail to admin
		$mail_stock_less = email_admin_stock($product_list);
	}
	return $mail_stock_less;
	
}
function GetAdminEmail() {
	$query_Get_Admin_Mail = "SELECT usermail FROM `power_admin` WHERE userid = 1";
	$Get_Admin_Mail = mysqli_query($objConn,$query_Get_Admin_Mail) or die(mysql_error());
	$row_Get_Admin_Mail = mysql_fetch_assoc($Get_Admin_Mail);
	
	return $row_Get_Admin_Mail['usermail'];
}
?>
