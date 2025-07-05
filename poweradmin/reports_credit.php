<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_POST['frmdate']))
$frmdate = $_POST['frmdate'];
if(isset($_POST['todate']))
$todate = $_POST['todate'];

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
	$max1= mysqli_query($objConn,"select * from power_rcm_invoices");
	$max4 = mysqli_num_rows($max1);
	$max2 = $max4-277+1;
	//$max2 = $max4+1220;
	//$max3 = 'KMP'.$max2;
	    $str = strlen($max2);
		if($str == 1) $strmax3 = "0000".$max2;
		if($str == 2) $strmax3 = "000".$max2;
		if($str == 3) $strmax3 = "00".$max2;
		if($str == 4) $strmax3 = "0".$max2;
		if($str>4) $strmax3 = $max2;
	
	$max3 = 'KMP'.$strmax3.'/22-23';
if(isset($_POST['invoice_confirm']))
{
	
	$max1= mysqli_query($objConn,"select * from power_rcm_invoices");
	$max4 = mysqli_num_rows($max1);
	//$max2 = $max4+1220;
	$max2 = $max4-277+1;
	
	 $str = strlen($max2);
		if($str == 1) $strmax3 = "0000".$max2;
		if($str == 2) $strmax3 = "000".$max2;
		if($str == 3) $strmax3 = "00".$max2;
		if($str == 4) $strmax3 = "0".$max2;
		if($str>4) $strmax3 = $max2;
	
	$max3 = 'KMP'.$strmax3.'/22-23';
	//KMP1220
	$dup = "select * from power_rcm_invoices where invoice_from = '".$_REQUEST['frmdate']."' and invoice_to='".$_REQUEST['todate']."' and credit_id =".$_REQUEST['route_to'];
	$dup1 = mysqli_query($objConn,$dup);
	$dup2 = mysqli_num_rows($dup1);
	if($dup2==0)
	{
	 $ins = "insert into power_rcm_invoices (invoice_id,credit_id,invoice_date,invoice_from,invoice_to,invoice_amount,invoice_qty) values ('".$max3."','".$_REQUEST['route_to']."','".date('Y-m-d')."','".$_REQUEST['frmdate']."','".$_REQUEST['todate']."','".$_REQUEST['invoice_amount']."',".$_REQUEST['invoice_qty'].")";
	$ins1 = mysqli_query($objConn,$ins);
	}
	echo "<script>window.print();</script>";
	//header("location:rcm_invoices.php");
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
function CenterWindow(windowWidth, windowHeight, windowOuterHeight, url, wname, features) {
    var centerLeft = parseInt((window.screen.availWidth - windowWidth) / 2);
    var centerTop = parseInt(((window.screen.availHeight - windowHeight) / 2) - windowOuterHeight);
 
    var misc_features;
    if (features) {
      misc_features = ', ' + features;
    }
    else {
      misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';
    }
    var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + centerLeft + ',top=' + centerTop + misc_features;
    var win = window.open(url, wname, windowFeatures);
    win.focus();
    return win;
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
		@page { margin: 0; }
  body { margin: .7cm;  font-size:10px; font-weight:bold;}
		@page { margin-top:15%; margin-bottom:4%;/*margin-bottom:25%; size: portrait;*/ }
		
    	#non-printable { display: none; }
    	#printable { display: block; }
		 #Header, #Footer { display: none !important; }
       

    }
	
	.printbreak {
page-break-after: always;
}

table, tr, td, th, tbody, thead, tfoot {
        page-break-inside: inherit !important;
		
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
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>Reports - Credit Customers </h6>
                        
					</div>
                    
					<div class="widget_content">
                    
                    
								
    
    
    
    <div class="arrow_box no-print" >
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="233" height="26" align="right" class="label_txt">From Date :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date : </td>
        <td width="257" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt"></td>
      </tr>
      <tr>
        <td height="26" align="right" class="label_txt">Select Any Area</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><?php /*?><input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>"><?php */?>
        <select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_credit  where credit_type =0  order by credit ");
										while($route1 = mysqli_fetch_array($route))
										{
											if($route1['id']==$_POST['route_to'])
											echo "<option value=".$route1['id']." selected>".$route1['credit']."</option>";
											else
											echo "<option value=".$route1['id'].">".$route1['credit']."</option>";
										}
										
										?>
                        </select>
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="INVOICE PREVIEW" onClick="return val();"></td>
        <td align="center" class="label_txt"></td>
      </tr>
     
      <tr>
       <td colspan="5"></td>
      </tr>
      
    </table></div>
	
    

								
							
                    
                    
                    
	
						
					</div>
                    
                    <br>
					<br>

                    <?php $dup = "select * from power_rcm_invoices where invoice_from = '".$_REQUEST['frmdate']."' and invoice_to='".$_REQUEST['todate']."' and credit_id =".$_REQUEST['route_to'];
	$dup1 = mysqli_query($objConn,$dup);
	$dup2 = mysqli_num_rows($dup1);
	if($dup2==0)
	{ ?>
					<div class="widget_content">
                  <?php 
				   //$routewise = "select * from power_route where id in (select luggage_to from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."' $vecstr".")";
				  
					//Maximum of News & Events
					 if($_REQUEST['route_to']!=0) {
                    $luggage=mysqli_query($objConn,"select * from power_luggage where  luggage_sender_id = ".$_REQUEST['route_to']."  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod='Credit' order by create_date,luggage_lrno") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit where id = ".$_REQUEST['route_to']));
							 $heading_tag1 = $heading_tag['credit'];
							 
							 
							 
                    ?><?php /*?><h2> Accounts</h2><br><br><?php */?>
                    <div class="printbreak">
                    
					   <table class="display" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
							<th>
								 Sl No
							</th>
							<th >Date</th>
                            <th >LR No.</th>
                             <th>Sender Name</th>
                            <th>Reciever Name</th>
							
                            
							<th >From</th>
							<th>To</th>
                            <th>Qty</th>
                            <?php if($heading_tag['credit_item']=='WEIGHT'){?><th>Weight</th><?php }?>
							<th >Booking Charges</th>
							<th>Loading / Unloading Charges</th>
							
							<th>Door Delivery Charges</th>
							<th>Total Amount</th>
                            <th>EDIT</th>
							<?php /*?><th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Agent Commission</th>
							<th width="18%">
								 HO Commission
							</th><?php */?>
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
                            <td align="center"><?php echo $luggage_row['luggage_sender']/*.' & '.$luggage_row['luggage_sender_phone'];*/ ?></td>
                           <td align="center"><?php echo $luggage_row['luggage_reciever']/*.' & '.$luggage_row['luggage_reciever_phone'];*/ ?></td>
							<?php /*?><td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td><?php */?>
                            
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							$route_door = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit_route where route_id = ".$luggage_row['luggage_to']." and  credit_id = ".$_REQUEST['route_to']));
							?></td>
                            <td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   $tot_qty +=$luggage_prd2['luggage_qunty'];
							   $tot_weight +=$luggage_prd2['unit_price'];
							   echo $luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   $unit_price = $luggage_prd2['unit_price'];
							}
							
							?>
                            
                            
								 
							</td>
                            <?php if($heading_tag['credit_item']=='WEIGHT'){?>
                            <td align="center"><?php 
							echo number_format($luggage_row['luggage_fees']/$unit_price,2);
							$tot_weight += ($luggage_row['luggage_fees']/$unit_price);
							?></td><?php }?>
							<td align="center"><?php echo $luggage_row['luggage_fees'];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							
							<td align="center"><?php echo $route_door['route_door']?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$route_door['route_door'];
						$tot_amt_credit +=	$tot_amt;
							
							?></td><td align="center">  <a href="#" onclick="return CenterWindow(500,700,50,'luggage_credit_edit.php?id=<?php echo $luggage_row['id']; ?>')"><img src="images/edittable.gif"></a></td>
							<?php /*?><td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                           
							<td align="center" valign="middle" <?php echo $cls;?>>
                            <?php $get_com = mysqli_query($objConn,"select * from power_route where id =".$_POST['route_to']);
						$get_com1 = mysqli_fetch_array($get_com);
						if($luggage_row['luggage_from']==$_POST['route_to']){
						
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
                           if($luggage_row['luggage_paymethod']=='Paid')
						  $paid_amt= $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100; 
						
						if($luggage_row['luggage_paymethod']=='Credit')
						  $credit_amt = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
						
						 $agent_amt =$topay_amt +$paid_amt+$credit_amt;
						}
						
				  if($luggage_row['luggage_to']==$_POST['route_to']){
					  if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt = $luggage_row['luggage_fees']*$get_com1['route_delivery_topay']/100;
                           if($luggage_row['luggage_paymethod']=='Paid')
						  $paid_amt= $luggage_row['luggage_fees']*$get_com1['route_delivery_paid']/100; 
						
						if($luggage_row['luggage_paymethod']=='Credit')
						  $credit_amt = $luggage_row['luggage_fees']*$get_com1['route_delivery_credit']/100;
						
						 $agent_amt =$topay_amt +$paid_amt+$credit_amt;
				  }
				   $tot_agt+=$agent_amt;
				   echo number_format($agent_amt,2);
				   $tot_agent_amt +=$agent_amt;
                            ?>
                            </td>
							<td align="center" class="center">
                            
                            <?php $ho_amt =$luggage_row['luggage_fees'] - ($topay_amt +$paid_amt+$credit_amt);
				   if($luggage_row['luggage_paymethod']=='To Pay' || $luggage_row['luggage_paymethod']=='Credit')
				   $ho_amt = 0 ;
				   else
				  $tot_ho+=$ho_amt;
				  echo number_format($ho_amt,2);
				  
				  $tot_ho_amt +=$ho_amt;
				  ?>
							
							</td><?php */?>
						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $tpaid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $ttopay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $tcredit_amt +=$tot_amt;
						$i++; $credit_amt=0;$paid_amt=0;$topay_amt =0; } } ?><tr>
							<th colspan="7" align="right">
							</th>
							<th align="center"><?php echo $tot_qty?>
							</th>
                             <?php if($heading_tag['credit_item']=='WEIGHT'){?>
                            <th align="center"><?php echo number_format($tot_weight,2)?>
							</th>
                            <th colspan="3" align="center">
							</th><?php }
							else
								 {?>
								  <th colspan="3" align="center">
							</th>
								 <?php
								 }
							?>
							<th  align="center"><?php echo number_format($tot_amt_credit,2)?></th>
							<th  align="center"></th>
						</tr> <?php /*?>
						<tr><td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Paid Amount : 
                        <?php 
						
						 echo $tpaid_amt ?></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo $ttopay_amt; 
						 ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php 
						echo $tcredit_amt;?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Amount : 
						<?php echo $tot_amt1 =$tpaid_amt +$ttopay_amt+$tcredit_amt;?></strong></td>
                        </tr>
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Agent Commission :
                        <?php 
						echo $tot_agent_amt;?></strong></td>
                        </tr>
						
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>HO Commission :
                        <?php 
						echo $tot_ho_amt;?></strong></td>
                        </tr><?php */?>
						
					
						</tbody>
						</table>
				  <?php ?>
				 <?php /*?>  else
				   {
					   $routewise = "select * from power_route where id in (select luggage_to from power_luggage)";
				  $routewise1 = mysqli_query($objConn,$routewise);
				   $routewise2 = mysqli_num_rows($routewise1);
				  if($routewise2>0)
				  {
					while($routewise3 = mysqli_fetch_array($routewise1))
					{
						//echo "select * from power_luggage where  luggage_to = ".$routewise3[0]."  and create_date between  '".$frmdate."' and '".$todate."'";
						$luggage=mysqli_query($objConn,"select * from power_luggage where  (luggage_to = ".$routewise3[0]." or luggage_from = ".$routewise3[0].")  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
				  ?>
						<h6 class="inline_code"><?php echo $routewise3['route']?></h6><br><br>
                        
                        
                        
	
						
						<table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<th width="21%">
								 Particular
							</th>
                            <th width="21%">
								 Qty
							</th>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Luggage Charges</th>
							<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>
							<th width="7%">Total Amount</th>
							<th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Agent Commission</th>
							<th width="18%">
								 HO Commission
							</th>
						</tr>
						</thead>
						<tbody>
                          <?php
					//Maximum of News & Events
					 
                     
                    ?>
                       
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
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td>
                            <td align="center">
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
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                           
							<td align="center" valign="middle" <?php echo $cls;?>></td>
							<td align="center" class="center">
							
							</td>
						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?><tr><td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Paid Amount : 
                        <?php 
						
						 echo $paid_amt ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo $topay_amt; 
						 ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php 
						echo $credit_amt;?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Amount : 
						<?php echo $tot_amt1 =$paid_amt +$topay_amt+$credit_amt;?></strong></td>
                        </tr><?php }?>
						</tbody>
						</table>
						<?php
						}
						<?php */?>
					</div>
                   <br><br>
                   <div class="printbreak">
                   <div align="center">
                   
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
                                  <td><strong><?php echo $max3;?></strong></td>
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
                                <td><?php echo $i-1;?></td>
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
                                  <td height="50"><strong>Total Quantity : </strong></td>
                                  <td><?php echo $tot_qty;?></td>
                                </tr>
                                
                                  <tr>
                                  <td height="20"><strong>Invoice Amount : </strong></td>
                                  <td>Rs.
                                    <?php  echo number_format($tot_amt_credit,2); 
								?>
                                    /-<input type="hidden" name="invoice_amount" id="invoice_amount" value="<?php echo $tot_amt_credit?>" >
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
                   
                   
                   </div></div><div class="printbreak">
                                   
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
                    
                
				<?php }?>
                   
                   
                   
					</div>
                    
                    <?php } else { echo "<div align=center><strong><font color=#FF0000>Invoice Already Generated.</font></strong><br>&nbsp;&nbsp;<a href=rcm_invoices.php> Clicke here to view</a></div>";
					}?>
				</div>
			</div>
			
			
			
			
		</div>
		
		<?php $dup = "select * from power_rcm_invoices where invoice_from = '".$_REQUEST['frmdate']."' and invoice_to='".$_REQUEST['todate']."' and credit_id =".$_REQUEST['route_to'];
	$dup1 = mysqli_query($objConn,$dup);
	$dup2 = mysqli_num_rows($dup1);
	if($dup2==0)
	{ ?>
		<span class="clear"></span><div align="center" class="no-print"><input type="submit" name="invoice_confirm"  value="INVOICE - CONFIRM" style="width:200px; font-size:18px; height:40px; background-color:#CF6;"></div><?php }?>
        
        
	</div></form>
</div>
</body>
</html>
