<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-1");
$todate = date("Y-m-d");
$route_id = $_REQUEST['route_id'];
if(isset($_REQUEST['frmdate']))
{
$frmdate = $_REQUEST['frmdate'];
}
if(isset($_REQUEST['todate']))
{
$todate = $_REQUEST['todate'];
}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions   - Admin Panel ::</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/layout.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/themes.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/typography.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/data-table.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/sprite.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/gradient.css" rel="stylesheet" type="text/css" media="screen">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
<![endif]-->
<!-- Jquery -->
<script type="text/javascript" src="images/calendarDateInput.js"></script>
           <script type="text/javascript">
<!--

var d_names = new Array("Sunday", "Monday", "Tuesday",
"Wednesday", "Thursday", "Friday", "Saturday");

var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_day = d.getDay();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }
var curr_month = d.getMonth();
var curr_year = d.getFullYear();

//document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
//+ sup + "</SUP> " + m_names[curr_month] + " " + curr_year);

//-->
</script>

<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Are you sure you want to delete the data ";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
</script>
</head>
<body id="theme-default" class="full_block">
<div id="actionsBox" class="actionsBox">
	<div id="actionsBoxMenu" class="menu">
		<span id="cntBoxMenu">0</span>
		<a class="button box_action">Archive</a>
		<a class="button box_action">Delete</a>
		<a id="toggleBoxMenu" class="open"></a>
		<a id="closeBoxMenu" class="button t_close">X</a>
	</div>
	<div class="submenu">
		<a class="first box_action">Move...</a>
		<a class="box_action">Mark as read</a>
		<a class="box_action">Mark as unread</a>
		<a class="last box_action">Spam</a>
	</div>
</div>
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<ul id="sidenav" class="accordion_mnu collapsible">
            
				<?php include("includes/menu.php");?>
                
                
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Kmp Travels">
			</div>
			<div id="responsive_mnu">
				<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<?php include("includes/menu.php");?>
			</ul>
				</div>
			</div>
		</div>
        
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name">Administrator</span><span><a href="logout.php"><strong>Logout</strong></a> </span></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="grid_container">
			
			
			
			<div class="grid_12"  style="width:100%;">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon money"></span>
						<h6>KMP ACCOUNTS</h6>
                        
					</div>
                    <div align="right"><div class="btn_40_blue ucase">
								<a href="expenses.php"><span class="icon billing_sl"></span><span>ADDNEW RECIEPT FROM AGENT</span></a><br>
							</div></div>
					<div class="widget_content">
                    
                    <div class="arrow_box">
                <form name="frm" id="frm" method="post" action="">
                
                <table width="100%" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt">From Date :</td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td  align="right" class="label_txt">To Date : </td>
        <td  align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
       <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      </table>
         </div>
         
         
         
         <h2><?php 
		 
		   $news_events_flow=mysqli_query($objConn,"select * from power_route where id = ".$route_id."  order by route") or die("Vehicle error:".mysql_error());
		   $news_events_flow_row=mysqli_fetch_array($news_events_flow);
		 if($news_events_flow_row['route_type']==0) echo "AGENT";
							if($news_events_flow_row['route_type']==1) echo "OWN AGENT";
							echo ' ('.$news_events_flow_row['route'].')';
							?></h2>
						<table class="display">
						<thead>
						<tr>
							<th >
								 Sl No
							</th>
                          <th>Date</th>
                            <th>Opening Bal.</th>
							<th>Paid & Topay Amount</th>
							<th>Agent Commission</th>
                            <th>HO Amount</th>
							<th>Daysheet Expenses</th>
                            <th>Total Payable</th>
                            <th>Recieved Amount</th>
                            <th>Balance</th>
							<th>Closing Bal.</th>
                           
						</tr>
						</thead>
						<tbody>
                        <?php
					
					
                  
					
					
				   
				   $i=1;
				   $cnt=0;
				   
				   			$cnt++;
                            $css_set=$cnt%2;
							
							$luggage=mysqli_query($objConn,"select * from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."'   and create_date>'2021-12-31' and luggage_from =".$route_id." order by create_date") or die("Vehicle error:".mysql_error());
							$luggage_row4=mysqli_num_rows($luggage);
							if($luggage_row4>0)
							{
							while($luggage_row=mysqli_fetch_array($luggage))
				   			{
								/*if($luggage_row['luggage_paymethod']=='Paid'){
								$booking_lug_fees +=$luggage_row['luggage_fees'];
								$booking_lug_fees +=$luggage_row['unloading_charges'];
								}
								if($luggage_row['luggage_paymethod']!='Expenses')
								{
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$news_events_flow_row['id']);
								$get_com1 = mysqli_fetch_array($get_com);
								}
								if($luggage_row['luggage_paymethod']=='To Pay')
								 $topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
								if($luggage_row['luggage_paymethod']=='Paid')
								 $paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
								if($luggage_row['luggage_paymethod']=='Credit')
								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
								 
								
								 if($luggage_row['luggage_paymethod']=='Paid'){
								  $agent_amt1 =$topay_amt1 +$paid_amt1+$credit_amt1;}
								 else
								 {
								  $agent_amt1 =$topay_amt1 +$paid_amt1+$credit_amt1+$luggage_row['luggage_charges'];}
								  $tot_agt1+=$agent_amt1;
								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
							}
				   			
							$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
							$time = strtotime($frmdate.' -1 day');
    					 	$fromdatesr = date("Y-m-d", $time);
							$time = strtotime($todate.' -1 day');
    					 	$todatestr = date("Y-m-d", $time);
						
							$luggage2=mysqli_query($objConn,"select * from power_luggage where create_date>='".$fromdatesr."' and create_date<='".$todatestr."' and luggage_to =".$news_events_flow_row['id']." order by create_date") or die("Vehicle111 error:".mysql_error());
							$luggage_row3=mysqli_num_rows($luggage2);
							if($luggage_row3>0)
							{
							while($luggage_row2=mysqli_fetch_array($luggage2))
				   			{
								
								if($luggage_row2['luggage_paymethod']=='To Pay'){
								$lug_fees +=$luggage_row2['luggage_fees'];
								$lug_fees +=$luggage_row2['luggage_charges']; 
								}
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$news_events_flow_row['id']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row2['luggage_paymethod']=='To Pay')
								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;
								if($luggage_row2['luggage_paymethod']=='Paid')
								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;
								if($luggage_row2['luggage_paymethod']=='Credit')
								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
								$agent_amt2 =$topay_amt2 +$paid_amt2+$credit_amt2+$luggage_row2['luggage_doorcharges'];
							    $tot_agt2+=$agent_amt2;
								$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;*/
				   			
							
				  

				
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?></td>
                            <td><?php   echo date('d-M-Y',strtotime($luggage_row['create_date'])); ?></td>
                           
                            <td align="right"><?php 
							
							/* $time = strtotime($frmdate.' -1 day');
    					 $fromdatesr = date("Y-m-d", $time);
							 $luggage_op=mysqli_query($objConn,"select * from power_luggage where  create_date='".$luggage_row['create_date']."'  and luggage_to =".$luggage_row['id']."") or die("Vehicle error:".mysql_error());
				  while($luggage_op1=mysqli_fetch_array($luggage_op))
				   { 
				   if($luggage_op1['luggage_paymethod']=='To Pay'){
							$lug_fees_op +=$luggage_op1['luggage_fees'];}
				   }
				   
				   
				   
				   $day_collection_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where    create_date='".$luggage_row['create_date']."'  and  route_id = '".$luggage_row['id']."' and collection_status=0 ") or die("Collection error1:".mysql_error());
				  $day_collection_op1=mysqli_fetch_row($day_collection_op);
				  
				
					 $day_exp_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where     create_date='".$luggage_row['create_date']."'  and route_id = '".$luggage_row['id']."' and collection_status=1 ") or die("Collection error2:".mysql_error());
				  $day_exp_op1=mysqli_fetch_row($day_exp_op); 
				 
				 
				   $fin_recp_op=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where    collection_date='".$luggage_row['create_date']."'  and  route_id = '".$news_events_flow_row['id']."' ") or die("Collection error3:".mysql_error());
				  $fin_recp_op1=mysqli_fetch_row($fin_recp_op);
					
				  
				  
				   
				  $final_op = $lug_fees_op+$day_collection_op1[0]-$day_exp_op1[0]-$fin_recp_op1[0];
					  
				  echo number_format($final_op,2);*/
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							$total_opening_balance+=$final_op?></td>
							<td align="right"><?php 
							if($lug_fees>0)
							{
							$lug_fees+=	$booking_lug_fees;
							echo number_format($lug_fees,2);
							$paid_topay_amount = $lug_fees;
							}
							else
							{
							$lug_fees =	$booking_lug_fees;
							echo number_format($booking_lug_fees,2);
							$paid_topay_amount = $booking_lug_fees;
							}
							$total_paid_topay_amount+=$paid_topay_amount;
							?></td>
							<td align="right"><?php 
							if($lug_fees>0)
							{
							$tot_agt_club =$tot_agt1+$tot_agt2;
							echo number_format($tot_agt_club,2);
							}
							$total_balance_agent+=$tot_agt_club;
							?></td>
							<td align="right"><?php 
							if($news_events_flow_row['route_type']==1)
							{
								$bal_pay = $lug_fees + $tot_agt_club;
								echo number_format($bal_pay,2);
							}
							else
							{
								if($lug_fees>0)
								{
								$bal_pay = $lug_fees - $tot_agt_club;
								echo number_format($bal_pay,2);
								}
								else
								{
									$bal_pay =$booking_lug_fees;
									echo number_format($bal_pay,2);
								}
							}
							$total_lug_fees+=$bal_pay;
							
							?></td>
							<td align="right">
                            <?php 
						
							$expenses=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date ='".$luggage_row['create_date']."'  and route_id = '".$route_id."' and collection_status =1") or die("Collection error12:".mysql_error());
							$expenses1=mysqli_fetch_row($expenses);
							$total_debit +=$expenses1[0]; 
							echo number_format($total_debit,2);
							$total_balance_debit+=$total_debit;
							?>
                            </td>
                            <td align="right"><?php $total_payabal  = $bal_pay-$total_debit;
							 echo number_format($total_payabal,2);
							 $total_balance_payabal+=$total_payabal;?></td>
                            <td align="right"><?php 
							$transfer_row=mysqli_query($objConn,"select * from  power_collections_ho where  collection_date ='".$luggage_row['create_date']."'      and route_id = '".$route_id."'   ") or die("Collection error23:".mysql_error());
							while($transfer_row1=mysqli_fetch_array($transfer_row))
							{
								if($transfer_row1['collection_status']==0)
								{
								$total_transfer +=$transfer_row1['collection_amount']; 
								
								}
								if($transfer_row1['collection_status']==1)
								{
								$ucb_status = 1;
								
								}
							}echo number_format($total_transfer,2);
							$total_balance_transfer+=$total_transfer;
							?></td>
                            <td align="right"><?php $closing_balance  = $total_payabal-$total_transfer;
							 echo number_format($closing_balance,2);
							 $total_closing_balance+=$closing_balance;
							 ?></th>
                              <td align="right"><?php $current_closing_balance  = $closing_balance +$final_op;
							 echo number_format($current_closing_balance,2);
							 $current_total_closing_balance+=$current_closing_balance;
							 ?></th>
                             
							
						</tr>
						
						<?php $i++;$lug_fees=0;$tot_agt_club=0;$tot_agt1=0;$tot_agt2=0;$bal_pay=0;$topay_amt1 = 0;
					$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;$booking_lug_fees=0;$total_debit=0;$ucb_status =0;$total_transfer=0;$closing_balance=0;}
					$final_op=0;$lug_fees_op=0;$current_closing_balance=0;
					
					
							}
					
					 ?>    
						</tbody>
                        <tr style="font-weight:bold; color:#F00; height:25px; font-size:12px; vertical-align:central;">
							<th   align="right">Total  ::&nbsp;&nbsp;  </th>
                            <th align="right"><?php echo number_format($total_opening_balance,2);?></th>
							<th align="right"><?php echo number_format($total_paid_topay_amount,2);?></th>
							<th align="right"><?php echo number_format($total_balance_agent,2);?></th>
                            <th align="right"><?php echo number_format($total_lug_fees,2);?></th>
							<th align="right"><?php echo number_format($total_balance_debit,2);?></th>
                            <th align="right"><?php echo number_format($total_balance_payabal,2);?></th>
                            <th align="right"><?php echo number_format($total_balance_transfer,2);?></th>
                            <th align="right"><?php echo number_format($total_closing_balance,2);?></th>
							<th align="right"><?php echo number_format($current_total_closing_balance,2);?></th>
                           
						</tr>
						</table>
                        </form>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>