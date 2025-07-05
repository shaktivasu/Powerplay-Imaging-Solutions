<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if($_REQUEST['news']=="del")
{
$id=$_GET['id'];
$del_news=mysqli_query($objConn,"update power_route set route_status = 1  where id=".$id."") or die("Delete News Error:".mysql_error());
header("location:route.php?msg=3");
}

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
			
			
			
			<div class="grid_12"  style="width:100%;">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon money"></span>
						<h6>Inactive Customers</h6>
                        <div class="add_new"><h6><a href="route_new.php">Add New</a></h6></div>
					</div>
					<div class="widget_content">
						<table class="display">
						<thead>
						<tr>
							<th >
								 Sl No
							</th>
                            
							<th>Customer Name</th>
							<th>Username</th>
							<th>Password</th>
                            <th>Company Name</th>
							<th>Contact.No</th>
							<?php /*?><th>Address</th>
							
							<th>Paid(Booking Commn)</th>
							<th>To Pay(Booking Commn)</th>
							<th>Credit(Booking Commn)</th>
                            <th>Paid(Delivery Commn)</th>
							<th>To Pay(Delivery Commn)</th>
							<th>Credit(Delivery Commn)</th><?php */?>
							<th>Cutomer Status</th>
							<th>Create Date</th>
							<th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php
					//Maximum of News & Events
					
                    $news_events_flow=mysqli_query($objConn,"select * from power_route where route_status = 1 order by route") or die("Vehicle error:".mysql_error());
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="16" align="center" valign="middle" bgcolor="#F9C6F1">No Customers.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $max="select max(id) from power_route order by route";
			      $max1=mysqli_query($objConn,$max);
			      $max2=mysqli_fetch_row($max1);
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?>
							  
						    </td>
                            
                           
							<td class="center"><?php echo $news_events_flow_row['route_contact'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_username'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_password'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_phone'];?></td>
							<?php /*?>
							<td class="center"><?php echo $news_events_flow_row['route_comission_paid'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_comission_topay'];?></td>
                            <td class="center"><?php echo $news_events_flow_row['route_comission_credit'];?></td>
                            <td class="center"><?php echo $news_events_flow_row['route_delivery_paid'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_delivery_topay'];?></td>
							<td class="center"><?php echo $news_events_flow_row['route_delivery_credit'];?></td><?php */?>
							<td class="center"><?php 
							if($news_events_flow_row['route_status']==0) echo "<img src=images/details_open.png>";
							else echo "<img src=images/details_close.png>";
							
							
							?></td>
							<td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row['create_date']));?></td>
							<td class="center">
							<span>
                           <a href="route_edit.php?id=<?php echo $news_events_flow_row['id']; ?>"  title="Edit"><img src="images/edit.png"/></a></span>
                            <span><a href="route.php?news=del&amp;id=<?php echo $news_events_flow_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span>
							</td>
						</tr>
						
						<?php 
					$i++;
					}
					}
					$i--;
					 ?>   
					
					
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>