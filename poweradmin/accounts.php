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
			
			
			
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon folder"></span>
						<h6>Accounts</h6>
                        
					</div>
					<div class="widget_content">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="pay_title">Date Search 
      
      
      </div><br>
      
      <form name="frm" id="frm" method="post" action=""><div class="arrow_box">
      
        <table width="100%" border="0" class="arrow_box_content top_arrow">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="11%">&nbsp;</td>
            <td width="15%" class="label_txt">From</td>
            <td width="16%" class="label_txt" style="text-transform:uppercase;"><script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
            <td width="16%">&nbsp;</td>
            <td width="20%" class="label_txt">To Date :</td>
            <td width="11%"><script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script></td>
            <td width="11%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
      </div>
      </form></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<?php //if($_REQUEST['Submit'])
//{?>

						<table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							
							<th width="10%">Route</th>
							<th width="8%">Paid Amount</th>
							<th width="6%">To Pay Amount</th>
							
							<th width="6%">Total</th>
							<th width="6%">Agent Commision</th>
                            
                             <th width="6%">Net Amt</th>
							<th width="6%">Collection Amount</th>
							<th width="6%">Pending Amount</th>
							<th width="6%">View Details</th>
							
						</tr>
						</thead>
						<tbody>
                       <?php
					
					$luggage=mysqli_query($objConn,"select * from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."' group by luggage_from ") or die("Accounts error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="8" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $totalamt = 0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
							<td align="center"><?php echo $i."."; ?></td>
                            
							
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center">
							<?php 
							//echo "select sum(luggage_fees),sum(luggage_charges) from power_luggage where luggage_paymethod='Paid' and create_date>='".$_REQUEST['frmdate']."' and create_date<='".$todate."' and luggage_from = ".$luggage_row['luggage_from'];
							$paymode = mysqli_fetch_row(mysqli_query($objConn,"select sum(luggage_fees),sum(luggage_charges) from power_luggage where luggage_paymethod='Paid' and  luggage_status<>'Cancelled'  and create_date>='".$frmdate."' and create_date<='".$todate."' and luggage_from = ".$luggage_row['luggage_from']));
							//$paidfees = $paymode[0]+$paymode[1];
							$paidfees = $paymode[0]+$paymode[1];
							$totalamt += $paidfees;
							if($paidfees=='') echo "-"; else echo $paidfees;
							?></td>
							<td align="center"><?php 
							$paymode = mysqli_fetch_row(mysqli_query($objConn,"select  sum(luggage_fees),sum(luggage_charges) from power_luggage where luggage_paymethod='To Pay' and  luggage_status<>'Cancelled'  and create_date>='".$frmdate."' and create_date<='".$todate."'  and luggage_to = ".$luggage_row['luggage_from']));
							//$topayfees = $paymode[0]+$paymode[1];
							$topayfees = $paymode[0]+$paymode[1];
							$totalamt += $topayfees;
							if($topayfees=='') echo "-"; else echo $topayfees;
							?></td>
							
							<td align="center"><?php echo $totalamt;?></td>
							<td align="center"><?php $paid_com="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees) from power_luggage where  (luggage_from = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				    $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$luggage_row['luggage_from']));
							 $booking_route_paid = $paid_com2[0]*$booking_route[6]/100;
							 $booking_route_topay = $paid_com6[0]*$booking_route[7]/100;
							 $booking_route_credit =$paid_com9[0]* $booking_route[8]/100;
						 $booking_commission =  $booking_route_paid+$booking_route_topay+$booking_route_credit;
						 
						 $paid_com="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Paid'";
				   $paid_com1= mysqli_query($objConn,$paid_com);
				   $paid_com2= mysqli_fetch_row($paid_com1);
				  
				   
				   $paid_com4="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'To Pay'";
				   $paid_com5= mysqli_query($objConn,$paid_com4);
				   $paid_com6= mysqli_fetch_row($paid_com5);
				   
				   
				   $paid_com7="select sum(luggage_fees) from power_luggage where  (luggage_to = ".$luggage_row['luggage_from'].")  and create_date between  '".$frmdate."' and '".$todate."' and luggage_paymethod = 'Credit'";
				   $paid_com8= mysqli_query($objConn,$paid_com7);
				   $paid_com9= mysqli_fetch_row($paid_com8);
				   
				   
				   
				    $booking_route = mysqli_fetch_row(mysqli_query($objConn,"select * from power_route where id = ".$luggage_row['luggage_from']));
							 $delivery_route_paid = $paid_com2[0]*$booking_route[10]/100;
							 $delivery_route_topay = $paid_com6[0]*$booking_route[9]/100;
							 $delivery_route_credit =$paid_com9[0]* $booking_route[11]/100;
							 $delivery_commission =  $delivery_route_paid+$delivery_route_topay+$delivery_route_credit;
						 
						echo  $agent_commission =  $delivery_commission +$booking_commission;
						 
						 
						 ?></td>
                           
                            <td align="center"><?php echo $net_amt = $totalamt - $agent_commission?></td>
							<td align="center"><?php 
							$collection_amt = mysqli_fetch_row(mysqli_query($objConn,"select sum(collection_amount) from power_collections where collection_status=0  and collection_date>='".$frmdate."' and collection_date<='".$todate."'  and  route_id = ".$luggage_row['luggage_from']));
							echo $collection_amt1 = $collection_amt[0];
							?></td>
							<td align="center"><?php echo $totalamt1 = $net_amt - $collection_amt1;?></td>
							<td align="center"><a href="accounts_details.php?route=<?php echo $luggage_row['luggage_from']?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $todate?>">
                            <img src="images/btn_view.gif" width="50" height="16"></a>
                            </td>
							
						</tr>
						<?php $totalamt = 0; $i++;} }?>
                        
                        
                      
						</thead>
                        </tbody>
                       
                       
						</table><?php //}?>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>