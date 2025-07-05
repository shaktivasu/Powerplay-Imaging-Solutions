<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');

$sel ="select * from power_customers where id = ".$_REQUEST['cust_id'];
$sel1 =mysqli_query($objConn,$sel);
$sel2 = mysqli_fetch_array($sel1);
if(isset($_POST['Submit']))
{
	echo "Hi";
	echo $dup = "select * from power_customers where cust_name = '".$_POST['cust_name']."' and cust_phone='".$_POST['cust_phone']."'";
	$dup1 = mysqli_num_rows(mysqli_query($objConn,$dup));
	if($dup1==0)
    {
	echo $up ="update power_customers set cust_name = '".$_POST['cust_name']."', cust_address='".$_POST['cust_address']."', cust_phone='".$_POST['cust_phone']."' where id = ".$_REQUEST['cust_id'];
	$up1 = mysqli_query($objConn,$up);
	header("location:customer.php?msg=success");
	}
	else
	{
		 $up ="update power_customers set  cust_address='".$_POST['cust_address']."' where id = ".$_REQUEST['cust_id'];
		 $up1 = mysqli_query($objConn,$up);
	header("location:customer.php?msg=success");
	}
}

?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
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
                <li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
                <li><a href="luggage_new.php"><span class="nav_icon note_book"></span> Booking</a></li>
                <li><a href="luggage_new_manual.php"><span class="nav_icon user"></span> Manual Entry</a></li>
                <li><a href="luggage.php"><span class="nav_icon truck"></span> <span class="menu_color_dis">Dispatch </span>Statement</a></li>                
                <li><a href="luggage_inward.php"><span class="nav_icon bended_arrow_left"></span><span class="menu_color_inw"> Inward</span> Statement</a></li>
		<li><a href="luggage_delivery.php"><span class="nav_icon box_outgoing"></span>Pending <span class="menu_color_del"> Delivery</span> </a></li>
                <li><a href="luggage_cancelled.php"><span class="nav_icon go_back_from_screen"></span><span class="menu_color_cal"> Cancelled</span> Statement</a></li>
                <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li>
                <li><a href="customer.php"><span class="nav_icon admin_user_2"></span>Customer Management</a></li>
                
                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
                <li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Power Play Imaging Solutions">
			</div>
			<div id="responsive_mnu">
			<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Booking</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Dispatch Statement</a></li> 
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li> <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li><li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>

                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
<li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><a href="logout.php" ><span class="user_name"><strong>Logout</strong> </span></a></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="grid_container">
			
			
			
			<div id="content">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>Update Profile</h6>
                        <div align="right"><h6><a href="customer.php">Back to Customers</a></h6></div>
					</div>
					<div class="widget_content">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="pay_title">Edit Customer Details 
    
    
    </div><br>

    <form name="frm" id="frm" method="post" action="">
    <table width="80%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      
      <tr>
        <td width="233" height="26" align="right" class="label_txt">Name :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
        <input name="cust_id"  id="cust_id" type="hidden"  value="<?php echo $sel2['id']?>">
		<input name="cust_name"  id="cust_name" type="text"  value="<?php echo $sel2['cust_name']?>"></td>
        <td width="161" align="left" class="label_txt">&nbsp;</td>
        <td width="257" align="left" class="label_txt">&nbsp;</td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="26" align="right" class="label_txt">Address :</td> 
        
        <td align="center" class="label_txt" style="text-transform:uppercase;">
        <input name="cust_address" id="cust_address" type="text" value="<?php echo $sel2['cust_address']?>"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" align="right" class="label_txt">Contact No:</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">
        <input name="cust_phone" id="cust_phone" type="text" value="<?php echo $sel2['cust_phone']?>" ></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
     
      <tr>
        <td width="233" height="26" align="right" class="label_txt"></td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;"><span class="label_txt" style="text-transform:uppercase;">
          <input type="submit" name="Submit" value="Change">
        </span></td>
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
</div>
				</div>
			</div>
			
			
			
			
		</div>
	<span class="clear"></span></div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>