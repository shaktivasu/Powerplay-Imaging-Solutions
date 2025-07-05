<?php
include_once('Connections/objConn.php');

$max = "select max(id) from power_ticket;";
$max1 = mysqli_query($objConn,$max);
$max2 = mysqli_fetch_row($max1);
$max3 = $max2[0]+1;
$ticket = 'POW'.date('ymd').$max3;
$ins="insert into power_route (route_contact,route,route_phone,route_username,route_product,create_date,route_status) values ('".$_POST['name']."','".$_POST['company']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['product']."','".date('Y-m-d')."',1)";
$ins1 = mysqli_query($objConn,$ins);
header("location:index.php");
?>