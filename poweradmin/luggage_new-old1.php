<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$max=mysqli_fetch_row(mysqli_query($objConn,"select max(id) from power_luggage"));
$max1=$max[0]+1;
//$date = date_create();
//date_timestamp_get($date);
$max2='LR'.$max1.time();

?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions   - Admin Panel ::</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/themes.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/shCore.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="css/data-table.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="css/wizard.css" rel="stylesheet" type="text/css">
<link href="css/sprite.css" rel="stylesheet" type="text/css">
<link href="css/gradient.css" rel="stylesheet" type="text/css">
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
<!--<script src="js/jquery-1.7.1.min.js"></script>
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
<script src="js/chart-plugins/jqplot.dateAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.cursor.min.js"></script>
<script src="js/chart-plugins/jqplot.logAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasTextRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.highlighter.min.js"></script>
<script src="js/chart-plugins/jqplot.pieRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.barRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.pointLabels.min.js"></script>
<script src="js/chart-plugins/jqplot.meterGaugeRenderer.min.js"></script>
<script src="js/custom-scripts.js"></script>-->
<script type="text/javascript">
 document.onkeypress=function(e){
 var e=window.event || e
 //alert("CharCode value: "+e.keyCode )
 //alert("Character: "+String.fromCharCode(e.charCode))
 if (e.keyCode == 112)
 addFile();
}
		function addElement(parentId, elementTag, elementId, html) {
				// Adds an element to the document
				var p = document.getElementById(parentId);
				var newElement = document.createElement(elementTag);
				newElement.setAttribute('id', elementId);
				newElement.innerHTML = html;
				p.appendChild(newElement);
		}
		function removeElement(elementId) {
				// Removes an element from the document
				var fields = document.getElementById('totaltxt').value;
				if(fields!="none"){
					var fileId = fields; 
				}else{
					var fileId = 0; 
				}	
				var element = document.getElementById(elementId);
				element.parentNode.removeChild(element);
				fileId--;
				//alert(fileId);
				document.getElementById('totaltxt').value=fileId;
		}
		
function addFile() {
				//
				// Example function showing how to add a file input box to an existing form
				//
				
				var fields = document.getElementById('totaltxt').value;
				if(fields!="none"){
					var fileId = fields; 
				}else{
					var fileId = 0; 
				}	
				//alert(fileId);
				fileId++; // increment fileId to get a unique ID for the new element
				var html = '<table width="850" border="0" cellspacing="1" cellpadding="0"><tr><td width="370" height="37" align="center" bgcolor="#FFFFFF" style="text-transform:uppercase;"><input name="prd_name[]" type="text" id="prd_name<?php echo ($i+1); ?>" size="7" maxlength="10"></td><td width="153" height="37" align="center" bgcolor="#FFFFFF"><input name="prd_qunty[]" type="text" id="prd_qunty<?php echo ($i+1); ?>" size="7" maxlength="10"></td><td width="163" height="37" align="center" bgcolor="#FFFFFF"><input name="prd_price[]" type="text" id="prd_price<?php echo ($i+1); ?>" size="10" maxlength="10"></td><td width="83" height="37" align="center" bgcolor="#FFFFFF"><a href="" onclick="javascript:removeElement(\'file-' + fileId + '\'); return false;"><img src="images/remove.jpg" border="0"></a></td></tr></table>';
				addElement('files', 'p', 'file-' + fileId, html);
				document.getElementById('totaltxt').value=fileId;
				
			}	
			
</script>

</head>
<body id="theme-default" class="full_block" onkeydown="GetChar(event);">
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<ul id="sidenav" class="accordion_mnu collapsible">
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Booking</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Dispatch Statement</a></li> 
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li> <li><a href="credit.php"><span class="nav_icon list_images"></span>Credit Customers </a></li>
 <li><a href="route.php"><span class="nav_icon list_images"></span>Agent Management </a></li>
<li><a href="vehicle.php"><span class="nav_icon list_images"></span>Vehicle Management </a></li>
				
<!--<li><a href="customer.php"><span class="nav_icon list_images"></span>Customer Management</a></li>-->
				<li><a href="particulars.php"><span class="nav_icon list_images"></span>Particulars Management</a></li>
<li><a href="#"><span class="nav_icon list_images"></span>SMS Management</a></li>
<li><a href="collections.php"><span class="nav_icon list_images"></span>Collections - Agents</a></li>
<li><a href="collections_party.php"><span class="nav_icon list_images"></span>Collections - Credit </a></li>
<li><a href="accounts.php"><span class="nav_icon list_images"></span>Accounts</a></li>
                <li><a href="reports.php"><span class="nav_icon list_images"></span>Reports</a></li>
<li><a href="settings.php"><span class="nav_icon list_images"></span>Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="kmp travels">
			</div>
			<div id="responsive_mnu">
			<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Forms</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Tables</a></li>
                
				<li><a href="#"><span class="nav_icon list_images"></span>Page 1</a></li>
				<li><a href="#"><span class="nav_icon list_images"></span>Page 2</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 3</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 4</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 5</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 6</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 7</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 8</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 9</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 10</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 11</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 12</a></li>
                <li><a href="#"><span class="nav_icon list_images"></span>Page 13</a></li>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name">Administrator</span><span><a href="dashboard.php">Dashboard</a> &#124; <a href="logout.php">Logout</a> </span></li>
					<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Parcel Booking</h3>
		
	</div>
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New luggage</h6>
					</div>
					<div class="widget_content">
						<form id="signupform" autocomplete="off" method="post"  class="form_container left_label" action="luggage_ins.php">
							<ul>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">LR No.<span class="req">*</span></label>
									<div class="form_input">
										<input id="lrno" name="lrno" type="text"  maxlength="100" class="large" value="<?php echo $max2;?>"/>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Customer Name & Phone No.<span class="req">*</span></label>
									<div class="form_input">
										<input id="sender" name="sender" type="text"  maxlength="100" class="large" value=""/>
                                      
									</div>
                                    <div class="form_input">
										<input id="sender_phone" name="sender_phone" type="text"  maxlength="100" class="large" value=""/>
                                       
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Reciever Name & Phone No.<span class="req">*</span></label>
									<div class="form_input">
										<input id="reciever" name="reciever" type="text"  maxlength="100" class="large" value=""/><br>
                                        <input id="reciever_phone" name="reciever_phone" type="text"  maxlength="100" class="large" value=""/>
									</div>
								</div>
								</li>
                                
								<li>
                                
                                
                                <table width="850" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" bgcolor="#00356A">
			  <table width="850" border="0" cellpadding="0" cellspacing="1">
                  <tr>
                    <td width="259" height="34" align="center" bgcolor="#FFFFFF" class="label_txt">Product Name </td>
                    <td width="104" height="34" align="center" bgcolor="#FFFFFF" class="label_txt">Quantity</td>
                    <td width="111" height="34" align="center" bgcolor="#FFFFFF" class="label_txt">Price</td>
                    <td width="54" height="34" align="center" bgcolor="#FFFFFF" class="label_txt">
					<img src="images/addevent16.jpg" onClick="addFile();" style="cursor:pointer;"></td>
                  </tr>
              </table>
				<?php 
				$vals=1;
				if($vals>0){
				for($i=0;$i<$vals;$i++){
				?>
				<div id="files" align="left">
				<p align="left" id="file-<?php echo ($i+1); ?>">
			  <table width="850" border="0" cellspacing="1" cellpadding="0">
			  <tr>
                    <td width="370" height="37" align="center" bgcolor="#FFFFFF" style="text-transform:uppercase;">
                                   <input name="prd_name[]" type="text" id="prd_name<?php echo ($i+1); ?>" size="7" maxlength="10"></td>
                    <td width="153" height="37" align="center" bgcolor="#FFFFFF"><input name="prd_qunty[]" type="text" id="prd_qunty<?php echo ($i+1); ?>" size="7" maxlength="10"></td>
                    <td width="163" height="37" align="center" bgcolor="#FFFFFF"><input name="prd_price[]" type="text" id="prd_price<?php echo ($i+1); ?>" size="10" maxlength="10"></td>
                    <td width="83" height="37" align="center" bgcolor="#FFFFFF">
					<!--<a onClick="javascript:removeElement('file-<?php //echo ($i+1); ?>'); return false;" href="">                  <img src="images/remove.jpg" border="0"></a>-->                    </td>
                  </tr>
			  </table>
			  </p>
			   <?php } }?></div>
			    <input type="hidden" name="totaltxt" id="totaltxt" value="<?php echo @$vals; ?>" />			  </td>
            </tr>
          </table></li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Vechile<span class="req">*</span></label>
									<div class="form_input">
                                      <select name="vehicle">
                                     <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
                                      </select>
									</div>
								</div>
								</li>
                                
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="llastname" for="lastname">From<span class="req">*</span></label>
									<div class="form_input">
										Tiruppur<input type="hidden" name="route_from" id="route_from" value="1" />	
									</div>
								</div>
								</li>
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lusername" for="username">To<span class="req">*</span></label>
									<div class="form_input">
										<select name="route_to">
                                        <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                                        
                                        </select>


									</div>
								</div>
								</li>
								
                                
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lpassword" for="password">Luggage Charges<span class="req">*</span></label>
									<div class="form_input">
										<input id="total_amount" name="total_amount" type="text" maxlength="50" value="100" class="large" />
									</div>
								</div>
								</li>
                                
                                <li>
                                <div class="form_grid_12">
									<label class="field_title" id="Payment mode" for="password">Payment mode<span class="req">*</span></label>
									<div class="form_input">
										<input name="pay_mode" class="radio" type="radio" value="Cash" tabindex="17"  checked>
														<label class="choice"><strong>Cash</strong></label>
														
														
                                                        
														<input name="pay_mode" class="radio" type="radio" value="Credit" tabindex="18">
														<label class="choice"><strong>Credit</strong></label>
									</div>
								</div>
								</li>
                                
                                
                                <li>
                                <div class="form_grid_12">
									<label class="field_title" id="Payment mode" for="password">Payment Method<span class="req">*</span></label>
									<div class="form_input">
										<input name="pay_method" class="radio" type="radio" value="Paid" tabindex="17" checked>
														<label class="choice"><strong>Paid</strong></label>
														
														<input name="pay_method" class="radio" type="radio" value="To Pay" tabindex="18">
														<label class="choice"><strong>To Pay</strong></label>
                                                        
														
									</div>
								</div>
								</li>
								
								
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Confirm</span></button>
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