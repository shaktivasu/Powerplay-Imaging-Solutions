<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_REQUEST['frmdate']))
{
$frmdate = $_REQUEST['frmdate'];
}
if(isset($_REQUEST['todate']))
{
$todate = $_REQUEST['todate'];
}
$routestr='';
function is_date( $str ) {
    try {
        $dt = new DateTime( trim($str) );
    }
    catch( Exception $e ) {
        return false;
    }
    $month = $dt->format('m');
    $day = $dt->format('d');
    $year = $dt->format('Y');
    if( checkdate($month, $day, $year) ) {
        return true;
    }
    else {
        return false;
    }
}if(isset($_POST['DELIVERED']))
{
	$count=(isset($_POST['undel']))?$_POST['undel']:NULL; 
$count1=count($count);
for($i=0;$i<=$count1;$i++)
{
	if(isset($_POST['undel'][$i]) && $_POST['undel'][$i] != '') {
		 	$up = "update power_ticket set luggage_status ='Dispatched' where id = ".$_POST['undel'][$i];
		 	$up1 = mysqli_query($objConn,$up);
		 	$sel = "select * from power_ticket where id = ".$_POST['undel'][$i];
			$sel1 = mysqli_query($objConn,$sel);
			$sel2 = mysqli_fetch_array($sel1);
			$collection_amount = $sel2['luggage_fees']+$sel2['luggage_charges']+$sel2['luggage_doordelivery']+$sel2['luggage_doorcharges']+$sel2['unloading_charges'];
			$comments = 'Nil';
			$dup = "select * from power_daysheet where lr_no='".$sel2['luggage_lrno']."'";
			$dup1 = mysqli_query($objConn,$dup);
			$dup2 =  mysqli_num_rows($dup1);
			if($dup2 ==0){
			if($_POST[$_POST['undel'][$i]]!=0)
			{
			$comments = $collection_amount.'+'.$_POST[$_POST['undel'][$i]];
			$collection_amount+=$_POST[$_POST['undel'][$i]];
			
			}
			if($sel2['luggage_paymethod']=='Paid')
			{
			$comments = 'Unloading Only '.$_POST[$_POST['undel'][$i]];
			$collection_amount=$_POST[$_POST['undel'][$i]];	
			}
			
			echo $ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date,unloading_charges,comments) values ('".$sel2['luggage_lrno']."','".$sel2['luggage_to']."','".$sel2['luggage_paymethod']."','".$collection_amount."','Cash',0,0,'".date('Y-m-d')."',".$_POST[$_POST['undel'][$i]].",'".$comments."')";
			$ins1 = mysqli_query($objConn,$ins);
			}
	}
}
}
	$news_events_flow=mysqli_query($objConn,"select * from power_ticket where ((luggage_to = ".$_SESSION['route']."   and (luggage_paymethod = 'To Pay' or luggage_paymethod = 'Paid' )))    and  luggage_status !='Dispatched'  order by create_date");
	?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
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
<script>
         function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }
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
			<?php include_once("menu.php");?>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Power Play Imaging Solutions">
			</div>
			<div id="responsive_mnu">
			<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Booking</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Dispatch Statement</a></li> 
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li> <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li><li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>

                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
<li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><a href="logout.php" ><span class="user_name"><strong>Logout</strong> </span></a></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon file_cabinet"></span>
						<h6>Day Sheet Entry</h6>
                        <!--<div class="print"><h6>Print</h6></div>-->
					</div>
                    <form name="frm" id="frm" method="post" action="">
					<div class="widget_content">
                          
                    <div class="arrow_box">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="246" height="26" align="right" class="label_txt">From Date :</td>
        <td width="285" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="169" align="right" class="label_txt">To Date : </td>
        <td width="271" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="87" align="center" class="label_txt">&nbsp;</td>
      </tr>
      
    
      <tr>
        <td width="246" height="26" align="right" class="label_txt">&nbsp;</td>
        <td width="285" align="center" class="label_txt" style="text-transform:uppercase;"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td width="169" align="right" class="label_txt">&nbsp;</td>
        <td width="271" align="center" class="label_txt">&nbsp;</td>
        <td width="87" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table></div>
	
 
    <h6 class="totamt">
                        <?php 
						 $time = strtotime($frmdate.' -1 day');
    					 $fromdatesr = date("Y-m-d", $time);
						 $time = strtotime($frmdate.' -2 day');
    					 $fromdatesr1 = date("Y-m-d", $time);
						 $time1 = strtotime($todate.' -1 day');
						 $todatesr1 =  date("Y-m-d", $time1);?>
						    <?php    
							
						
						$opening_closing_date = date('Y-m-d', strtotime('-1 day', strtotime($frmdate)));
						
							   
								/*$begin = new DateTime('2021-02-27');
								if($frmdate <= '2021-03-01')
								$end = new DateTime('2021-03-01');
								else
								$end = new DateTime($opening_closing_date);
								
								$interval = DateInterval::createFromDateString('1 day');
								$period = new DatePeriod($begin, $interval, $end);
						foreach ($period as $openingdt) {*/
						
							
						
						//$luggage=mysqli_query($objConn,"select * from power_ticket where create_date>='$fromdatesr' and create_date<='".$todatesr1."' and luggage_from =".$_SESSION['route']." order by create_date") or die("openingfrm error:".mysql_error());
//							while($luggage_row=mysqli_fetch_array($luggage))
//				   			{
//								
//								
//								
//								if($luggage_row['luggage_paymethod']!='Expenses')
//								{
//								if($luggage_row['luggage_paymethod']=='Paid'){
//								$booking_lug_fees +=$luggage_row['luggage_fees'];
//								$booking_lug_fees +=$luggage_row['unloading_charges']+$luggage_row['luggage_doorcharges'];
//								}
//				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
//								$get_com1 = mysqli_fetch_array($get_com);
//								if($luggage_row['luggage_paymethod']=='To Pay'){
//								$topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
//								}
//								if($luggage_row['luggage_paymethod']=='Paid')
//								{
//								$paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
//								}
//								if($luggage_row['luggage_paymethod']=='Credit')
//								{
//								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
//								 }
//								 
//								 if($luggage_row['luggage_paymethod']=='Paid'){
//								  $agent_amt1 =$topay_amt1 +$paid_amt1;
//								  }
//								 else
//								 {
//								  $agent_amt1 =$topay_amt1 +$paid_amt1+$luggage_row['luggage_charges'];}
//								  $tot_agt1+=$agent_amt1;
//								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
//								  
//							}
//							
//				   			//}
//							
//							$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
//							
//							 $luggage2=mysqli_query($objConn,"select * from power_ticket where create_date>='".$fromdatesr."' and create_date<='".$todatesr1."' and luggage_to =".$_SESSION['route']." order by create_date") or die("openingd error:".mysql_error());
//							while($luggage_row2=mysqli_fetch_array($luggage2))
//				   			{
//								
//								if($luggage_row2['luggage_paymethod']=='To Pay' ){
//								$lug_fees +=$luggage_row2['luggage_fees']+$luggage_row2['luggage_charges']+$luggage_row2['unloading_charges'];
//								 }
//								 
//								 
//				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
//								$get_com1 = mysqli_fetch_array($get_com);
//								if($luggage_row2['luggage_paymethod']=='To Pay'){
//								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;}
//								if($luggage_row2['luggage_paymethod']=='Paid')
//								{
//								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;}
//								if($luggage_row2['luggage_paymethod']=='Credit')
//								{
//								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
//								}
//								
//							   
//								
//								
//							    
//								$agent_amt2 =$topay_amt2 +$paid_amt2+$luggage_row2['luggage_doorcharges'];
//							    $tot_agt2+=$agent_amt2;
//								$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
//				   			}
//							
//							$lug_fees+=	$booking_lug_fees;
//							$tot_agt_club =$tot_agt1+$tot_agt2;
//							$get_type = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
//						    $get_type1 = mysqli_fetch_array($get_type);
//							 if($get_type1['route_type']==0){$bal_pay =$lug_fees - $tot_agt_club;}
//							if($get_type1['route_type']==1){$bal_pay =$lug_fees + $tot_agt_club;}
//							$opening_credit +=$bal_pay;
//					$lug_fees=0;$tot_agt_club=0;$tot_agt1=0;$tot_agt2=0;$bal_pay=0;$topay_amt1 = 0;
//					$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;$booking_lug_fees=0;	
//						}
//						
//						
//						
//						   $openingdebit =mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date <  '".$fromdatesr."'  and create_date>='$todatesr1'   and route_id = '".$_SESSION['route']."' and collection_status =1") or die("Collection error:".mysql_error());
//						  $openingdebit1 =  mysqli_fetch_row($openingdebit);
//						
//						
//						 
//						
//						  $openingbalance = round($opening_credit-$openingdebit1[0]);
						  
						//}
						?><?php /*?><?php */?>
						 <?php
						 
						echo "<table width=100%><tr><td width=33% align=left></td><td width=34% align=left>(".date('d-M-Y',strtotime($frmdate))." To ".date('d-M-Y',strtotime($todate)).")</td><td width=33% align=right></td></tr></table><br>";
						
						?>
                        
                        </h6>
                        
                        
                        
                       
                       
                        <div align="right">
                       <!--<input type="button"  name="addnew_booking"  class="btn_small btn_blue" value="ADDNEW BOOKING" onclick="myPopup('daysheet_add.php', 'web', 1050, 550);">&nbsp;&nbsp;&nbsp;--><a href="expenses.php?fromdate=<?php echo $frmdate?>&todate=<?php echo $todate?>"><input type="button" class="btn_small btn_blue" name="ADDNEW" value="ADDNEW ENTRY"></a><!--&nbsp;&nbsp;&nbsp;<input type="submit"  class="btn_small btn_blue" name="DELIVERED" value="DELIVERED">-->
                         </div><br>
    
    
   
    
						<table class="display">
						<thead>
                         <tr>
                        <td colspan="9" align="left" valign="middle" bgcolor="#F9C6F1"><h2>DAYSHEET ENTRIES</h2></td>
                        </tr>
						<tr>
							<th align="center">Sl No</th>
                            <th align="center">Create Date</th>
                            <th align="left">Particulars</th>
 							<th align="right">Debit (Rs.)</th>
							 <th align="right">Credit (Rs.)</th>
                            
						</tr>
						</thead>
						<tbody>
                        <?php /*?> <tr style="color:red; font-size:16px;" ><td colspan="4" align="right"><strong>Opening Balance : </strong></td>
                         <td align="right"><?php echo $openingbalance?></td>
                         </tr>
                        <tr><td colspan="5"><strong>H.O Payable</strong></td></tr> 
						<?php   
								if($frmdate == '2021-03-01')
								$need_date = '2021-02-27';
								else
						        $need_date = date('Y-m-d', strtotime('-1 day', strtotime($frmdate)));
								$begin = new DateTime($need_date);
								$end = new DateTime($todate);
								
								$interval = DateInterval::createFromDateString('1 day');
								$period = new DatePeriod($begin, $interval, $end);
								
								?>
                        <?php  $i=1;
						
						foreach ($period as $dt) {
									
								
					   $cnt++;
                       $css_set=$cnt%2;
					  
						$luggage=mysqli_query($objConn,"select * from power_ticket where create_date>='".$dt->format("Y-m-d")."' and create_date<='".$dt->format("Y-m-d")."' and luggage_from =".$_SESSION['route']." order by create_date") or die("openingfrm1 error:".mysql_error());
							while($luggage_row=mysqli_fetch_array($luggage))
				   			{
								
								
								
								if($luggage_row['luggage_paymethod']!='Expenses')
							{
								
								if($luggage_row['luggage_paymethod']=='Paid'){
								$booking_lug_fees +=$luggage_row['luggage_fees'];
								$booking_lug_fees +=$luggage_row['unloading_charges']+$luggage_row['luggage_doorcharges'];
								}
								
								
								
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row['luggage_paymethod']=='To Pay'){
								$topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
								}
								if($luggage_row['luggage_paymethod']=='Paid')
								{
								$paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
								}
								if($luggage_row['luggage_paymethod']=='Credit')
								{
								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
								
								 }
								 
								
								 if($luggage_row['luggage_paymethod']=='Paid'){
								  $agent_amt1 =$topay_amt1 +$paid_amt1+$credit_amt1;}
								 else
								 {
								  $agent_amt1 =$topay_amt1 +$paid_amt1+$credit_amt1+$luggage_row['luggage_charges'];}
								  $tot_agt1+=$agent_amt1;
								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
								  
							}
							
				   			}
							
							$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
							$luggage2=mysqli_query($objConn,"select * from power_ticket where create_date>='".$dt->format("Y-m-d")."' and create_date<='".$dt->format("Y-m-d")."' and luggage_to =".$_SESSION['route']." order by create_date") or die("Vehicle error:".mysql_error());
							while($luggage_row2=mysqli_fetch_array($luggage2))
				   			{
								
								if($luggage_row2['luggage_paymethod']=='To Pay' ){
								$lug_fees +=$luggage_row2['luggage_fees']+$luggage_row2['luggage_charges']+$luggage_row2['unloading_charges'];
								 }
								 
								 
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row2['luggage_paymethod']=='To Pay'){
								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;}
								if($luggage_row2['luggage_paymethod']=='Paid')
								{
								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;}
								if($luggage_row2['luggage_paymethod']=='Credit')
								{
								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
								}
								
							   
								
								
							    
								$agent_amt2 =$topay_amt2 +$paid_amt2+$credit_amt2+$luggage_row2['luggage_doorcharges'];
								//$agent_amt2 =$credit_amt2;
							    $tot_agt2+=$agent_amt2;
								$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
				   			}
							
							$lug_fees+=	$booking_lug_fees;
							$tot_agt_club =$tot_agt1+$tot_agt2;
							$get_type = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
						    $get_type1 = mysqli_fetch_array($get_type);
							 if($get_type1['route_type']==0){$bal_pay =$lug_fees - $tot_agt_club;}
							if($get_type1['route_type']==1){$bal_pay =$lug_fees + $tot_agt_club;}
							$total_credit +=$bal_pay;
							
						 ?>
                        
                        
                            <tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td  class="center"><?php echo $i."."; ?></td>
                            <td class="center"><?php  //$need_date = date('Y-m-d', strtotime('-1 day', strtotime($frmdate)));
							//$same_date  = date('Y-m-d', strtotime($dd . ' +1 day'));
							echo date('d-M-Y',strtotime($dt->format("Y-m-d")));
							?></td>
                            <td  align="left"><strong>H.O Payable</strong></td>
							<td  align="right">
							
							</td>
                            <td  align="right"><?php echo number_format($bal_pay,2);?></td>
                            </tr><?php */?>   
                        <?php //}
						$lug_fees=0;$tot_agt_club=0;$tot_agt1=0;$tot_agt2=0;$bal_pay=0;$topay_amt1 = 0;
					$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;$booking_lug_fees=0;$i++; 
						$news_events_flow=mysqli_query($objConn,"select * from power_daysheet where  create_date between  '".$frmdate."' and '".$todate."'    and route_id = '".$_SESSION['route']."'     order by create_date") or die("Collection error:".mysql_error());
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="5" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                        
                   <?php
				   }
				   else
				   {
				   
				   
				   $cnt=0;
				  $first_flag = 0;
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                       $css_set=$cnt%2;
					   
				   ?>
						
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td  class="center"><?php echo $i."."; ?></td>
                            <td class="center"><?php  echo date('d-M-Y', strtotime($news_events_flow_row['create_date']));
							?></td>
                            <td  align="left"><?php if($news_events_flow_row['collection_status']==1)echo $news_events_flow_row['collection_type']; 
							if($news_events_flow_row['collection_status']==0)
							{
								 $route = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where  id = ".$news_events_flow_row['route_id']));
								 
								 echo $route[0].' ('.$news_events_flow_row['collection_type'].'.'.$news_events_flow_row['comments'].')';
							}
							 ?>
							</td>
							<td  align="right">
							
							<?php 
							if($news_events_flow_row['collection_status']==1)
							{
							$total_debit +=$news_events_flow_row['collection_amount']; 
							echo number_format($news_events_flow_row['collection_amount'],2);
							//echo $news_events_flow_row['collection_status'];
							}
							
							?>
							</td>
                            <td  align="right"><?php if($news_events_flow_row['collection_status']==0)
							{
							$total_credit +=$news_events_flow_row['collection_amount']; 
							echo number_format($news_events_flow_row['collection_amount'],2);
							}?></td>
                            </tr>
                    <?php $i++;
				   
				   }
				   }?>   
                            
                            
                           <?php /*?><tr><td colspan="5"><strong>Transfer History</strong></tr> 
                            <?php
				
						   $transfer_row=mysqli_query($objConn,"select * from power_transfer where  collection_date between  '".$frmdate."' and '".$todate."'     and collection_date >= '2021-02-28' and route_id = '".$_SESSION['route']."'      order by collection_date") or die("Collection error:".mysql_error());
						   $cnt=0;
						   while($transfer_row1=mysqli_fetch_array($transfer_row))
						   {
							   $cnt++;
							   $css_set=$cnt%2;
							   
						   ?>
								
								<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
									<td  class="center"><?php echo $i."."; ?></td>
									<td class="center"><?php  echo date('d-M-Y', strtotime($transfer_row1['collection_date']));
									?></td>
									<td  align="left"><?php echo $transfer_row1['particulars'];?></td>
									<td  align="right">
									<?php 
									
									echo number_format($transfer_row1['collection_amount'],2);
									if($transfer_row1['collection_status']==1) 
									echo " <span style=color:red;>[UCB]</span>";
									else 
									$total_transfer +=$transfer_row1['collection_amount']; 
									?>
									</td>
									<td  align="right"></td>
									</tr>
							<?php $i++;
						  
						   }?> <?php */?>  
                         <tr  style="color:red; font-size:16px;"  >
							<td  class="center"></td>
                            <td class="center"></td>
                            <td  align="left">TOTAL</td>
							<td  align="right"><?php echo number_format($total_debit,2);?></td>
                            <td  align="right"><?php
							
							 echo number_format($total_credit,2);?></td>
                            </tr>  
                            <?php /*?> <tr  style="color:red; font-size:16px;">
							<td  class="center"></td>
                            <td class="center"></td>
                            <td  align="left">TRANSFER AMOUNT</td>
							<td  align="right"></td>
                            <td  align="right"><?php 
							
							echo number_format($total_transfer,2);?></td><?php */?>
                            </tr>  
                            <tr  style="color:red; font-size:16px;">
							<td  class="center"></td>
                            <td class="center"></td>
                            <td  align="left">CLOSING BALANCE</td>
							<td  align="right"></td>
                            <td  align="right"><?php 
							$closing_balance = $total_credit - $total_debit-$total_transfer + $openingbalance;
							echo number_format($closing_balance,2);?></td>
                            </tr>   
                             </table>
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    
                        
					</div></form>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>