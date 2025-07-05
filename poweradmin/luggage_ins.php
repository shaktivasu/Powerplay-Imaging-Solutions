<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$bill_no = $_POST['lrno'];
//check bill no already exist
$sqlstr = "select * from  power_luggage where luggage_lrno = '".$bill_no."'";
$res = mysqli_query($objConn,$sqlstr) or die(mysql_error());
echo $bill_num = mysqli_num_rows($res);

if($bill_num==0) 
{
	 
	 if($_POST['pay_method']=='Credit')
	 {
		 $senderId = $_POST['sender_id'];
		 $creditcust1 = mysqli_query($objConn,"select * from power_credit where id = ".$senderId);
		 $creditcust = mysqli_fetch_array($creditcust1);
		 $sendername = $creditcust['credit'];
		 $senderPhone = $creditcust['credit_phone'];
		 $recieverId = $_POST['reciever_id'];
		 $creditcust1 = mysqli_query($objConn,"select * from power_customers where id = ".$recieverId." and cust_name='".$_POST['reciever_suggestions']."' and cust_phone='".$_POST['reciever_phone']."'");
		 $creditcust2 = mysqli_num_rows($creditcust1);
		 if($creditcust2==0)
		 {
			$recievername = $_POST['reciever_suggestions'];
		    $recieverPhone = $_POST['reciever_phone']; 
			$recieverAddress = $_POST['reciever_address']; 
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_status , create_date) values ('".$recievername."','".$recieverPhone."','".$recieverAddress."',0,'".date('Y-m-d')."')");
			
		 }
		 else
		 {
			 $creditcust = mysqli_fetch_array($creditcust1);
			 $recievername = $creditcust['cust_name'];
			 $recieverPhone = $creditcust['cust_phone'];
		 }
	 }
	 else
	 {
		 $senderId = $_POST['sender_id'];
		 echo "select * from power_customers where id = ".$senderId;
		 $creditcust1 = mysqli_query($objConn,"select * from power_customers where id = ".$senderId." and cust_name='".$_POST['sender_suggestions']."' and cust_phone='".$_POST['sender_phone']."'");
		 $creditcust2 = mysqli_num_rows($creditcust1);
		 if($creditcust2==0)
		 {
			$sendername = $_POST['sender_suggestions'];
		    $senderPhone = $_POST['sender_phone']; 
			$senderAddress = $_POST['sender_address']; 
			
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_status , create_date) values ('".$sendername."','".$senderPhone."','".$senderAddress."',0,'".date('Y-m-d')."')");
			
		 }
		 else
		 {
			 $creditcust = mysqli_fetch_array($creditcust1);
			 $sendername = $creditcust['cust_name'];
			 $senderPhone = $creditcust['cust_phone'];
			
		 }
		 $recieverId = $_POST['reciever_id'];
		  $creditcust1 = mysqli_query($objConn,"select * from power_customers where id = ".$recieverId." and cust_name='".$_POST['reciever_suggestions']."' and cust_phone='".$_POST['reciever_phone']."'");
		 $creditcust2 = mysqli_num_rows($creditcust1);
		 if($creditcust2==0)
		 {
			$recievername = $_POST['reciever_suggestions'];
		    $recieverPhone = $_POST['reciever_phone']; 
			$recieverAddress = $_POST['reciever_address']; 
			
		
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_status , create_date) values ('".$recievername."','".$recieverPhone."','".$recieverAddress."',0,'".date('Y-m-d')."')");
			
		 }
		 else
		 {
			 $creditcust = mysqli_fetch_array($creditcust1);
			 $recievername = $creditcust['cust_name'];
			 $recieverPhone = $creditcust['cust_phone'];
		 }
	 }
	 echo $purchs_dtls = "insert into power_luggage set luggage_lrno = '".$_POST['lrno']."',
	 											 luggage_sender_id = '".$senderId."',
												 luggage_sender = '".$sendername."',
												 luggage_sender_phone = '".$_POST['sender_phone']."',
												 luggage_reciever = '".$recievername."',
												 luggage_reciever_phone = '".$_POST['reciever_phone']."',
												 luggage_from = '".$_POST['route_from']."',
												 luggage_to = '".$_POST['route_to']."',
												 luggage_vehicle = '".$_POST['vehicle']."',
												 luggage_fees = '".$_POST['particular_amount']."',
												 luggage_charges = '".$_POST['luggage_amount']."',
												 luggage_doordelivery = '".$_POST['door_delivery']."',
												 luggage_doorcharges = '".$_POST['delivery_charge']."',
												 unloading_charges = 0,
												 luggage_status = 'New Arrival',
												 luggage_paymethod = '".$_POST['pay_method']."',
												 create_date = '".date('Y-m-d')."'";
	$purchs_dtls2 = mysqli_query($objConn,$purchs_dtls) or die(mysql_error());											 
	
	
	 $purchse_count = count($_POST['prd_name']);
	
	for($i=0; $i<$purchse_count; $i++)
	{
		
	  if($_POST['prd_name'][$i]!='' && $_POST['prd_qunty'][$i]!='' && $_POST['prd_price'][$i]!='')
	  {	
	  
	  $particulars_name = mysqli_fetch_array(mysqli_query($objConn,"select particulars from power_particulars where id=".$_POST['prd_name'][$i]));
	  
	  
	  
		echo $pur_prd_dtls = "insert into power_luggage_prd set luggage_lrno = '".$_POST['lrno']."',
														  luggage_prd_name = '".$particulars_name['particulars']."',
														  luggage_qunty = '".$_POST['prd_qunty'][$i]."',
														  luggage_price = '".$_POST['prd_price'][$i]."',
														  luggage_charge = '".$_POST['prd_charge'][$i]."'";														;
		$pur_prd_dtls2 = mysqli_query($objConn,$pur_prd_dtls) or die(mysql_error());
	  }	
	}	
	header("location:print.php?lr=".$_POST['lrno']);												  
}
else
{
   header("location:luggage_new.php?msg=alr");
}
?>