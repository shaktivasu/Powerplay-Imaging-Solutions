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
						<span class="h_icon blocks_images"></span>
						<h6>Accounts </h6>
					</div>
					<!--<div class="widget_content">-->
                     <div align="right"><div class="btn_40_blue ucase">
								<a href="accounts.php?frmdate=<?php echo $_REQUEST['frmdate']?>&todate=<?php echo $_REQUEST['todate']?>"><span>Back</span></a>
							</div></div>
						
						<br>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="pay_title">Route Wise Search 
    
    
    [<?php
    $routename = mysqli_query($objConn,"select route from power_route where id = ".$_REQUEST['route']);
	$routename1 = mysqli_fetch_row($routename);
	echo "<font color=red>".$routename1[0]."</font>";
	
	?>]</div><br>

    <form name="frm" id="frm" method="post" action="">
    <table width="80%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      
      <tr>
        <td width="233" height="26" align="right" class="label_txt">From Date :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date : </td>
        <td width="257" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt"><input type="hidden" name="route" value="<?php echo $_REQUEST['route']?>"><input type="submit" name="Submit" value="Search"></td>
      </tr>
      
      <tr>
        <td width="233" height="26" align="right" class="label_txt"></td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td width="161" align="right" class="label_txt">&nbsp;</td>
        <td width="257" align="center" class="label_txt">&nbsp;</td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table>
	</form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php echo  "<br><br><div class=menu_color_red><font color=red>Topay Amount</font></div><br><br>";?>
						<table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							
							<th width="10%">LR NO.</th>
							<th width="8%">Date</th>
							<th width="8%">From Location</th>
							<th width="8%">To Location</th>
							<th width="8%">Payment Method</th>
							
							<th width="6%">Luggage Charges</th>
							<th width="6%">Invoice Amount</th>
							<th width="6%">Total Amount</th>
							<th width="6%">Status</th>
							
							
						</tr>
						</thead>
						<tbody>
                          <?php
					
                    
					 $luggage=mysqli_query($objConn,"select * from power_luggage where    create_date>='".$_REQUEST['frmdate']."' and create_date<='".$_REQUEST['todate']."' and luggage_to = ".$_REQUEST['route']." and luggage_paymethod='To Pay'  ") or die("Accounts error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="17" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
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
                            
							
							<td align="center"><?php echo $luggage_row['luggage_lrno'];?>
							</td>
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center"><?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_paymethod'];?></td>
							
							<td align="center"><?php echo $luggage_row['luggage_charges'];?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees'];?></td>
							<td align="center"><?php echo $totalamt =$luggage_row['luggage_charges']+$luggage_row['luggage_fees'];?></td>
                            <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center"  <?php echo $cls;?>><?php echo $luggage_row['luggage_status'];?></td>
							
							
						</tr>
						<?php 
						if($luggage_row['luggage_status']!='Cancelled')
						$invocice_amt += $totalamt;
						$total_amt += $totalamt;
						
						
						 $i++;} }?>
                      
						
                       <tr>
							
							<th width="6%" height="50" colspan="7" align="right"><font color="red" style="font-size:22px">Total Frieght Charges</font></th>
							<th width="6%">&nbsp;</th>
							<th width="6%"><font color="red" style="font-size:22px"><?php echo $invocice_amt;?></font></th>
							
						</tr></thead>
                        </tbody>
                                             
						</table>
                        
                        
                        
                        <?php echo  "<div class=menu_color_red><font color=red>Paid Amount</font></div><br><br>";?>
						<table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							
							<th width="10%">LR NO.</th>
							<th width="8%">Date</th>
							<th width="8%">From Location</th>
							<th width="8%">To Location</th>
							<th width="8%">Payment Method</th>
							
							<th width="6%">Luggage Charges</th>
							<th width="6%">Invoice Amount</th>
							<th width="6%">Total Amount</th>
							<th width="6%">Status</th>
							
							
						</tr>
						</thead>
						<tbody>
                          <?php
					
                    $total_amt =0;$invocice_amt =0;
					 $luggage=mysqli_query($objConn,"select * from power_luggage where    create_date>='".$_REQUEST['frmdate']."' and create_date<='".$_REQUEST['todate']."' and luggage_from = ".$_REQUEST['route']." and luggage_paymethod='Paid'  ") or die("Accounts error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="17" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
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
                            
							
							<td align="center"><?php echo $luggage_row['luggage_lrno'];?>
							</td>
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center"><?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_paymethod'];?></td>
							
							<td align="center"><?php echo $luggage_row['luggage_charges'];?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees'];?></td>
							<td align="center"><?php echo $totalamt =$luggage_row['luggage_charges']+$luggage_row['luggage_fees'];?></td>
                            <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center"  <?php echo $cls;?>><?php echo $luggage_row['luggage_status'];?></td>
							
							
						</tr>
						<?php 
						if($luggage_row['luggage_status']!='Cancelled')
						$invocice_amt += $totalamt;
						$total_amt += $totalamt;
						
						
						 $i++;} }?>
                      
						
                       <tr>
							
							<th width="6%" height="50" colspan="7" align="right"><font color="red" style="font-size:22px">Total Frieght Charges</font></th>
							<th width="6%">&nbsp;</th>
							<th width="6%"><font color="red" style="font-size:22px"><?php echo $invocice_amt;?></font></th>
							
						</tr></thead>
                        </tbody>
                                             
						</table>
				<!--	</div>-->
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>