<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');

$sel="select * from power_newsevents where event_id=".$_REQUEST['id'];
/*$sel="select * from power_newsevents where category_parent=0"; */
$sel1=mysqli_query($objConn,$sel);
$sel2=mysqli_fetch_array($sel1);
/*
$asc=1;
while($sel2=mysqli_fetch_array($sel1))
{
$up="update power_newsevents set category_display=".$asc." where category_id=".$sel2['category_id'];
$up1=mysqli_query($objConn,$up);
$asc++;
}
/*/
$orderno=$sel2['event_order'];
if($_REQUEST['sign']=='u')
{
 $t=$orderno+1;
 $change="update power_newsevents set event_order=".$orderno." where event_order=".$t."";
$change1=mysqli_query($objConn,$change);
$up="update power_newsevents set event_order=".$t." where  event_id=".$_REQUEST['id']."";
$up1=mysqli_query($objConn,$up);
}
if($_REQUEST['sign']=='d')
{
 $t=$orderno-1;
 $change="update power_newsevents set event_order=".$orderno." where  event_order=".$t."";
$change1=mysqli_query($objConn,$change);
 $up="update power_newsevents set event_order=".$t." where event_id=".$_REQUEST['id']."";
$up1=mysqli_query($objConn,$up);
} 
header("location:news_events.php?msg=4"); 
?>




