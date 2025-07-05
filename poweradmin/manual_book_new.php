<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


//Add News & Events
if(isset($_POST['signupsubmit']))
{
	
	$create_date = $_POST['issue_date'];
	$veno = $_POST['route_to'];
	$sales_qty = $_POST['sales_qty'];
	
	$take = "select * from power_manual_stock where  agent_id = ".$veno;
	$take1 = mysqli_query($objConn,$take);
	while($take2 = mysqli_fetch_array($take1))
	{
		if($take2['sales_qty']<=($take2['qty']))
		{
			$tot_sales = 	$take2['sales_qty']+$_POST['sales_qty'];
			if($tot_sales<=$take2['qty'])
			{
				$up = "update power_manual_stock set sales_qty=".$tot_sales." where id =".$take2['id']." and agent_id =".$veno;	
				$up1 = mysqli_query($objConn,$up);
				$from = ($take2['sales_qty']*200)+$take2['from_id'];
				$to = $from+($_POST['sales_qty']*200)-1;
				$news_ins = "INSERT INTO power_manual (agent_id, from_id, to_id,qty,create_date) VALUES('".$veno."','".$from."',".$to.",".$_POST['sales_qty']." ,'".$create_date."')";
				$news_ins1 = mysqli_query($objConn,$news_ins);
				$max_issue = "select max(id) from power_manual";
				$max_issue1 = mysqli_query($objConn,$max_issue);
				$max_issue2 = mysqli_fetch_row($max_issue1);
				for($i=$from;$i<=$to;$i++)
				{
						$news_ins = "INSERT INTO power_manual_child (issue_id , agent_id, manual_id, lr_no) VALUES('".$max_issue2[0]."','".$veno."','".$i."', 'Nil')";
						$news_ins1 = mysqli_query($objConn,$news_ins);
				}
				
				header('Location:manual_stock_sales.php?msg=1');
				exit;
			}
			
		}
		
	}
	
	
	
	header('Location:manual_book.php?msg=1');exit;

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
	if(document.signupform.vehno.value=="")
	{
	document.signupform.vehno.focus();
	alert("Enter the Vehicle Number");
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
		<h3>Manual Book  Management</h3>
		
	</div>
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New Manual Book Issue (Agent)</h6>
                        <div class="go_back"><h6><a href="#">Go Back</a></h6></div>
					</div>
					<div class="widget_content">
                    <?php if($_REQUEST['msg']==1) echo "Quantity Mismatch.";?>
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                             <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Book Issue Date<span class="req">*</span></label>
									<div class="form_input">
										<input id="issue_date" name="issue_date" type="date" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Agent<span class="req">*</span></label>
									<div class="form_input">
										<select name="route_to" id="route_to" class="limiterBox" tabindex="2" onChange="recieveraddress(this.value);">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0 and route_nature = 'Booking & Delivery' order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_SESSION['route']!=$route1['id'])
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select>
									</div>
								</div>
								</li>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">No. of Books<span class="req">*</span></label>
									<div class="form_input">
										<input id="sales_qty" name="sales_qty" type="text" value="" maxlength="100" class="large"/>
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