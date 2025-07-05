<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');

/*$sel = "select * from power_luggage where luggage_paymethod = 'Paid' and  create_date >'2020-07-31' ";
$sel1 = mysqli_query($objConn,$sel);
while($sel2 = mysqli_fetch_array($sel1))
{
	$collection_amount = $sel2['luggage_fees']+$sel2['luggage_charges']+$sel2['luggage_doordelivery']+$sel2['luggage_doorcharges']+$sel2['unloading_charges'];
$ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date) values ('".$sel2['luggage_lrno']."','".$sel2['luggage_from']."','".$sel2['luggage_paymethod']."','".$collection_amount."','Cash',0,0,'".$sel2['create_date']."')";
$ins1 = mysqli_query($objConn,$ins);
}*/

?><?php
 
/*{
  "phone": ,
  "body": "Welcome to RIGHT DEVELOPERS"
}*/
$data = array("phone" => "918778189184", "body" => "Welcome to RIGHT DEVELOPERS");                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.chat-api.com/instance203045/sendMessage?token=3i2lkbdk0sevsn9q');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);



//Your API URL https://eu104.chat-api.com/instance203045/ and token 3i2lkbdk0sevsn9q