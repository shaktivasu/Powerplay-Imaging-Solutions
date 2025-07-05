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
	$max1= mysqli_query($objConn,"select * from power_rcm_invoices where id =".$_REQUEST['id']);
	$max4 = mysqli_num_rows($max1);
	$invoice_id = mysqli_fetch_array($max1);
	//$max2 = $max4+1220;
    //$max3 = 'KMP'.$max2;
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
	
	<div id="content"><form name="frm" id="frm" method="post" action="">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap" style="overflow:auto">
				    
				    
				    <div class="printbreak">
                   <div align="center">
                    <?php 
                    $luggage=mysqli_query($objConn,"select * from power_luggage where  luggage_paymethod = 'Credit' and    luggage_sender_id = ".$_REQUEST['route_to']."  and create_date between  '".$frmdate."' and '".$todate."' order by luggage_lrno") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit where id = ".$_REQUEST['route_to']));
							 $heading_tag1 = $heading_tag['credit'];
					$tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;$tot_amt_credit=0;$i=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {		 $i++;
				   $route_door = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit_route where route_id = ".$luggage_row['luggage_to']." and  credit_id = ".$_REQUEST['route_to']));
					        $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$route_door['route_door'];
						    $tot_amt_credit +=	$tot_amt;
					        $luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   $tot_qty +=$luggage_prd2['luggage_qunty'];
							}
				   }
				   }
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
                                <td>KMP CREDIT</td>
                                <td><strong>Invoice Description :</strong></td>
                                <td>RCM INVOICE</td>
                                </tr>
                                <tr>
                                  <td height="50"><strong> Supplier Name :</strong></td>
                                  <td><strong>KMP Speed Parcel Service</strong></td>
                                  <td><strong>Customer Name :</strong></td>
                                  <td><strong><?php echo strtoupper($heading_tag['credit']);?></strong></td>
                                </tr>
                                <tr>
                                  <td height="50"  style="vertical-align:top"><br>
                                    <strong>Supplier Address :</strong></td>
                                  <td>Karuppakal Thottam, Near SNR College, <br>
                                    'S' bend, Navaindia Road,<br>
                                    Pappanaickenpalayam, Coimbatore - 641037.</td>
                                  <td style="vertical-align:top"><strong>Customer Address :</strong></td>
                                  <td><?php echo wordwrap($heading_tag['credit_address'],25,"<br>\n");?><br>
                                  <?php echo $heading_tag['credit_phone'];?></td>
                                </tr>
                                <tr>
                                  <td height="50"><strong>GST No : </strong></td>
                                  <td><strong>33AAUFK1187A1ZF</strong></td>
                                  <td><strong> GST No :</strong></td>
                                  <td><strong><?php echo $heading_tag['credit_gst'];?></strong></td>
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
                                  <td height="50" colspan="2"><strong>Amount In Words : </strong> Rupees <?php echo ucfirst(no_to_words($tot_amt_credit));?> Only. </td>
                                  <td><strong>Invoice Date :</strong></td>
                                  <td><?php echo date('d M Y')?></td>
                                </tr>
                                <tr>
                                <td height="50" colspan="2">Payment : Cheque/DD in favour of ' <strong>KMP Speed Parcel Service</strong> ' Only.</td>
                                <td><strong>Total Consignment :</strong></td>
                                <td><?php echo $i;?></td>
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
                                  <td height="50"><strong>Total Qty : </strong></td>
                                  <td><?php echo $tot_qty;?></td>
                                </tr>
                                
                                  <tr>
                                  <td height="20"><strong>Invoice Amount : </strong></td>
                                  <td><span style="font-size:10px;font-weight:bold;">Rs.
                                    <?php  echo number_format($tot_amt_credit,2); 
								?>
                                    /-</span><input type="hidden" name="invoice_amount" id="invoice_amount" value="<?php echo $tot_amt_credit?>" >
                                    <input type="hidden" name="invoice_qty" id="invoice_qty" value="<?php echo $tot_qty?>" ></td>
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
                   
                   
                   </div></div>
				    
				    
				    
				    
				    
				    
				    
				    
				    
				    
				    
				    
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>INVOICE - Credit Customers </h6>
                        
					</div>
                    
					
                   
                    <table class="display" border="1" cellpadding="0" cellspacing="0" width="100%" ><tr>   
                                    <td style="vertical-align:top; width=50%; padding:20px;">
                                    <strong>Customer Name :</strong><br>
                                    <strong><?php echo strtoupper($heading_tag['credit']);?></strong><br><br>
                                    <strong>Customer Address :</strong><br>
                                    <?php echo wordwrap($heading_tag['credit_address'],25,"<br>\n");?><br>
                                    <?php echo $heading_tag['credit_phone'];?><br>
                                    <strong>GST No : <?php echo $heading_tag['credit_gst'];?></strong></td>
                                     <td style="vertical-align:top; width=50%; padding:20px;" align="right">
                                    <strong>Invoice Number  : <?php echo $invoice_id['invoice_id'];?><br><br>
                                    Invoice Period : <?php echo date('M - Y',strtotime($_REQUEST['todate']))?><br><br>
                                    Invoice Date   : <?php echo date('d M Y')?></strong>
                                    </td>
                          </tr>
                    </table><br><br>
                    
					<div class="widget_content">
                  <?php 
				  
					$i=0;
                    $luggage=mysqli_query($objConn,"select * from power_luggage where  luggage_paymethod = 'Credit' and  luggage_sender_id = ".$_REQUEST['route_to']."  and create_date between  '".$frmdate."' and '".$todate."' order by luggage_lrno") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit where id = ".$_REQUEST['route_to']));
							 $heading_tag1 = $heading_tag['credit'];
                    ?>
                    <div class="printbreak">
                    
					   <table class="display" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
							<th>
								 Sl No
							</th>
							<th >Date</th>
                            <th >LR No.</th>
                            
                            <th>Reciever Name</th>
							
                            <th>Qty</th>
                            <?php if($heading_tag['credit_item']=='WEIGHT'){?>
                            <th>Weight</th><?php }?>
							<th >From</th>
							<th>To</th>
							<th >Booking Charges</th>
							<th>Loading / Unloading Charges</th>
							
							<th>Door Delivery Charges</th>
							<th>Total Amount</th>
							
						</tr>
						</thead>
						<tbody>
                          
                       
                   <?php
				  
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;$tot_amt_credit=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
                            
                           <td align="center"><?php echo $luggage_row['luggage_reciever'];
						   if($luggage_row['luggage_reciever_phone']!='maxlength=50' && $luggage_row['luggage_reciever_phone']!='n' && $luggage_row['luggage_reciever_phone']!='0')
						   echo ' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							
                            <td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   $tot_qty1 +=$luggage_prd2['luggage_qunty'];
							   echo $luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							    $unit_price = $luggage_prd2['unit_price'];
							}
							
							?> </td>
                            <?php if($heading_tag['credit_item']=='WEIGHT'){?>
                            <td align="center"><?php 
							echo number_format($luggage_row['luggage_fees']/$unit_price,2);
							$tot_weight += ($luggage_row['luggage_fees']/$unit_price);
							?></td>
                            <?php }?>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo number_format($luggage_row['luggage_fees'],2)?></td>
							<td align="center"><?php echo number_format( $luggage_row['luggage_charges'],2)?></td>
							
							<td align="center"><?php 
							$route_door = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit_route where route_id = ".$luggage_row['luggage_to']." and  credit_id = ".$_REQUEST['route_to']));
							echo number_format($route_door['route_door'],2)?></td>
							<td align="center"><?php $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$route_door['route_door'];
						    echo number_format($tot_amt,2);
							$tot_amt_credit +=	$tot_amt;
							?></td>
							
						</tr>
                        
						<?php $i++; 
						 } } ?><tr>
							<th colspan="4" align="right">
							</th>
							<th align="center"><?php echo $tot_qty?>
							</th>
                           <?php if($heading_tag['credit_item']=='WEIGHT'){?> 
						   <th align="center"><?php echo number_format($tot_weight,2)?>
							</th>
                            <th colspan="5" align="center">
							</th>
						   
						   <?php } else {?> 
                            <th colspan="5" align="right">
							</th> <?php }?>
							<th  align="center"><?php echo number_format($tot_amt_credit,2)?></th>
							
						</tr> 
						
					
						</tbody>
						</table>
						<br><br>
						<div align="right">For <strong>KMP SPEED PARCEL SERVICE</strong></div>
						<br><br>
                                <div align="right">Authorized Signatory</div>
                                
				  <?php ?>
				 
					</div>
                   <br><br>
                   <div class="printbreak">
                                   
               <div align="center">
               <br><br>
				   
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%"><thead>
                   <tr>
                   <th colspan="4"><?php echo $routename1?> Accounts</th></tr><thead>
                   <thead>
                   <tr>
                   <th>S.No</th><th>Particulars</th><th>KMP A/C</th><th><?php echo $heading_tag1?> A/C</th></tr></thead>
                   <tr>
                   <td>1.</td><td>Credit Booking</td><td align="right"><?php echo $tot_amt_credit;?></td><td></td></tr>
                   <tr>
                   <td>2. </td><td>Collection Amount</td><td align="right"></td><td align="right"><?php 
				   $total_debit= 0;
				     $col = "select sum(collection_amount) from power_collections_credit where  route_id = ".$_POST['route_to']."  and collection_date between  '".$frmdate."' and '".$todate."'";
				   $col1 = mysqli_query($objConn,$col);
				   $col2 = mysqli_fetch_row($col1);
				   $total_debit=$col2[0];
				   echo number_format($total_debit,2);
				   ?></td></tr>
                   
                   
                    <tr><td></td><td><strong>Closing Balance</strong></td><td align="right"><strong><?php echo $total_credit_debit  = $tot_amt_credit - $total_debit;  ?></strong></td><td align="right"></td></tr>
                    
                   </table>
                   
                   
               </div>  </div>            
                    
                
				
                   
                   
                   
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
		
        
        
	</div></form>
</div>
</body>
</html>
