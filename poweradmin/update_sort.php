<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$sel="select * from power_products where id=".$_REQUEST['id'];
$sel1=mysqli_query($objConn,$sel);
$sel2=mysqli_fetch_array($sel1);
$orderno=$sel2['sortnumber'];
if($_REQUEST['sign']=='u')
{
 $t=$orderno+1;
 $change="update power_products set sortnumber=".$orderno." where sortnumber=".$t." and category_id=".$_REQUEST['catid']."";
$change1=mysqli_query($objConn,$change);
$up="update power_products set sortnumber=".$t." where  id=".$_REQUEST['id']." and category_id=".$_REQUEST['catid']."";
$up1=mysqli_query($objConn,$up);
}
if($_REQUEST['sign']=='d')
{
 $t=$orderno-1;
 $change="update power_products set sortnumber=".$orderno." where  sortnumber=".$t." and category_id=".$_REQUEST['catid']."";
$change1=mysqli_query($objConn,$change);
 $up="update power_products set sortnumber=".$t." where id=".$_REQUEST['id']."  and category_id=".$_REQUEST['catid']."";
$up1=mysqli_query($objConn,$up);
} 
header("location:products_list.php?catid=".$_REQUEST['catid']."");
?>




