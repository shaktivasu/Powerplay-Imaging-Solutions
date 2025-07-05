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
	$max1= mysqli_query($objConn,"select * from power_agent_invoices");
	$max4 = mysqli_num_rows($max1);
	$max2 = '00'.$max4+1;
	$max3 = 'KMP'.date('y').$max2;
if(isset($_POST['invoice_confirm']))
{
	
	$max1= mysqli_query($objConn,"select * from power_agent_invoices");
	$max4 = mysqli_num_rows($max1);
	$max2 = $max4+1;
	
	$str = strlen($max2);
		if($str == 1) $strmax3 = "00".$max2;
		if($str == 2) $strmax3 = "0".$max2;
		if($str == 3) $strmax3 = $max2;
		
		if($str>3) $strmax3 = $max3;
		$max3 = 'KMP'.date('y').$strmax3;
	//KMP1220
	$dup = "select * from power_agent_invoices where invoice_from = '".$_REQUEST['frmdate']."' and invoice_to='".$_REQUEST['todate']."' and route_id =".$_REQUEST['route_to'];
	$dup1 = mysqli_query($objConn,$dup);
	$dup2 = mysqli_num_rows($dup1);
	if($dup2==0)
	{
		//$closing_bal = $_REQUEST['closing_balance']- ($_REQUEST['debit1_amount']+$_REQUEST['debit2_amount']+$_REQUEST['debit3_amount']+$_REQUEST['debit4_amount']+$_REQUEST['debit5_amount']);
		$closing_bal =   $_REQUEST['balance_payable'];
		$deb1_amt = 0;$deb2_amt = 0;$deb3_amt = 0;$deb4_amt = 0;$deb5_amt = 0;
		if($_REQUEST['debit1']!='')
		$deb1  =  $_REQUEST['debit1'];
		else
		$deb1  =  'Mil';
		
		
		
		if($_REQUEST['debit1_amount']!='')
		$deb1_amt = $_REQUEST['debit1_amount'];
		else
		$deb1_amt  =  0;
		
		
		if($_REQUEST['debit2']!='')
		$deb2  =  $_REQUEST['debit2'];
		else
		$deb2  =  'Mil';
		
		if($_REQUEST['debit2_amount']!='')
		$deb2_amt = $_REQUEST['debit2_amount'];
		else
		$deb2_amt  =  0;
		
		if($_REQUEST['debit3']!='')
		$deb3  =  $_REQUEST['debit3'];
		else
		$deb3  =  'Mil';
		
		
		if($_REQUEST['debit3_amount']!='')
		$deb3_amt = $_REQUEST['debit3_amount'];
		else
		$deb3_amt  =  0;
		
		
		if($_REQUEST['debit4']!='')
		$deb4  =  $_REQUEST['debit4'];
		else
		$deb4  =  'Mil';
		
		
		if($_REQUEST['debit4_amount']!='')
		$deb4_amt = $_REQUEST['debit4_amount'];
		else
		$deb4_amt  =  0;
		
		
		if($_REQUEST['debit5']!='')
		$deb5  =  $_REQUEST['debit5'];
		else
		$deb5  =  'Mil';
		
		
		if($_REQUEST['debit5_amount']!='')
		$deb5_amt = $_REQUEST['debit5_amount'];
		else
		$deb5_amt  =  0;
		
		
	 echo $ins = "insert into power_agent_invoices (invoice_id,route_id,invoice_date,invoice_from,invoice_to,invoice_amount,invoice_qty,topay_delivery,paid_booking,commission_booking,commission_delivery,debit1,debit1_amount,debit2,debit2_amount,debit3,debit3_amount,debit4,debit4_amount,debit5,debit5_amount,closing_balance) values ('".$max3."','".$_REQUEST['route_to']."','".date('Y-m-d')."','".$_REQUEST['frmdate']."','".$_REQUEST['todate']."','".$_REQUEST['invoice_amount']."',".$_REQUEST['invoice_qty'].",'".$_REQUEST['topay_delivery']."','".$_REQUEST['paid_booking']."','".$_REQUEST['commission_booking']."','".$_REQUEST['commission_delivery']."','".$deb1."','".$deb1_amt."','".$deb2."','".$deb2_amt."','".$deb3."','".$deb3_amt."','".$deb4."','".$deb4_amt."','".$deb5."','".$deb5_amt."','".$closing_bal."')";
	$ins1 = mysqli_query($objConn,$ins);
	}
	/*echo "<script>window.print();</script>";*/
	header("location:agent_invoices.php");
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
<?php /*?><script src="js/jquery-1.7.1.min.js"></script>
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
<?php */?>


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

function bal_calc()
{
	//alert(parseInt(document.getElementById('debit1_amount').value))
	if(document.getElementById('debit1_amount').value=='') document.getElementById('debit1_amount').value=0;
	if(document.getElementById('debit2_amount').value=='') document.getElementById('debit2_amount').value=0;
	if(document.getElementById('debit3_amount').value=='') document.getElementById('debit3_amount').value=0;
	if(document.getElementById('debit4_amount').value=='') document.getElementById('debit4_amount').value=0;
	if(document.getElementById('debit5_amount').value=='') document.getElementById('debit5_amount').value=0;
	
	a = parseInt(document.getElementById('total_ho_amount').value) -  (parseInt(document.getElementById('debit1_amount').value) + parseInt(document.getElementById('debit2_amount').value) + parseInt(document.getElementById('debit3_amount').value) + parseInt(document.getElementById('debit4_amount').value) + parseInt(document.getElementById('debit5_amount').value))
	document.getElementById('balance_payable').value = parseInt(a)
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
  border: 0px solid black;
  border-collapse: collapse;
  
}
td{ padding-left:10px;
}
    </style></head>
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
						<h6>Reports - Agent </h6>
                        
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
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
	  <tr>
        <td width="233" height="26" align="right" class="label_txt">Route Type</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<?php
        if($_POST['route_type']==1) {?>
		<input type="radio" name="route_type" id="route_type" onClick="this.form.submit();" value ="1"  checked="checked" > Own Agent&nbsp;
		<input type="radio" name="route_type" id="route_type" onClick="this.form.submit();"  value ="0"> Agent
		<?php }
		elseif($_POST['route_type']==0)
		{?><input type="radio" name="route_type" id="route_type" onClick="this.form.submit();" value ="1"  checked="checked" > Own Agent&nbsp;
		<input type="radio" name="route_type" id="route_type" onClick="this.form.submit();"  value ="0"> Agent
		<?php
		}
		else
		{ ?>
	    <input type="radio" name="route_type" id="route_type" onClick="this.form.submit();" value ="1"  > Own Agent&nbsp;
		<input type="radio" name="route_type" id="route_type" onClick="this.form.submit();"  value ="0"> Agent
	    <?php
		}?></td>
        <td width="161" align="right" class="label_txt"> </td>
        <td width="257" align="center" class="label_txt">
                 </td>
        <td width="80" align="center" class="label_txt"></td>
      </tr>
	  <?php if( $_POST['route_type']==1){
	  ?>
	  
	  
	  <tr>
        <td height="26" align="right" class="label_txt">Select Any Hub</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><?php /*?><input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>"><?php */?>
        <select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">Select Any</option>
                          <?php 
						                  $str = "select * from power_route where route_status=0 and id in (select route_to from power_luggage where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."')";
										
										 $route=mysqli_query($objConn,"select * from power_route where route_type = ".$_POST['route_type']." and route_status=0 and id in (select luggage_to from power_luggage where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."') order by route ") or die("Vehicle error:".mysql_error());
										//$route = mysqli_query($objConn,"select * from power_route where route_status=0 order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($route1['id']==$_POST['route_to'])
											echo "<option value=".$route1['id']." selected>". $str.strtoupper($route1['route'])."</option>";
											else
											echo "<option value=".$route1['id'].">".strtoupper($route1['route'])."</option>";
										}
										
										?>
                        </select>
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt"></td>
      </tr><?php }
	  ?>
	  <?php if(isset($_POST['route_type'])){?>
      <tr>
        <td height="26" align="right" class="label_txt">Select Any Area</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><?php /*?><input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>"><?php */?>
        <select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">Select Any</option>
                          <?php 
						                  $str = "select * from power_route where route_status=0 and route_type = ".$_POST['route_type']." and id in (select route_to from power_luggage where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."')";
										
										 $route=mysqli_query($objConn,"select * from power_route where route_type = ".$_POST['route_type']." and route_status=0 and id in (select luggage_to from power_luggage where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."') order by route ") or die("Vehicle error:".mysql_error());
										//$route = mysqli_query($objConn,"select * from power_route where route_status=0 order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($route1['id']==$_POST['route_to'])
											echo "<option value=".$route1['id']." selected>".strtoupper($route1['route'])."</option>";
											else
											echo "<option value=".$route1['id'].">".strtoupper($route1['route'])."</option>";
										}
										
										?>
                        </select>
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="INVOICE PREVIEW" onClick="return val();"></td>
        <td align="center" class="label_txt"></td>
      </tr>
	  <?php }?>
      <tr>
       <td colspan="5"><br></td>
      </tr>
      
    </table></div>
	
    

								
							
                    
                    
                    
	
						
					</div>
                    
                    <br>
					<br>

                    
					<div class="widget_content">
                  <?php 
				   //$routewise = "select * from power_route where id in (select luggage_to from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."' $vecstr".")";
				  
					//Maximum of News & Events
					 if($_POST['route_to']!=0) {
                    $luggage=mysqli_query($objConn,"select * from power_luggage where luggage_paymethod<>'Expenses' and   (luggage_to = ".$_POST['route_to']." or luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$_POST['route_to']));
							 $heading_tag1 = $heading_tag[0];
                    ?><h2><?php echo $heading_tag1?> Accounts</h2><br><br>
					   <table class="display" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<?php /*?><th width="21%">
								 Particular
							</th>
                            <th width="21%">
								 Qty
							</th><?php */?>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Handling Charges</th>
							<th width="7%">GST</th>
							<!--<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>-->
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
							<?php /*?><td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysql_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysql_fetch_array($luggage_prd1))
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
							$luggage_prd_rows = mysql_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysql_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_qunty'];
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
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']+$luggage_row['unloading_charges']?></td>
							<?php /*<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>*/?>
							<td align="center"><?php echo $tax=($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges'])*5/100;
							?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges']+$tax?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                           
							<td align="center" valign="middle" <?php echo $cls;?>>
                            <?php $get_com = mysqli_query($objConn,"select * from power_route where id =".$_POST['route_to']);
						$get_com1 = mysqli_fetch_array($get_com);
						if($luggage_row['luggage_from']==$_POST['route_to']){
						
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
						
				  if($luggage_row['luggage_to']==$_POST['route_to']){
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
							<td align="center" class="center">
                            
                            <?php  $ho_amt =($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['unloading_charges']+$luggage_row['luggage_doorcharges']+$tax) - ($topay_amt +$paid_amt+$credit_amt);
				   if($luggage_row['luggage_paymethod']=='Credit')
				   $ho_amt = 0 ;
				   /*else
				   {
				  $tot_ho+=$ho_amt;
				  echo number_format($ho_amt,2);
				  
				  $tot_ho_amt +=$ho_amt;
				   }*/
				   if(($luggage_row['luggage_to']==$_POST['route_to'] && $luggage_row['luggage_paymethod']=='To Pay')  ||  ($luggage_row['luggage_from']==$_POST['route_to'] && $luggage_row['luggage_paymethod']=='Paid') ){
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
                        
                         <?php 
				  $paid_com="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				              $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$_POST['route_to']));
							 $delivery_route_paid = ($paid_com2[0]+$paid_com2[1]+$paid_com2[2])*$booking_route[10]/100;
							 $delivery_route_topay = ($paid_com6[0]+$paid_com6[1]+$paid_com6[2])*$booking_route[9]/100;
							 $delivery_route_credit =($paid_com9[0]+$paid_com9[1]+$paid_com9[2])* $booking_route[11]/100;
							 $delivery_commission =  $delivery_route_paid+$delivery_route_topay+$delivery_route_credit;
							 
							 /*********************************************************************************************************/
							 
							 $paid_com="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),sum(luggage_doorcharges),sum(tax) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				             $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$_POST['route_to']));
							 $booking_route_paid = ($paid_com2[0]+$paid_com2[1]+$paid_com2[2])*$booking_route[6]/100;
							 $booking_route_topay = ($paid_com6[0]+$paid_com6[1]+$paid_com6[2])*$booking_route[7]/100;
							 $booking_route_credit =($paid_com9[0]+$paid_com9[1]+$paid_com9[2])* $booking_route[8]/100;
							 $booking_commission =  $booking_route_paid+$booking_route_topay+$booking_route_credit;
							 
							 /*********************************************************************************************************/
							 
							 
							 $exp = "select * from power_expenses where route_id = ".$_POST['route_to']." and   create_date between  '".$frmdate."' and '".$todate."'";
				   $exp1 =  mysqli_query($objConn,$exp);
				   $ssno = 5; $totexp=0;
				   while($exp2 = mysqli_fetch_array($exp1))
				   {
				   $totexp +=$exp2['amount'];
				   }
				   $total_credit = $topay_delivery +$gt5; 
				   $total_debit = $totexp +$delivery_commission +$booking_commission; 
				   $total_credit_debit  = $total_credit - $total_debit;
				   
				   
				   
				   
				    /*********************************************************************************************************/
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   
					   $tax_topay = ($summary2['luggage_fees']+$summary2['luggage_charges']+$summary2['luggage_doorcharges']+$summary2['unloading_charges'])*5/100;
					   $totamt +=($summary2['luggage_fees']+$summary2['luggage_charges']+$summary2['luggage_doorcharges']+$summary2['unloading_charges']);
					   $totamt +=$tax_topay;
					   
				   }
					
					
				   $topay_delivery = $totamt; 
				   
				    /*********************************************************************************************************/
				   
				   
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select luggage_fees,luggage_charges,luggage_doorcharges,luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   $totamt +=($summary2[0]+$summary2[1]+$summary2[2]);
					    $gt1 = $gt1 +$totamt; $summary6 =0;$totamt=0;
				   }
				   
				    /*********************************************************************************************************/
				    $summary6 =0;$totamt1=0;$flag=0;
				   $summary="select luggage_fees,luggage_charges,luggage_doorcharges,luggage_to,luggage_lrno,unloading_charges from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   $tax_paid  = ($summary2[0]+$summary2[1]+$summary2[2]+$summary2[5])*5/100;
					   $totamt1 +=($summary2[0]+$summary2[1]+$summary2[2]+$summary2[5]);
					   $gt5 = $gt5 +$totamt1 +$tax_paid;
					   $summary6 =0;$totamt1=0;
				   }
				    /*********************************************************************************************************/
				   $summary6 =0;$totamt2=0;$flag=0;
				   $summary="select luggage_fees,luggage_charges,luggage_doorcharges,luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_row($summary1))
				   {
					   $totamt2 +=($summary2[0]+$summary2[1]+$summary2[2]);;
					   
					   $gt6 = $gt6 +$totamt2; $summary6 =0;$totamt2=0;
				   }
				   
				    /*********************************************************************************************************/
				   ?>
                        
                        
						<tr><td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Booking Paid : 
                        <?php 
						
						 echo $paid_total_purpose; ?></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Booking Topay : 
						<?php 
						
						  echo number_format($topay_total_purpose,2);
						 ?></strong></td>
                        </tr>
                         <?php /*<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php 
						echo $credit_total_purpose;?></strong></td>
                        </tr>*/?>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Sales Amount : 
						<?php echo $tot_amt_total_purpose =$paid_total_purpose +$topay_total_purpose+$credit_total_purpose;?></strong></td>
                        </tr>
                        
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Delivery : 
						<?php  
						
					echo number_format($topay_delivery,2);
						?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Booking Paid : 
						<?php
				   echo number_format($gt5,2);
						?></strong></td>
                        </tr>
                        
                        
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Delivery  Commission :
                        <?php 
						echo $tot_agent_amt;?></strong></td>
                        </tr>
						
						<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Invoice Amount :
                        <?php 
						$tot_ho_amt = $topay_delivery +$gt5-$tot_agent_amt;
						echo $tot_ho_amt;
						?></strong><input type="hidden" name="total_ho_amount" id="total_ho_amount"  value="<?php echo $tot_ho_amt?>"></td>
                        </tr>
						<!--<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><input type="text" name="debit1">
                       &nbsp;&nbsp;<input type="text" name="debit1_amount" id="debit1_amount" onKeyUp="return bal_calc()" value="0"></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><input type="text" name="debit2">
                       &nbsp;&nbsp;<input type="text" name="debit2_amount" id="debit2_amount" onKeyUp="return bal_calc()" value="0"></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><input type="text" name="debit3">
                       &nbsp;&nbsp;<input type="text" name="debit3_amount" id="debit3_amount" onKeyUp="return bal_calc()" value="0"></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><input type="text" name="debit4">
                       &nbsp;&nbsp;<input type="text" name="debit4_amount" id="debit4_amount" onKeyUp="return bal_calc()"  value="0"></strong></td>
                        </tr>
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong><input type="text" name="debit5">
                       &nbsp;&nbsp;<input type="text" name="debit5_amount" id="debit5_amount" onKeyUp="return bal_calc()" value="0"</strong></td>
                        </tr>-->
					<tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>
                       &nbsp;&nbsp;<input type="hidden" name="balance_payable" id="balance_payable" readonly value="<?php echo $tot_ho_amt?>"></strong></td>
                        </tr>
						</tbody>
						</table>
				  <?php ?>
				 <?php /*?>  else
				   {
					   $routewise = "select * from power_route where id in (select luggage_to from power_luggage)";
				  $routewise1 = mysqli_query($objConn,$routewise);
				   $routewise2 = mysql_num_rows($routewise1);
				  if($routewise2>0)
				  {
					while($routewise3 = mysql_fetch_array($routewise1))
					{
						//echo "select * from power_luggage where  luggage_to = ".$routewise3[0]."  and create_date between  '".$frmdate."' and '".$todate."'";
						$luggage=mysqli_query($objConn,"select * from power_luggage where  (luggage_to = ".$routewise3[0]." or luggage_from = ".$routewise3[0].")  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysql_num_rows($luggage);
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
				   while($luggage_row=mysql_fetch_array($luggage))
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
							$luggage_prd_rows = mysql_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysql_fetch_array($luggage_prd1))
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
							$luggage_prd_rows = mysql_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysql_fetch_array($luggage_prd1))
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
					<?php /*?><br><br>
				   <table class="display" width="99%">
                   <tr>
                   <td  width="33%"  style="vertical-align:top;">
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%">
                   <thead>
                   <tr>
                   <th colspan="4"><?php 
				   $routename = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$_POST['route_to']));
							 $routename1 = $routename[0];
				   echo $routename1?> Delivery</th></tr>
                   </thead>
                   <thead>
                   
                   
                   
                   
                   <tr>
                   <th>Payment Type</th><th>Qty</th><th>Amount</th></tr></thead>
                   <tr>
                   <td align="center"><strong>Credit</strong></td><td align="center">
                   <?php 
				   $summary6 =0;$totamt=0;
				    $summary="select * from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					   $summary3 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno = '".$summary2['luggage_lrno']."'";
					   $summary4 = mysqli_query($objConn,$summary3);
					   $summary5 = mysqli_fetch_row($summary4);
					   $summary6 +=$summary5[0];
				   }
					echo   $summary6; 
					$qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?>
                   
                   </td><td  align="right"><?php echo $totamt;?></td></tr>
                   <tr>
                   <td align="center"><strong>Paid</strong></td><td align="center"> <?php 
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					   $summary3 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno = '".$summary2['luggage_lrno']."'";
					   $summary4 = mysqli_query($objConn,$summary3);
					   $summary5 = mysqli_fetch_row($summary4);
					   $summary6 +=$summary5[0];
				   }
					echo   $summary6; 
					$qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?></td><td  align="right"><?php echo $totamt;?></td></tr>
                   <tr>
                   <td align="center"><strong>Topay</strong></td><td align="center"><?php 
				   $summary6 =0;$totamt=0;
				   $summary="select * from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $summary1 = mysqli_query($objConn,$summary);
				   while($summary2 = mysqli_fetch_array($summary1))
				   {
					   $totamt +=$summary2['luggage_fees'];
					   $summary3 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno = '".$summary2['luggage_lrno']."'";
					   $summary4 = mysqli_query($objConn,$summary3);
					   $summary5 = mysqli_fetch_row($summary4);
					   $summary6 +=$summary5[0];
				   }
					echo   $summary6; 
					 $qt = $qt+$summary6;
				   $gt = $gt+$totamt;
				   ?></td><td  align="right"><?php echo $totamt; $topay_delivery = $totamt; ?></td></tr>
                   
                   
                   
                   <thead> <th >Grand Total</th><th><?php echo $qt;?></th><th align="right"><?php echo $gt;?></th></tr></thead>
                   
                   
                   
                   
                   
                   
                   
                   </table>
                   </td>
                    <td  width="33%"  style="vertical-align:top;">
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%"><thead>
                   <tr>
                   <th  colspan="4"><?php echo $routename1?> Booking</th></tr></thead>
                   <thead>
                   <tr>
                   <th>Payment Type</th><th>To Location</th><th>Qty</th><th>Amount</th></tr></thead>
                   
                   <?php 
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'  group by luggage_to";
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
					 
					   $take_qty = "select * from power_luggage where luggage_from = ".$_POST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'  and  luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						   $take_qty4 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno ='".$take_qty2['luggage_lrno']."'";
						   $take_qty5 = mysqli_query($objConn,$take_qty4);
						   $take_qty6 = mysqli_fetch_row($take_qty5);
						   $summary6 +=$take_qty6[0];
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
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'  group by luggage_to";
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
					    $take_qty = "select * from power_luggage where  luggage_from = ".$_POST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and  luggage_paymethod = 'To Pay'  and luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						   $take_qty4 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno ='".$take_qty2['luggage_lrno']."'";
						   $take_qty5 = mysqli_query($objConn,$take_qty4);
						   $take_qty6 = mysqli_fetch_row($take_qty5);
						   $summary6 +=$take_qty6[0];
						   }echo   $summary6;  $qt2 = $qt2+$summary6;
					   ?></td><td  align="right"><?php echo $totamt;?></td></tr><?php $gt1 = $gt1 +$totamt; $summary6 =0;$totamt=0;
				   }
					
				   
				   ?>
                  
                   <thead> <th colspan="2">Grand Total</th><th><?php echo $qt2;?></th><th  align="right"><?php echo $gt1;?></th></tr></thead> <?php 
				   $summary6 =0;$totamt=0;$flag=0;
				   $summary="select sum(luggage_fees),luggage_to,luggage_lrno from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'  group by luggage_to";
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
					    $take_qty = "select * from power_luggage where  luggage_from = ".$_POST['route_to']." and create_date between  '".$frmdate."' and '".$todate."' and  luggage_paymethod = 'Credit'  and luggage_to =".$summary2[1];
					   $take_qty1 = mysqli_query($objConn,$take_qty);
					   while($take_qty2 = mysqli_fetch_array($take_qty1))
					   {
						   $take_qty4 = "select sum(luggage_qunty) from  power_luggage_prd where luggage_lrno ='".$take_qty2['luggage_lrno']."'";
						   $take_qty5 = mysqli_query($objConn,$take_qty4);
						   $take_qty6 = mysqli_fetch_row($take_qty5);
						   $summary6 +=$take_qty6[0];
						   }echo   $summary6;  $qt6 = $qt6+$summary6;
					   ?></td><td  align="right"><?php echo $totamt;?></td></tr><?php $gt6 = $gt6 +$totamt; $summary6 =0;$totamt=0;
				   }
					
				   
				   ?>
                   <thead> <th colspan="2">Grand Total</th><th><?php echo $qt6;?></th><th  align="right"><?php echo $gt6;?></th></tr></thead>
                   </table>
                   </td>
                    <td width="33%"  style="vertical-align:top;">
                   <table class="display"  border="1" cellpadding="0" cellspacing="0" width="100%"><thead>
                   <tr>
                   <th colspan="4"><?php echo $routename1?> Accounts</th></tr><thead>
                   <thead>
                   <tr>
                   <th>S.No</th><th>Particulars</th><th>KMP A/C</th><th>Agent A/C</th></tr></thead>
                   <tr>
                   <td>1.</td><td>To Pay Dly</td><td align="right"><?php echo $topay_delivery;?></td><td></td></tr>
                   <tr>
                   <td>2.</td><td>Paid Booking</td><td align="right"><?php echo $gt5;?></td><td></td></tr>
                    <tr>
                   <td>3.</td><td>Booking Commission</td><td></td><td align="right">
                   <?php  $paid_com="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				    $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$_POST['route_to']));
							 $booking_route_paid = $paid_com2[0]*$booking_route[6]/100;
							 $booking_route_topay = $paid_com6[0]*$booking_route[7]/100;
							 $booking_route_credit =$paid_com9[0]* $booking_route[8]/100;
							echo $booking_commission =  $booking_route_paid+$booking_route_topay+$booking_route_credit;
							 
				   ?>
                   
                   
                   
                   </td></tr>
                    <tr>
                   <td>4.</td><td>Delivery Commission</td><td></td><td align="right">
                   
                   <?php 
				  $paid_com="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$_POST['route_to'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				              $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$_POST['route_to']));
							 $delivery_route_paid = $paid_com2[0]*$booking_route[10]/100;
							 $delivery_route_topay = $paid_com6[0]*$booking_route[9]/100;
							 $delivery_route_credit =$paid_com9[0]* $booking_route[11]/100;
							echo $delivery_commission =  $delivery_route_paid+$delivery_route_topay+$delivery_route_credit;
				   
				   ?>
                   </td></tr>
                   <?php  $exp = "select * from power_expenses where route_id = ".$_POST['route_to']." and   create_date between  '".$frmdate."' and '".$todate."'";
				   $exp1 =  mysqli_query($objConn,$exp);
				   $ssno = 5; $totexp=0;
				   while($exp2 = mysqli_fetch_array($exp1))
				   {
				   ?>
                    <tr><td><?php echo $ssno;?>.</td><td><?php echo $exp2['particulars']; ?></td><td></td><td align="right"><?php echo $exp2['amount']; ?> </td></tr>
                   <?php  $ssno++;
				   $totexp +=$exp2['amount'];
				   
				   }?>
                   <tr><td></td><td></td><td align="right"><strong><?php echo $total_credit = $topay_delivery +$gt5;  ?></strong></td><td align="right"><strong><?php echo $total_debit = $totexp +$delivery_commission +$booking_commission; ; ?></strong> </td></tr>
                    <tr><td></td><td><strong>Closing Balance</strong></td><td align="right"><strong><?php echo $total_credit_debit  = $total_credit - $total_debit;  ?></strong></td><td align="right"></td></tr>
                    
                   </table>
                   
                   </td>
                   </tr>
                   
                   
                   
                   
                   </table><?php */?>
                   
                 
                   <input type="hidden" name="invoice_qty" value="<?php echo $qt2+$qt3+$qt6;?>">
                   <input type="hidden" name="invoice_amount" value="<?php echo  $tot_amt_total_purpose;?>">
                   <input type="hidden" name="topay_delivery" value="<?php echo $topay_delivery?>">
                   <input type="hidden" name="paid_booking" value="<?php echo $gt5?>">
                   <input type="hidden" name="commission_booking" value="<?php echo $booking_commission?>">
                    <input type="hidden" name="commission_delivery" value="<?php echo $delivery_commission?>">
                    <input type="hidden" name="closing_balance" value="<?php echo $total_credit_debit ?>">
                   
                   <?php }?>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span><div align="center" class="no-print"><input type="submit"  name="invoice_confirm" value="INVOICE - CONFIRM"  style="width:220px; font-size:18px; height:40px; background-color:#CF6;"></div>
        
        
	</div></form>
</div>
</body>
</html>