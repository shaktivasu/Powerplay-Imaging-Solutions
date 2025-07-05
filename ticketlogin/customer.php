<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
<style type="text/css">    
            .pg-normal
			{
				font-family:Verdana;
				font-size: 11px;
				color: #00356A;
                text-decoration: none;    
                cursor: pointer;
				font-weight:bold;
            }
            .pg-selected 
			{
                color: black;
                font-weight: bold;        
                text-decoration: underline;
                cursor: pointer;
            }
        .style1 {color: #000000}
.style2 {color: #333333}
</style>
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

<script>
function del_confirm(custid)
{
	var retVal = confirm('Do you want to delete this customer?');
				   if( retVal == true ){
					   window.location('customer_delete.php?cust_id='+custid);
					  return true;
							   }else{
								  return false;
							   }
}
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
			<?php include_once("menu.php");?>
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
			
			
			
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>Customer Management
                        
                        <?php if($GET['msg']=='success')
						{
							echo "Updated Successfully.";
						}
						if($GET['del']=='success')
						{
							echo "Deleted Successfully.";
						}?>
                        </h6>
					</div>
					<div class="widget_content">
						<table class="display" id="results">
						<thead>
						<tr>
							<th width="6%">
								 Sl No
							</th>
							<th width="39%" align="left">
						    Customer Name</th>
							<th width="17%">Contact Number</th>
							<th width="19%" align="left">Address</th>
							<th width="19%">
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
						$sel = "select * from power_customers where cust_route = ".$_SESSION['route']." and cust_phone <>0 order by cust_name";
						$sel1 = mysqli_query($objConn,$sel);
						$num = mysqli_num_rows($sel1);
						$co=1;
						while($sel2 = mysqli_fetch_array($sel1))
						{
							if($co%2==0) $cls = 'gradeX'; else $cls = 'gradeC';
						?>
						<tr class="<?php echo $cls?>">
							<td align="center"><?php echo $co++;?>
								
							</td>
							<td><?php echo $sel2['cust_name']?></td>
							<td align="center"><?php echo $sel2['cust_phone']?></td>
							<td align="left" ><?php echo $sel2['cust_address']?></td>
							<td class="center">
							<span><a class="action-icons c-edit" href="customer_edit.php?cust_id=<?php echo $sel2['id']?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="customer_delete.php?cust_id=<?php echo $sel2['id']?>" title="delete" onClick="return del_confirm();">Delete</a></span>
							</td>
						</tr>
                        <?php }?>
						</tbody>
						</table><br>
<br>

                         <?php if($num>30) { ?>
    <div id="pageNavPosition" align="right" style="padding-right:50px; padding-bottom:20px;"></div>	
    <?php } ?><script type="text/javascript">
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
</script>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>