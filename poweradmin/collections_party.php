<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if($_REQUEST['news']=="del")
{
$id=$_GET['event_id'];
$del_news=mysqli_query($objConn,"delete from power_collections_credit  where id=".$id."") or die("Delete Collection Error:".mysql_error());
header("location:collections_party.php?msg=3");
}
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_POST['frmdate']))
{
$frmdate = $_POST['frmdate'];
}
if(isset($_POST['todate']))
{
$todate = $_POST['todate'];
}
$routestr='';
if(isset($_POST['Submit']) && $_POST['route_from'] <> 0)
$routestr=" route_id='".$_POST['route_from']."' and "; 
//echo "select * from power_collections_credit where $routestr collection_date>='".$_POST['frmdate']."' and collection_date<='".$_POST['todate']."'";

if($_POST['Submit'])
	 $news_events_flow=mysqli_query($objConn,"select * from power_collections_credit where $routestr collection_date>='".$_POST['frmdate']."' and collection_date<='".$_POST['todate']."'") or die("Collection error:".mysql_error());
else
 	 $news_events_flow=mysqli_query($objConn,"select * from power_collections_credit where $routestr collection_date>='".date('Y-m-d')."' and collection_date<='".date('Y-m-d')."'") or die("Collection error:".mysql_error());
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
						<span class="h_icon documents"></span>
						<h6>Collections Management</h6> 
                        <div class="add_new"><h6><a href="collections_party_new.php">Addnew</a></h6></div>
					</div>
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
        <td height="26" align="right" class="label_txt">Party  Wise:</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><span class="label_txt" style="text-transform:uppercase;"><span class="form_input">
          <select name="route_from" class="limiterBox">
            <option value="0">Select All</option>
            <?php 
										$route = mysqli_query($objConn,"select * from power_credit order by credit");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_POST['route_from']==$route1['id'])
											echo "<option value=".$route1['id']." selected>".$route1['credit']."</option>";
											else
											echo "<option value=".$route1['id'].">".$route1['credit']."</option>";
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
						<table class="display">
						<thead>
						<tr>
							<th width="3%">
								 Sl No
							</th>
							<th width="23%">Party Name</th>
							<th width="13%">Credit Amount</th>
							<th width="13%">Collection Amount</th>
							<th width="16%">Pending Amount</th>
							<th width="16%">Collection Status</th>
							<th width="25%">Create Date</th>
							<th width="20%">
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php
					//Maximum of News & Events
					
                   
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="12" align="center" valign="middle" bgcolor="#F9C6F1">No Collections.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_row($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?>
							  
						    </td>
							<td align="center">
							<?php $route_name = mysqli_fetch_row(mysqli_query($objConn,"select credit from power_credit where id=".$news_events_flow_row[1]));
								  echo $route_name[0];
							?></td>
							<td class="center"><?php 
							$subtot = 0;
							$pending_amt = mysqli_query($objConn,"select luggage_fees,luggage_charges ,luggage_doorcharges from power_luggage where luggage_sender_id =".$news_events_flow_row[1]);
							while($pending_amt1 = mysqli_fetch_row($pending_amt))
							{
								  $subtot += $pending_amt1[0]+$pending_amt1[1]+$pending_amt1[2];
							}
							echo $subtot;
							?></td>
							<td class="center">
							<?php 
							$subtot1 = 0;
							$pending_amt = mysqli_query($objConn,"select collection_amount from power_collections_credit where route_id =".$news_events_flow_row[1]);
							while($pending_amt1 = mysqli_fetch_row($pending_amt))
							{
								  $subtot1= $pending_amt1[0];
							}
							echo $subtot1;
							?></td>
							<td class="center"><?php echo $grand_tot = $subtot - $subtot1;?></td>
							<td class="center"><?php 
							if($news_events_flow_row[3]==0) echo "<img src=images/details_open.png>";
							else echo "<img src=images/details_close.png>";
							
							
							?></td>
							<td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row[4]));?></td>
							<td class="center">
							<span>
                           <a href="collections_party_edit.php?id=<?php echo $news_events_flow_row[0]; ?>" title="Edit"><img src="images/edit.png"/></a></span>
                            <span><a  href="collections_party.php?news=del&amp;event_id=<?php echo $news_events_flow_row[0];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span>
							</td>
						</tr>
						
						<?php 
					$i++;
					}
					}
					$i--;
					 ?>    
						</tbody>
						</table>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>