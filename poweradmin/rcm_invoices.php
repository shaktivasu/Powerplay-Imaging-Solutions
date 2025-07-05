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
	$max2 = $max4+1220;
	$max3 = 'KMP'.$max2;
if(isset($_POST['invoice_confirm']))
{
	
	$max1= mysqli_query($objConn,"select * from power_rcm_invoices");
	$max4 = mysqli_num_rows($max1);
	$max2 = $max4+1220;
	$max3 = 'KMP'.$max2;
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
						<h6>INVOICE - Credit Customers </h6>
                        
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
        <td height="26" align="right" class="label_txt"></td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="SEARCH" onClick="return val();"></td>
        <td align="center" class="label_txt"></td>
      </tr>
     
      <tr>
       <td colspan="5"></td>
      </tr>
      
    </table></div>
	
    

								
							
                    
                    
                    
	
						
					</div>
                    
                    <br>
					<br>

                    
					<div class="widget_content">
                  <?php 
				   //$routewise = "select * from power_route where id in (select luggage_to from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."' $vecstr".")";
				  
					//Maximum of News & Events
					
                    $luggage=mysqli_query($objConn,"select * from power_rcm_invoices where  invoice_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num!=0)
					{
						$heading_tag = mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit where id = ".$_POST['route_to']));
							 $heading_tag1 = $heading_tag['credit'];
                    ?><?php /*?><h2> Accounts</h2><br><br><?php */?>
                    <div class="printbreak">
                    
					   <table class="display" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
							<th>Sl No</th>
							<th >Invoice Date</th>
                            <th >Invoice ID</th>
                            <th >Credit Client</th>
                            <th>Total Qty</th>
							<th >From</th>
							<th>To</th>
							<th>Invoice Amount</th>
							<th>Print</th>
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
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['invoice_date']));?></td>
                            <td align="center"><?php echo $luggage_row['invoice_id']; ?></td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select credit,credit_type from power_credit where id = ".$luggage_row['credit_id']));
							echo $routefrom1 = $routefrom[0];
							?></td>
							
							<td align="center"><?php echo $luggage_row['invoice_qty']?></td>
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['invoice_from']));?></td>
							
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['invoice_to']));?></td>
							<td align="center"><?php echo number_format($luggage_row['invoice_amount'],2)?></td>
                            <td align="center"><?php if($routefrom[1]==0) {?><a href="reports_print.php?id=<?php echo $luggage_row['id']?>&frmdate=<?php echo $luggage_row['invoice_from']?>&todate=<?php echo $luggage_row['invoice_to']?>&route_to=<?php echo $luggage_row['credit_id']?>&printpreview=yes" target="_blank"><img src="images/printer.png"></a><?php }else
							{?>
							<a href="reports_print_shakthi.php?id=<?php echo $luggage_row['id']?>&frmdate=<?php echo $luggage_row['invoice_from']?>&todate=<?php echo $luggage_row['invoice_to']?>&route_to=<?php echo $luggage_row['credit_id']?>&printpreview=yes" target="_blank"><img src="images/printer.png"></a>
							<?php
							}?></td>
							
						</tr>
                        
						<?php $i++;
						} } ?>
						
					
						</tbody>
						</table>
				  
					</div>
                   
                   
                   
                         
                    
                
			
                   
                   
                   
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
		
	</div></form>
</div>
</body>
</html>
