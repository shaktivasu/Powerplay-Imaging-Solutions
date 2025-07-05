<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_REQUEST['frmdate']))
$frmdate = $_REQUEST['frmdate'];
if(isset($_REQUEST['todate']))
$todate = $_REQUEST['todate'];
function no_to_words($no)
    {
    $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 // echo $result . "  " . $points . " Paise";
 echo $result;
    }
	



?><!DOCTYPE HTML>
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

function  val()
{
if(document.frm.route_to.value==0)
{
	alert('Select Any Area');
	return false;
	}	
	return true;
}
</script>
<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style><style type="text/css">

	#printwrapper{

margin: 0px auto;
background: #FFF none repeat scroll 0% 0%;
border: 0px solid #8BB8C3;
}
    #printable { display: none; }

    @media print
    {
		@page { margin: 0.7cm; font-size:3pt !important; }
  body { margin: .7cm;  font-weight:bold;}
		@page { margin-top:15%; margin-bottom:4%;/*margin-bottom:25%; size: portrait;*/ }
		
    	#non-printable { display: none; font-size:3pt !important;}
    	#printable { display: block; font-size:3pt !important;}
		 #Header, #Footer { display: none !important; }
       

    }
	
	.printbreak {
page-break-after: always;
}

table, tr, td, th, tbody, thead, tfoot {
        page-break-inside: inherit !important;
		font-size:8.5px !important;
    }
	table {
  border: 1px solid black;
  border-collapse: collapse;
  
}
td{ padding-left:10px;
}
    </style>
</head>
<body id="theme-default" class="full_block">

<div id="left_bar" class="no-print">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<ul id="sidenav" class="accordion_mnu collapsible">
            
				<?php include("includes/menu.php");?>
                
                
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin no-print">
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
			
			
			
			<div class="grid_12">
				<div class="widget_wrap" style="overflow:auto">
					<div class="widget_content">
                    
                    <form name="frm" id="frm" method="post" action="">
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
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" align="right" class="label_txt">Route Wise:</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><span class="label_txt" style="text-transform:uppercase;"><span class="form_input">
          <select name="route_to" class="limiterBox">
            <option value="0">Select Any</option>
            <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0  order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_POST['route_to']==$route1['id'])
											echo "<option value=".$route1['id']." selected>".strtoupper($route1['route'])."</option>";
											else
											echo "<option value=".$route1['id'].">".strtoupper($route1['route'])."</option>";
										}
										
										?>
          </select>
        </span></span></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="246" height="26" align="right" class="label_txt">&nbsp;</td>
        <td width="285" align="center" class="label_txt" style="text-transform:uppercase;"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td width="169" align="right" class="label_txt">&nbsp;</td>
        <td width="271" align="center" class="label_txt">&nbsp;</td>
        <td width="87" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table></div>
	</form>
                    
                    
                  <?php 
				
					 if($_REQUEST['route_to']!=0) {
					
                   ?>
                       
                      
                       
				   <table class="display" width="99%">
                   <tr>
                   <td  width="100%"  style="vertical-align:top;">
                       
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%">
                       
                       
                   <thead>
                   <tr>
                   <th colspan="4"><?php 
				   $routename = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$_REQUEST['route_to']));
							 $routename1 = strtoupper($routename[0]);
				   echo $routename1?> Delivery</th></tr>
                   </thead>
                   <thead>
                   
                   
                   
                   
                   <tr>
                   <th colspan="2">Payment Type</th><th>Qty</th><th>Amount</th></tr></thead>
                   <tr>
                   <td  colspan="2"align="center"><strong>Credit</strong></td><td align="center">
                   <?php 
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					  
				   }
					echo   $summary6; 
					$qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?>
                   
                   </td><td  align="right"><?php echo $totamt;?></td></tr>
                   <tr>
                   <td colspan="2" align="center"><strong>Paid</strong></td><td align="center"> <?php 
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					 $luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$take_qty2['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{  $cn++;
							   echo $luggage_prd2['luggage_prd_name'];
							   echo ' - ';
							   echo $luggage_prd2['luggage_qunty'];
							   if($cn!=$luggage_prd_rows) echo " , ";
							  
							}
				   }
					echo   $summary6; 
					$qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?></td><td  align="right"><?php echo $totamt;?></td></tr>
                   <tr>
                   <td  colspan="2"align="center"><strong>Topay</strong></td><td align="center"><?php 
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					  
				   }
					echo   $summary6; 
					 $qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?></td><td  align="right"><?php echo $totamt; $topay_delivery = $totamt; ?></td></tr>
                   
                   
                   
                   <thead> <th colspan="2" >Grand Total</th><th><?php echo $qt;?></th><th align="right"><?php echo $gt;?></th></tr></thead>
                   <tr height=30px;><th  colspan="4">&nbsp;</th></tr>
                   <thead>
                   <tr>
                   <th  colspan="4"><?php echo $routename1?> Booking</th></tr></thead>
                   <thead>
                   <tr>
                   <th>Payment Type</th><th>To Location</th><th>Qty</th><th>Amount</th></tr></thead>
                   
                   <?php 
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'  group by luggage_to";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   ?><tr>
                   <td align="center"><?php if($flag==0){?><strong>Paid</strong><?php $flag=1;}?></td><td align="center"><strong><?php 
				   
				    $routename4 = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$summary2[1]));
							 $routename5 = $routename4[0];
				   echo $routename5;
				    ?></strong></td><td align="center"><?php
					   $totamt +=$summary2[0];
					 
					   $take_qty = "select * from power_luggage where luggage_from = ".$_REQUEST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'  and  luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						  $luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$take_qty2['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{  $cn++;
							   echo $luggage_prd2['luggage_prd_name'];
							   echo ' - ';
							   echo $luggage_prd2['luggage_qunty'];
							   if($cn!=$luggage_prd_rows) echo " , ";
							  
							}
						   }
					   
					   
					   echo   $qt3;  $qt3 = $qt3+$summary6;
					   ?></td><td  align="right"><?php echo $totamt;?></td></tr><?php 
					   $gt5 = $gt5 +$totamt;
					   $summary6 =0;$totamt=0;
					   
				   }
					
				   
				   ?>
                  <thead> <th colspan="2">Grand Total</th><th><?php echo $qt3;?></th><th align="right"><?php echo $gt5;?></th></tr></thead>
                   
                    <?php 
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'  group by luggage_to";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   ?><tr>
                   <td align="center"><?php if($flag==0){?><strong>To Pay</strong><?php $flag=1;}?></td><td align="center"><strong><?php 
				   
				    $routename4 = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$summary2[1]));
							 $routename5 = $routename4[0];
				   echo $routename5;
				    ?></strong></td><td align="center"><?php
					   $totamt +=$summary2[0];
					    $take_qty = "select * from power_luggage where  luggage_from = ".$_REQUEST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and  luggage_paymethod = 'To Pay'  and luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						  $luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$take_qty2['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{  $cn++;
							   echo $luggage_prd2['luggage_prd_name'];
							   echo ' - ';
							   echo $luggage_prd2['luggage_qunty'];
							   if($cn!=$luggage_prd_rows) echo " , ";
							  
							}
						   }echo   $summary6;  $qt2 = $qt2+$summary6;
					   ?></td><td  align="right"><?php echo $totamt;?></td></tr><?php $gt1 = $gt1 +$totamt; $summary6 =0;$totamt=0;
				   }
					
				   
				   ?>
                  
                   <thead> <th colspan="2">Grand Total</th><th><?php echo $qt2;?></th><th  align="right"><?php echo $gt1;?></th></tr></thead> <?php 
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'  group by luggage_to";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   ?><tr>
                   <td align="center"><?php if($flag==0){?><strong>Credit</strong><?php $flag=1;}?></td><td align="center"><strong><?php 
				   
				    $routename4 = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$summary2[1]));
							 $routename5 = $routename4[0];
				   echo $routename5;
				    ?></strong></td><td align="center"><?php
					   $totamt +=$summary2[0];
					    $take_qty = "select * from power_luggage where  luggage_from = ".$_REQUEST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and  luggage_paymethod = 'Credit'  and luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						 
						   }echo   $summary6;  $qt6 = $qt6+$summary6;
					   ?></td><td  align="right"><?php echo $totamt;?></td></tr><?php $gt6 = $gt6 +$totamt; $summary6 =0;$totamt=0;
				   }
					
				   
				   ?>
                   <?php /*?><thead> <th colspan="2">Grand Total</th><th><?php echo $qt6;?></th><th  align="right"><?php echo $gt6;?></th></tr></thead><?php */?>
                  
                   
                   
                   
                   
                   
                   </table>
                   </td>
                    
                    <td width="50%"  style="vertical-align:top;">
                    
                    
                   
                   </td>
                   </tr>
                   
                   
                   
                   
                   </table>
                    
                    
                    
                     <?php }?>
                    
                    
                 
				 
					
                 
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
        
        
	</div>
</div>
</body>
</html>