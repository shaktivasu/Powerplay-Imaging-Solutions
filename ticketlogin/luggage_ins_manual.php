<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$bill_no = $_POST['lrno'];
//check bill no already exist
$sqlstr = "select * from  power_ticket where luggage_lrno = '".$bill_no."'";
$res = mysqli_query($objConn,$sqlstr) or die(mysql_error());
$bill_num = mysqli_num_rows($res);
	/*if(isset($_POST['delayedbooking']))
	echo $dateentry = date('Y-m-d',strtotime("-1 days"));
	else
	echo $dateentry = date('Y-m-d');*/
	
if($bill_num==0) 
{
	
	 
	 if($_POST['pay_method']=='Credit')
	 {
		 $senderId = $_POST['sender_id'];
		 
		 
		 
		 	$chk_grp = "select * from power_manual_credit where credit_id = ".$_POST['sender_id'];
			$chk_grp1 = mysqli_query($objConn,$chk_grp);
			$chk_grp2 = mysqli_fetch_array($chk_grp1);
			$chk_grp3 = mysqli_num_rows($chk_grp1);
			if($chk_grp3==0)
			{
				$sel_man = "select * from  power_manual_child where lr_no = 'Nil' and  agent_id = ".$_SESSION['route']." order by id ";
				$sel_man1 = mysqli_query($objConn,$sel_man);
				$sel_man2=mysqli_fetch_array($sel_man1);
				$up = "update power_manual_child set lr_no = '".$_POST['lrno']."' where manual_id = ".$sel_man2['manual_id'];	
				$up1 = mysqli_query($objConn,$up);		
			}
			else
			{
			$sel_man = "select * from  power_manual_credit_child where lr_no = 'Nil' and  group_id = ".$chk_grp2['group_id']."  order by id limit 0,1 ";
			$sel_man1 = mysqli_query($objConn,$sel_man);
			$sel_man2=mysqli_fetch_array($sel_man1);
			$up = "update power_manual_credit_child set lr_no = '".$_POST['lrno']."' where manual_id = ".$sel_man2['manual_id'];	
				$up1 = mysqli_query($objConn,$up);	
			}
		 $creditcust1 = mysqli_query($objConn,"select * from power_credit where id = ".$senderId);
		 $creditcust = mysqli_fetch_array($creditcust1);
		 $sendername = $creditcust['credit'];
		 $senderPhone = $creditcust['credit_phone'];
		 $recieverId = $_POST['reciever_id'];
		 $creditcust1 = mysqli_query($objConn,"select * from power_customers where id = ".$recieverId." and cust_name='".$_POST['reciever_suggestions']."' and cust_phone='".$_POST['reciever_phone']."' and cust_route = '".$_SESSION['route']."'");
		 $creditcust2 = mysqli_num_rows($creditcust1);
		 if($creditcust2==0)
		 {
			$recievername = $_POST['reciever_suggestions'];
		    $recieverPhone = $_POST['reciever_phone']; 
			$recieverAddress = $_POST['reciever_address']; 
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_route , create_date) values ('".$recievername."','".$recieverPhone."','".$recieverAddress."','".$_SESSION['route']."','".date('Y-m-d',strtotime("-1 days"))."')");
			
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
		 //echo "select * from power_customers where id = ".$senderId;
		 $creditcust1 = mysqli_query($objConn,"select * from power_customers where id = ".$senderId." and cust_name='".$_POST['sender_suggestions']."' and cust_phone='".$_POST['sender_phone']."'");
		 $creditcust2 = mysqli_num_rows($creditcust1);
		 if($creditcust2==0)
		 {
			$sendername = $_POST['sender_suggestions'];
		    $senderPhone = $_POST['sender_phone']; 
			$senderAddress = $_POST['sender_address']; 
			
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_route , create_date) values ('".$sendername."','".$senderPhone."','".$senderAddress."','".$_SESSION['route']."','".date('Y-m-d',strtotime("-1 days"))."')");
			
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
			
		
			$ins = mysqli_query($objConn,"insert into power_customers (cust_name , cust_phone , cust_address , cust_route , create_date) values ('".$recievername."','".$recieverPhone."','".$recieverAddress."','".$_SESSION['route']."','".date('Y-m-d',strtotime("-1 days"))."')");
			
		 }
		 else
		 {
			 $creditcust = mysqli_fetch_array($creditcust1);
			 $recievername = $creditcust['cust_name'];
			 $recieverPhone = $creditcust['cust_phone'];
		 }
		 $sel_man = "select * from  power_manual_child where lr_no = 'Nil' and  agent_id = ".$_SESSION['route']." order by id ";
		 $sel_man1 = mysqli_query($objConn,$sel_man);
		 $sel_man2=mysqli_fetch_array($sel_man1);
		 $up = "update power_manual_child set lr_no = '".$_POST['lrno']."' where manual_id = ".$sel_man2['manual_id'];	
	     $up1 = mysqli_query($objConn,$up);		
	 }
	  $purchs_dtls = "insert into power_ticket set luggage_lrno = '".$_POST['lrno']."',
	  											 luggage_ref = '".$_POST['luggage_ref']."',
	 											 luggage_sender_id = '".$senderId."',
												 luggage_sender = '".$sendername."',
												 luggage_sender_phone = '".$_POST['sender_phone']."',
												 luggage_reciever = '".$recievername."',
												 luggage_reciever_phone = '".$_POST['reciever_phone']."',
												 luggage_from = '".$_POST['route_from']."',
												 luggage_to = '".$_POST['route_to']."',
												 luggage_vehicle = '".$_POST['vehicle_no']."',
												 luggage_fees = '".$_POST['particular_amount']."',
												 luggage_charges = '".$_POST['luggage_amount']."',
												 luggage_doordelivery = '".$_POST['door_delivery']."',
												 luggage_doorcharges = '".$_POST['delivery_charge']."',
												 unloading_charges = 0,
												 luggage_doorcollections = '".$_POST['door_collection']."',
												 luggage_lrcharges = '".$_POST['lr_charges']."',
												 luggage_odacharges = '".$_POST['oda_charges']."',
												 luggage_status = 'New Arrival',
												 luggage_paymethod = '".$_POST['pay_method']."',
												 driver_name = '".$_POST['driver_name']."',
												 create_date = '".$_POST['todate']."'";

	$purchs_dtls2 = mysqli_query($objConn,$purchs_dtls) or die(mysql_error());	
	
							 
	/*if($_POST['pay_method']=='Paid')
	{
	$collection_amount = $_POST['particular_amount']+$_POST['luggage_amount']+$_POST['delivery_charge'];
	$ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date) values ('".$_POST['lrno']."','".$_POST['route_from']."','".$_POST['pay_method']."','".$collection_amount."','Cash',0,0,'".date('Y-m-d')."')";
			$ins1 = mysqli_query($objConn,$ins);
	}*/
	$_SESSION['vehicle_no']=$_POST['vehicle_no'];
	$_SESSION['driver_name'] = $_POST['driver_name'];
	 $purchse_count = count($_POST['prd_name']);
	
	for($i=0; $i<$purchse_count; $i++)
	{
		
	  if($_POST['prd_name'][$i]!='' && $_POST['prd_qunty'][$i]!='' && $_POST['prd_price'][$i]!='')
	  {	
	  
	  $particulars_name = mysqli_fetch_array(mysqli_query($objConn,"select particulars from power_particulars where id=".$_POST['prd_name'][$i]));
	  
	  
	  
		 $pur_prd_dtls = "insert into power_ticket_prd set luggage_lrno = '".$_POST['lrno']."',
														  luggage_prd_name = '".$particulars_name['particulars']."',
														  luggage_qunty = '".$_POST['prd_qunty'][$i]."',
														  luggage_price = '".$_POST['prd_price'][$i]."',
														  unit = '".$_POST['prd_weight'][$i]."',
														  luggage_charge = '".$_POST['prd_charge'][$i]."',
														  luggage_uncharge = '".$_POST['prd_uncharge'][$i]."'";														;
		$pur_prd_dtls2 = mysqli_query($objConn,$pur_prd_dtls) or die(mysql_error());
	  }	
	}	
	header("location:print.php?lr=".$_POST['lrno']);
	?>
	
	<script>
	
	 window.open('print.php?lr="<?php echo $_POST['lrno']?>','_blank');
     /*window.open("luggage_new.php",'_blank');
	 window.close();
	   ClosePrint();
	function ClosePrint( )
	{
	setTimeout("window.close();",10);
	}*/
   </script>											  
<?php //header("location:luggage_new.php?invoice=succ&lr=".$_POST['lrno']);	
 }
else
{
   header("location:luggage_new.php?msg=alr");
}
?>