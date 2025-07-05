<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
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
			<div id="top_notification">
				<div class="time"><script type="text/javascript">
document.write ('<span id="date-time">', new Date().toLocaleString(), '<\/span>.')
if (document.getElementById) onload = function () {
	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
}
</script>			</div>
			</div>
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
						<span class="h_icon truck"></span>
						<h6>User Management</h6>
                        <div class="add_new"><h6><a href="user_new.php">Add New</a></h6></div>
					</div>
					<div class="widget_content">
						<table class="display">
						<thead>
						<tr>
							<th width="5%">
								 Sl No
							</th><th width="20%" align="left">User Route.</th>
							<th width="30%" align="left">User Name.</th>
							
                            
                          
                            <th width="15%">Password</th>
                             <th width="20%">User Privileges</th>
							 <th width="5%">Status</th>
							<th width="10%">Create Date</th>
							<th width="5%">
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php
					//Maximum of News & Events
					//echo "select * from shakthi_user  where ledger_type=".$_REQUERST['id'];
                    $news_events_flow=mysqli_query($objConn,"select * from power_user order by user_name") or die("ledger error:".mysql_error());
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="11" align="center" valign="middle" bgcolor="#F9C6F1">No Users.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $max="select max(id) from power_user  ";
			      $max1=mysqli_query($objConn,$max);
			      $max2=mysqli_fetch_row($max1);
				  $mxaaa = mysqli_num_rows($max1);
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i.".";
							
							
							 ?>
							  
						    </td><td align="left"><?php echo $news_events_flow_row['user_id'];
							
							?></td>
							<td align="left" ><?php echo $news_events_flow_row['user_name'];
							$routelist = "select route_id from shakthi_user_route where user_id=".$news_events_flow_row['id']; 
							$routelist1 = mysqli_query($link,$routelist);
							while($routelist2 = mysqli_fetch_row($routelist1))
							{
							$routename = mysqli_fetch_row(mysqli_query($link,"select route from shakthi_route where id = ".$routelist2[0].""));
							echo '<span style="font-weight:bold;color:#F00000"> [ '.$routename[0].' ]</span>';
							
                            }
							?>
                            </td>
                           
							<td align="left"><?php echo $news_events_flow_row['password'];
							
							?></td>
                            <td align="left"><?php 
							$rr=1;
							$user_route = "select * from power_user_route where user_id = ".$news_events_flow_row['id'];
							$user_route1=mysqli_query($objConn,$user_route);
							$user_route3=mysqli_num_rows($user_route1);
							while($user_route2=mysqli_fetch_array($user_route1))
							{
								
								$route_nme = mysqli_query($objConn,"select route from power_route where id = ".$user_route2['route_id']);
								$route_nme1=mysqli_fetch_row($route_nme);
								if($rr==$user_route3)
								echo $route_nme1[0];	
								else
								echo $route_nme1[0]." / ";
							$rr++;
							
							}
							?></td>
                             <td class="center"><?php 
							 if($news_events_flow_row['user_status']==0)
							 echo "Yes";
							 else
							 echo "No";
							 
							?></td>
                            
							<td class="center"><?php 
							 
							echo date('d-M-Y',strtotime($news_events_flow_row['create_date']));?></td>
							<td class="center">
							<span>
                           <a href="user_edit.php?id=<?php echo $news_events_flow_row['id']; ?>"   title="Edit"><img src="images/edit.png"/></a></span>
                            <span><a href="user.php?news=del&amp;event_id=<?php echo $news_events_flow_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span>
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