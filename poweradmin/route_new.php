<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


//Add News & Events
if(isset($_POST['signupsubmit']))
{
	
	$create_date = date('Y-m-d');
	$route = $_POST['route'];
	$route_group = $_POST['route_group'];
	$route_username = $_POST['route_username'];
	$route_password = $_POST['route_password'];
	$route_address = $_POST['route_address'];
	$route_phone = $_POST['route_phone'];
	$route_paid = $_POST['route_paid'];
	$route_topay = $_POST['route_topay'];
	$route_credit = $_POST['route_credit'];
	$delivery_paid = $_POST['delivery_paid'];
	$delivery_topay = $_POST['delivery_topay'];
	$delivery_credit = $_POST['delivery_credit'];
	$news_ins = "INSERT INTO power_route (route,route_type,route_username,route_password,route_address,route_phone,route_comission_paid,route_comission_topay,route_comission_credit,route_delivery_paid,route_delivery_topay,route_delivery_credit, route_status,route_group, create_date) VALUES('".$route."','".$_POST['route_type']."','".$route_username."','".$route_password."','".$route_address."','".$route_phone."','".$route_paid."','".$route_topay."','".$route_credit."','".$delivery_paid."','".$delivery_topay."','".$delivery_credit."','0','".$route_group."', '".$create_date."')";
	
	
	$news_ins1 = mysqli_query($objConn,$news_ins);
	header('Location:route.php?msg=1');

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



<script type="text/javascript">
function newsval()
{
	if(document.signupform.route.value=="")
	{
	document.signupform.route.focus();
	alert("Enter the Route");
	return false;
	}
    if(document.signupform.route_username.value=="")
	{
	document.signupform.route_username.focus();
	alert("Enter the Agent Username");
	return false;
	}
	if(document.signupform.route_password.value=="")
	{
	document.signupform.route_password.focus();
	alert("Enter the Agent Password");
	return false;
	}
	if(document.signupform.route_address.value=="")
	{
	document.signupform.route_address.focus();
	alert("Enter the Agent Address");
	return false;
	}
	if(document.signupform.route_phone.value=="")
	{
	document.signupform.route_phone.focus();
	alert("Enter the Agent Phone No.");
	return false;
	}
	if(document.signupform.route_paid.value=="")
	{
	document.signupform.route_paid.focus();
	alert("Enter the Agent Paid Comisssion");
	return false;
	}
	if(document.signupform.route_topay.value=="")
	{
	document.signupform.route_topay.focus();
	alert("Enter the Agent To Pay Comisssion");
	return false;
	}
	if(document.signupform.route_delivery.value=="")
	{
	document.signupform.route_delivery.focus();
	alert("Enter the Agent Delivery Comisssion");
	return false;
	}
	return true;	
}
</script>
</head>
<body id="theme-default" class="full_block">
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
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Customer Management</h3>
		
	</div>
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New Customer</h6>
                        <div class="go_back"><h6><a href="route.php">Go Back</a></h6></div>
					</div>
					<div class="widget_content">
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Customer Name.<span class="req">*</span></label>
									<div class="form_input">
										<input id="route" name="route" type="text" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
								
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Username.<span class="req">*</span></label>
									<div class="form_input">
										<input id="route_username" name="route_username" type="text" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Password.<span class="req">*</span></label>
									<div class="form_input">
										<input id="route_password" name="route_password" type="text" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
								 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Customer Address<span class="req">*</span></label>
									<div class="form_input">
                                    <input id="route_address" name="route_address" type="text"  maxlength="100" class="large" /></div>
								</div>
								</li>
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Customer PHONE<span class="req">*</span></label>
									<div class="form_input">
                                    <input id="route_phone" name="route_phone" type="text"  maxlength="100" class="large" /></div>
								</div>
								</li>
                                
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Customer  Status.<span class="req">*</span></label>
									<div class="form_input">
                                   <input name="status" type="radio" id="status" value="0"  <?php if($get_editable_news_row['route_status']==0) echo "checked";?> />Yes 
                                   <input type="radio" name="status" id="status" value="1" <?php if($get_editable_news_row['route_status']==1) echo "checked";?> />No
                                   </div>
								</div>
								</li>
								<li>
								
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signupsubmit" type="submit" class="btn_small btn_blue"><span>Add</span></button>
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