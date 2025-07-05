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
	

echo "<script>window.print();</script>";


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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>
<script src="js/chosen.jquery.js"></script>
<script src="js/uniform.jquery.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/sticky.full.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/selectToUISlider.jQuery.js"></script>
<script src="js/fg.menu.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.cleditor.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.simplemodal.js"></script>
<script src="js/jquery.jBreadCrumb.1.1.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.idTabs.min.js"></script>
<script src="js/jquery.multiFieldExtender.min.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/elfinder.min.js"></script>
<script src="js/accordion.jquery.js"></script>
<script src="js/autogrow.jquery.js"></script>
<script src="js/check-all.jquery.js"></script>
<script src="js/data-table.jquery.js"></script>
<script src="js/ZeroClipboard.js"></script>
<script src="js/TableTools.min.js"></script>
<script src="js/jeditable.jquery.js"></script>
<script src="js/duallist.jquery.js"></script>
<script src="js/easing.jquery.js"></script>
<script src="js/full-calendar.jquery.js"></script>
<script src="js/input-limiter.jquery.js"></script>
<script src="js/inputmask.jquery.js"></script>
<script src="js/iphone-style-checkbox.jquery.js"></script>
<script src="js/meta-data.jquery.js"></script>
<script src="js/quicksand.jquery.js"></script>
<script src="js/raty.jquery.js"></script>
<script src="js/smart-wizard.jquery.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/treeview.jquery.js"></script>
<script src="js/ui-accordion.jquery.js"></script>
<script src="js/vaidation.jquery.js"></script>
<script src="js/mosaic.1.0.1.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.autocomplete.min.js"></script>
<script src="js/localdata.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.jqplot.min.js"></script>
<script src="js/custom-scripts.js"></script>



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
<body id="theme-default" class="full_block" onLoad="window.print();">

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
	
	<div id="content"><form name="frm" id="frm" method="post" action="">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap" style="overflow:auto">
					<div class="widget_content">
                  <?php 
				
					 if($_REQUEST['route_to']!=0) {
						// echo "select * from power_luggage where luggage_paymethod<>'Expenses' and   (luggage_to = ".$_REQUEST['route_to']." or luggage_from = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."'";
                    $luggage=mysqli_query($objConn,"select * from power_luggage where luggage_paymethod<>'Expenses' and   (luggage_to = ".$_REQUEST['route_to']." or luggage_from = ".$_REQUEST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$_REQUEST['route_to']));
							 $heading_tag1 = $heading_tag[0];
                    ?>
                    
                   <div class="printbreak">
                       
                       <?php $inv = "select * from power_agent_invoices where id = ".$_REQUEST['id'];
				   $inv1 = mysqli_query($objConn,$inv);
				   $invoice_id = mysqli_fetch_array($inv1);
				   ?>
                       <table class="display"  border="0" cellpadding="0" cellspacing="0" width="100%">
                   <tr>
                                  <th height="10" colspan="4" align="center"></th>
                                  </tr>
                                <tr>
                                  <th height="50" colspan="4" align="center"><strong class="btn-success" style="text-decoration:underline;">INVOICE </strong></th>
                                  </tr>
                                  <tr>
                                 
                                <tr>
                                <td height="50"><strong>Account :</strong></td>
                                <td>SERVICE CENTER</td>
                                <td><strong>Invoice Description :</strong></td>
                                <td>AGENT INVOICE</td>
                                </tr>
                                <tr>
                                  <td height="50"><strong> Supplier Name :</strong></td>
                                  <td><strong>KMP Speed Parcel Service</strong></td>
                                  <td><strong>Customer Name :</strong></td>
                                  <td><strong><?php 
				   $routename = mysqli_fetch_row(mysqli_query($objConn,"select route,route_address,route_phone from power_route where id = ".$_REQUEST['route_to']));
							 $routename1 = strtoupper($routename[0]);
				   echo $routename1?></strong></td>
                                </tr>
                                <tr>
                                  <td height="50"  style="vertical-align:top"><br>
                                    <strong>Supplier Address :</strong></td>
                                  <td>Karuppakal Thottam, Near SNR College, <br>
                                    'S' bend, Navaindia Road,<br>
                                    Pappanaickenpalayam, Coimbatore - 641037.</td>
                                  <td style="vertical-align:top"><strong>Customer Address :</strong></td>
                                  <td><?php echo wordwrap($routename[1],25,"<br>\n");?><br>
                                  <?php echo $routename[2];?></td>
                                </tr>
                                <tr>
                                  <td height="50"><strong>GST No : </strong></td>
                                  <td><strong>33AAUFK1187A1ZF</strong></td>
                                  <td><?php if($routename[3]!=''){?><strong> GST No :</strong><?php }?></td>
                                  <td><?php if($routename[3]!=''){?><strong><?php echo $routename[3];?></strong><?php }?></td>
                                </tr>
                                <tr>
                                  <td height="50"><strong>SAC CODE : </strong></td>
                                  <td><strong>996511</strong></td>
                                  <td><strong>Invoice Number :</strong></td>
                                  <td><strong><?php echo $invoice_id['invoice_id'];?></strong></td>
                                </tr>
                                <tr>
                                  <td height="50" style="vertical-align:top"><strong>TAXABLE : </strong></td>
                                  <td style="vertical-align:top">Tax Payable Under RCM</td>
                                  <td style="vertical-align:top"><strong>Invoice Period :</strong></td>
                                  <td style="vertical-align:top"><?php echo date('M - Y',strtotime($_REQUEST['todate']))?></td>
                                </tr>
                                <tr>
                                  <td height="50" colspan="2"><strong>Amount In Words : </strong> Rupees <?php echo ucfirst(no_to_words($invoice_id['invoice_amount']));?> Only. </td>
                                  <td><strong>Invoice Date :</strong></td>
                                  <td><?php echo  date("d-M-Y",strtotime($invoice_id['invoice_date']));?></td>
                                </tr>
                                <tr>
                                <td height="50" colspan="2">Payment : Cheque/DD in favour of ' <strong>KMP Speed Parcel Service</strong> ' Only.</td>
                                <td><strong>Total Consignment :</strong></td>
                                <td><?php 
                                
                                $tot_con=mysqli_query($objConn,"select * from power_luggage where luggage_paymethod<>'Expenses' and (luggage_from = ".$_REQUEST['route_to']."  or luggage_to = ".$_REQUEST['route_to'].") and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$tot_con1=mysqli_num_rows($tot_con);
                                echo $tot_con1;
                                ?></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="2" rowspan="2"  style="vertical-align:top"><span style="font-weight:bold;">Bank A/C Details : <br>
                                      <br>
Name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;KMP Speed Parcel Service<br>
<br>
A/C No&nbsp;&nbsp;:&nbsp;&nbsp;003661900001600<br>
<br>
Bank &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;Yes Bank<br>
<br>
Branch&nbsp;:&nbsp;&nbsp;Avinashi Road, Coimbatore.<br>
<br>
IFSC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;YESB0000036<br>
                                  </span></td>
                                  <td height="50"><strong>Total Sales Amount : </strong></td>
                                  <td><span style="font-size:10px;font-weight:bold;"><?php echo $invoice_id['invoice_amount'];?>/-</span></td>
                                </tr>
                                
                                  <tr>
                                  <td height="20"><strong>Invoice Amount : </strong></td>
                                  <td><span style="font-size:10px;font-weight:bold;">Rs.
                                    <?php  echo number_format( $invoice_id['closing_balance'],2); 
								?>
                                    /-</span></td>
                                </tr>
                                <tr>
                                <td colspan="3" height="50" style="font-weight:bold;">&nbsp;</td>
                                <td></td>
                                </tr>
                              
                                
                               
                                <tr>
                                <td colspan="3"></td>
                                <td>For <strong>KMP SPEED PARCEL SERVICE</strong></td>
                                </tr>
                                <tr>
                                <td colspan="3" height="40">&nbsp;</td>
                                <td></td>
                                </tr>
                                <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Authorized Signatory</td>
                                </tr>
                                <tr>
                                  <th height="10" colspan="4" align="center"></th>
                                  </tr>
                                </table>
                       </div>
                       
                       <?php /*?><div class="printbreak">
                       
				   <table class="display" width="99%">
                   <tr>
                   <td  width="50%"  style="vertical-align:top;">
                       
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
						  
						   }
					   
					   
					   echo   $summary6;  $qt3 = $qt3+$summary6;
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
                   <thead> <th colspan="2">Grand Total</th><th><?php echo $qt6;?></th><th  align="right"><?php echo $gt6;?></th></tr></thead>
                  
                   
                   
                   
                   
                   
                   </table>
                   </td>
                    
                    <td width="50%"  style="vertical-align:top;">
                    
                    <?php $inv = "select * from power_agent_invoices where id = ".$_REQUEST['id'];
				   $inv1 = mysqli_query($objConn,$inv);
				   $inv2 = mysqli_fetch_array($inv1);
				   ?>
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%"><thead>
                   <tr>
                   <th colspan="4"><?php echo $routename1?> Accounts</th></tr><thead>
                   <thead>
                   <tr>
                   <th>S.No</th><th align="center" >Particulars</th><th align="center">KMP A/C</th><th align="center">Agent A/C</th></tr></thead>
                   <tr> <td>1.</td><td align="center">To Pay Dly</td><td align="right"><?php echo $inv2['topay_delivery'];?></td><td></td></tr>
                   <tr><td>2.</td><td align="center">Paid Booking</td><td align="right"><?php echo $inv2['paid_booking'];?></td><td></td></tr>
                    <tr><td>3.</td><td align="center">Booking Commission</td><td></td><td align="right">
                   <?php echo $inv2['commission_booking'];?></td></tr>
                    <tr> <td>4.</td><td align="center">Delivery Commission</td><td></td><td align="right"><?php echo $inv2['commission_delivery'];?></td></tr>
                   <?php  $exp = "select * from power_expenses where route_id = ".$_REQUEST['route_to']." and   create_date between  '".$frmdate."' and '".$todate."'";
				   $exp1 =  mysqli_query($objConn,$exp);
				   $ssno = 5; $totexp=0;
				   while($exp2 = mysqli_fetch_array($exp1))
				   {
				   ?>
                    <tr><td><?php echo $ssno;?>.</td><td><?php echo $exp2['particulars']; ?></td><td></td><td align="right"><?php echo $exp2['amount']; ?> </td></tr>
                   <?php  $ssno++;
				   $totexp +=$exp2['amount'];
				   
				   }?>
                   
                   <?php if($inv2['debit1_amount']!=0){?>
                   <tr><td><?php echo $ssno+1;?>.</td><td><?php echo $inv2['debit1']?></td><td>&nbsp;</td><td align="right"><?php echo $inv2['debit1_amount']?></td><td align="right"></td></tr>
                   <?php }if($inv2['debit2_amount']!=0){?>
                   <tr><td><?php echo $ssno+2;?>.</td><td><?php echo $inv2['debit2']?></td><td>&nbsp;</td><td align="right"><?php echo $inv2['debit2_amount']?></td><td align="right"></td></tr>
                   <?php }if($inv2['debit3_amount']!=0){?>
                   <tr><td><?php echo $ssno+3;?>.</td><td><?php echo $inv2['debit3']?></td><td>&nbsp;</td><td align="right"><?php echo $inv2['debit3_amount']?></td><td align="right"></td></tr>
                   <?php }if($inv2['debit4_amount']!=0){?>
                   <tr><td><?php echo $ssno+4;?>.</td><td><?php echo $inv2['debit4']?></td><td>&nbsp;</td><td align="right"><?php echo $inv2['debit4_amount']?></td><td align="right"></td></tr>
                   <?php }if($inv2['debit5_amount']!=0){?>
                   <tr><td><?php echo $ssno+5;?>.</td><td><?php echo $inv2['debit5']?></td><td>&nbsp;</td><td align="right"><?php echo $inv2['debit5_amount']?></td><td align="right"></td></tr>
                   <?php }?>
                   <tr><td></td><td></td><td align="right"><strong><?php echo $total_credit = $topay_delivery +$gt5;  ?></strong></td><td align="right"><strong><?php echo $total_debit = $totexp +$inv2['commission_delivery'] +$inv2['commission_booking']+$inv2['debit1_amount']+$inv2['debit2_amount']+$inv2['debit3_amount']+$inv2['debit4_amount']+$inv2['debit5_amount']; ?></strong> </td></tr>
                    <tr><td></td><td><strong>Closing Balance</strong></td><td align="right"><strong><?php echo $inv2['closing_balance']  ?></strong></td><td align="right"></td></tr>
                    
                   </table>
                   
                   </td>
                   </tr>
                   
                   
                   
                   
                   </table></div><?php */?>
                    
                    
                    
                     <br><br>
                    
                    
                    <h2><?php echo $heading_tag1?> Accounts</h2><br><br>
					   <table class="display" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
							<th >
								 Sl No
							</th>
							<th >Date</th>
                            <th >LR No.</th>
                            <th >
								Paid / <br> To Pay
							</th>
                            
							<th>From</th>
							<th>To</th>
							<?php /*?><th>
								 Qty
							</th><?php */?>
							<th >Booking Charges</th>
							<th>Loading /Unloading Charges</th>
							
							<th>Tax</th>
							<th>Total Amount</th>
							
							<th>Agent Commission</th>
							<th>HO Amount</th>
						</tr>
						</thead>
						<tbody>
                          
                       
                   <?php
				  
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
                            	<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                            
                           
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							 <?php /*?><td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td><?php */?>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']+$luggage_row['unloading_charges']?></td>
							
							<td align="center"><?php echo $tax = ($luggage_row['luggage_fees'] +$luggage_row['luggage_charges']+$luggage_row['unloading_charges'])*5/100?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['unloading_charges']+$tax ?></td>
						
                           
							<td align="center" valign="middle" <?php echo $cls;?>>
                            <?php $get_com = mysqli_query($objConn,"select * from power_route where id =".$_REQUEST['route_to']);
						$get_com1 = mysqli_fetch_array($get_com);
						if($luggage_row['luggage_from']==$_REQUEST['route_to']){
						
						if($luggage_row['luggage_paymethod']=='To Pay')
						{
						$topay_total_purpose += ($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges']+$tax);
						 $topay_amt = ($luggage_row['luggage_fees'])*$get_com1['route_comission_topay']/100;
						}
                           if($luggage_row['luggage_paymethod']=='Paid')
						   {
						$paid_total_purpose += ($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges']+$tax);
						  $paid_amt= ($luggage_row['luggage_fees'])*$get_com1['route_comission_paid']/100; 
						   }
						
						if($luggage_row['luggage_paymethod']=='Credit')
						{
							$credit_total_purpose += ($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']);
						  $credit_amt = ($luggage_row['luggage_fees'])*$get_com1['route_comission_credit']/100;
						}
						 $agent_amt =$topay_amt +$paid_amt+$credit_amt;
						}
						
				  if($luggage_row['luggage_to']==$_REQUEST['route_to']){
					  if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt = ($luggage_row['luggage_fees'])*$get_com1['route_delivery_topay']/100;
                           if($luggage_row['luggage_paymethod']=='Paid')
						  $paid_amt= ($luggage_row['luggage_fees'])*$get_com1['route_delivery_paid']/100; 
						
						if($luggage_row['luggage_paymethod']=='Credit')
						  $credit_amt = ($luggage_row['luggage_fees'])*$get_com1['route_delivery_credit']/100;
						
						 $agent_amt =$topay_amt +$paid_amt+$credit_amt;
				  }
				   $tot_agt+=$agent_amt;
				   echo number_format($agent_amt,2);
				   $tot_agent_amt +=$agent_amt;
                            ?>
                            </td>
							<td align="center" valign="middle" <?php echo $cls;?>>
                            <?php   $ho_amt =($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']) - ($topay_amt +$paid_amt+$credit_amt);
				   if($luggage_row['luggage_paymethod']=='Credit')
				   $ho_amt = 0 ;
				   /*else
				   {
				  $tot_ho+=$ho_amt;
				  echo number_format($ho_amt,2);
				  
				  $tot_ho_amt +=$ho_amt;
				   }*/
				   if(($luggage_row['luggage_to']==$_REQUEST['route_to'] && $luggage_row['luggage_paymethod']=='To Pay')  ||  ($luggage_row['luggage_from']==$_REQUEST['route_to'] && $luggage_row['luggage_paymethod']=='Paid') ){
					   $tot_ho+=$ho_amt;$tot_ho_amt +=$ho_amt;
				  echo number_format($ho_amt,2);
				   }
				   else
				   echo '0.00';
				   ?>
                            
                            </td>
						</tr>
                        
						
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $tpaid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $ttopay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $tcredit_amt +=$tot_amt;
						$i++; $credit_amt=0;$paid_amt=0;$topay_amt =0; } } ?>
						<tr><td colspan="15" align="right"  bgcolor="#F9C6F1"><strong>Booking Paid : 
                        <?php 
						
						 echo number_format($paid_total_purpose,2); ?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Booking Topay : 
						<?php 
						
						  echo number_format($topay_total_purpose,2); 
						 ?></strong></td>
                        </tr>
                        
                        
                        
                        
                        
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Sales Amount : 
						<?php  
						echo number_format($invoice_id['invoice_amount'],2);
						?></strong></td>
                        </tr>
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Delivery : 
						<?php  
						
					echo number_format($invoice_id['topay_delivery'],2);
						?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Booking Paid : 
						<?php
				   echo number_format($invoice_id['paid_booking'],2);
						?></strong></td>
                        </tr>
                        
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong> Delivery Commission :
                        <?php 
						echo number_format($tot_agent_amt,2);?></strong></td>
                        </tr>
						
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Invoice Amount :
                        <?php 
						$tot_ho_amt= $invoice_id['topay_delivery']+$invoice_id['paid_booking']-$tot_agent_amt;
						echo $tot_ho_amt;
						?></strong><input type="hidden" name="total_ho_amount" id="total_ho_amount"  value="<?php echo $tot_ho_amt?>"></td>
                        </tr>
                        <?php if($invoice_id['debit1_amount']!=0) {?>
					    <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><?php echo $invoice_id['debit1']?> :
                        </strong><?php echo number_format($invoice_id['debit1_amount'],2);?></td>
                        </tr>
                        <?php }?>
                        <?php if($invoice_id['debit2_amount']!=0) {?>
					    <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><?php echo $invoice_id['debit2']?> :
                        </strong><?php echo number_format($invoice_id['debit2_amount'],2);?></td>
                        </tr>
                        <?php }?>
                        <?php if($invoice_id['debit3_amount']!=0) {?>
					    <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><?php echo $invoice_id['debit3']?> :
                        </strong><?php echo number_format($invoice_id['debit3_amount'],2);?></td>
                        </tr>
                        <?php }?>
                        <?php if($invoice_id['debit4_amount']!=0) {?>
					    <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><?php echo $invoice_id['debit4']?> :
                        </strong><?php echo number_format($invoice_id['debit4_amount'],2);?></td>
                        </tr>
                        <?php }?>
                        <?php if($invoice_id['debit5_amount']!=0) {?>
					    <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><?php echo $invoice_id['debit5']?> :
                        </strong><?php echo number_format($invoice_id['debit5_amount'],2);?></td>
                        </tr>
                        <?php }?>
                        
                        
						</tbody>
						</table>
				 
					
                   <?php }?>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
        
        
	</div></form>
</div>
</body>
</html>