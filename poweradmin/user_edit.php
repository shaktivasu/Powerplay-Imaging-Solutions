<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$id=$_REQUEST['id'];
if(isset($id) && $id!='')
{
 $get_editable_news=mysqli_query($objConn,"select * from power_user  where id=".$id."") or die("edit News Error:".mysql_error());
$get_editable_news_row=mysqli_fetch_array($get_editable_news);
}

//Add News & Events
if(isset($_POST['signupsubmit']))
{
	 echo  $news_edit = "update power_user  set  user_name='".$_POST['user_name']."', password='".$_POST['password']."' ,user_status = '".$_POST['status']."'
	   where id=".$id."";
	$news_edit1 = mysqli_query($objConn,$news_edit);
	$del = "delete from power_user_route where user_id = ".$id;
	$del1 = mysqli_query($objConn,$del);
	$count=(isset($_POST['route']))?$_POST['route']:NULL; 
	$count1=count($count);
	for($i=0;$i<=$count1;$i++)
	{
		$ledger_route = "insert into power_user_route (user_id,route_id) values(".$id.",".$_POST['route'][$i].")";
		$ledger_route1 = mysqli_query($objConn,$ledger_route);
	}
	
	header('Location:user.php?id='.$_POST['ledger_type']);

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
						<span class="h_icon list"></span>
						<h6>Edit User</h6><a href="user.php">User Management</a>
					</div>
					<div class="widget_content">
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            
                               
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">User Name<span class="req">*</span></label>
									<div class="form_input">
										<input id="user_name" name="user_name" type="text" value="<?php echo $get_editable_news_row['user_name']?>" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">User pasword<span class="req">*</span></label>
									<div class="form_input">
                                    <input id="password" name="password" type="text"  maxlength="100" class="large" value="<?php echo $get_editable_news_row['password']?>"/></div>
								</div>
								</li> 
                                
                                
                                
                                
                                
                               
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Agent Privileges <span class="req">*</span></label>
									<div class="form_input">
										 <?php 
										$route="select * from power_route where route_status=0";
										$route1 = mysqli_query($objConn,$route);
										while($route2 = mysqli_fetch_array($route1))
										{
										$chk = "select * from power_user_route where route_id=".$route2['id']." and user_id=".$get_editable_news_row['id'];	
										$chk1 = mysqli_query($objConn,$chk);
										$chk2 = mysqli_num_rows($chk1);
										if($chk2 == 1)
										{
											?>
											<input name="route[]" id="route[]" type="checkbox" value="<?php echo $route2['id']?>" checked >&nbsp;<?php echo $route2['route']?>
										<?php  }
										else
										{?>
										<input name="route[]" id="route[]" type="checkbox" value="<?php echo $route2['id']?>" >&nbsp;<?php echo $route2['route']?>
										<?php
										}
										echo '<br>';
										}
										?>
									</div>
								</div>
								</li>
                               
                                
                                
                                 
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">User  Status.<span class="req">*</span></label>
									<div class="form_input">
                                   <input name="status" type="radio" id="status" value="0"  <?php if($get_editable_news_row['user_status']==0) echo "checked";?> />Yes 
                                   <input type="radio" name="status" id="status" value="1" <?php if($get_editable_news_row['user_status']==1) echo "checked";?> />No
                                   </div>
								</div>
								</li>
								
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signupsubmit" type="submit" class="btn_small btn_blue"><span>Edit</span></button>
									</div>
								</div>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>