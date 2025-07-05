<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$id=$_REQUEST['id'];
if(isset($id) && $id!='')
{
 $get_editable_news=mysqli_query($objConn,"select * from power_luggage where id=".$id."") or die("edit News Error:".mysql_error());
$get_editable_news_row=mysqli_fetch_array($get_editable_news);
}

//Add News & Events
if(isset($_POST['signupsubmit']))
{
	$take_credit =  mysqli_fetch_array(mysqli_query($objConn,"select * from power_credit where id = ".$_POST['route_to']));
	
	 if($_POST['delivery_charge'] > 0 )
	  $news_edit = "update power_luggage set luggage_status='".$_POST['luggage_status']."',luggage_vehicle='".$_POST['vehicle']."',luggage_doordelivery='Yes',luggage_doorcharges='".$_POST['delivery_charge']."',unloading_charges ='".$_POST['unloading_charge']."',create_date ='".$_POST['luggage_date']."',luggage_sender_id='".$_POST['route_to']."',luggage_sender='".$take_credit['credit']."',luggage_sender_phone='".$take_credit['credit_phone']."',luggage_reciever='".$_POST['luggage_reciever']."',luggage_reciever_phone='".$_POST['luggage_reciever_phone']."',luggage_fees='".$_POST['luggage_fees']."',luggage_charges='".$_POST['luggage_charges']."'   where id=".$id."";
	 else 
	 $news_edit = "update power_luggage set luggage_status='".$_POST['luggage_status']."',luggage_vehicle='".$_POST['vehicle']."',luggage_doorcharges='".$_POST['delivery_charge']."',unloading_charges ='".$_POST['unloading_charge']."',create_date ='".$_POST['luggage_date']."',luggage_sender_id='".$_POST['route_to']."',luggage_sender='".$take_credit['credit']."',luggage_sender_phone='".$take_credit['credit_phone']."',luggage_reciever='".$_POST['luggage_reciever']."',luggage_reciever_phone='".$_POST['luggage_reciever_phone']."',luggage_fees='".$_POST['luggage_fees']."',luggage_charges='".$_POST['luggage_charges']."'   where id=".$id."";
	$news_edit1 = mysqli_query($objConn,$news_edit);
	
	$get_prd = "select * from power_particulars where id=".$_POST['prd_name'];
	$get_prd1 = mysqli_query($objConn,$get_prd);
	$get_prd2 = mysqli_fetch_array($get_prd1);
	echo $news_edit2 = "update power_luggage_prd set luggage_prd_name = '".$get_prd2['particulars']."',luggage_qunty='".$_POST['luggage_qunty']."',luggage_charge='".$_POST['luggage_loading']."',luggage_uncharge='".$_POST['luggage_unloading']."'  where luggage_lrno='".$_POST['luggage_lrno']."'";
	$news_edit3 = mysqli_query($objConn,$news_edit2);
	
	?>
	<script>window.close();window.opener.location.reload();</script>
	<?php

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

				
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Edit Luggage Details</h3>
		
	</div>

						<h6>Edit Luggage status</h6>
					
					<div class="widget_content">
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">LR  No.<span class="req">*</span></label>
									<div class="form_input"><strong>
                                    <input type="hidden" name="luggage_lrno" id="luggage_lrno" value="<?php echo $get_editable_news_row['luggage_lrno']?>" class="large" >
                                   <?php echo $get_editable_news_row['luggage_lrno']?></strong></div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">LR  Date<span class="req">*</span></label>
									<div class="form_input"><strong>
                                  <script>DateInput('luggage_date', true, 'yyyy-mm-dd','<?php echo $get_editable_news_row['create_date'] ?>')</script></strong></div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Sender Name<span class="req">*</span></label>
									<select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_credit order by credit ");
										while($route1 = mysqli_fetch_array($route))
										{
											if($route1['id']==$get_editable_news_row['luggage_sender_id'])
											echo "<option value=".$route1['id']." selected>".$route1['credit']."</option>";
											else
											echo "<option value=".$route1['id'].">".$route1['credit']."</option>";
										}
										
										?>
                        </select>
                                 </div>
								
								</li>
                                 <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Reciever Name & Phone Number<span class="req">*</span></label>
									<div class="form_input"> <input type="text" name="luggage_reciever" id="luggage_reciever" value="<?php echo $get_editable_news_row['luggage_reciever']?>" class="large" ><br><input type="text" name="luggage_reciever_phone" id="luggage_reciever_phone" value="<?php echo $get_editable_news_row['luggage_reciever_phone']?>" class="large" >
                                 </div>
								</div>
								</li>
                                
                                 <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Luggage Particulars<span class="req">*</span></label>
									<div class="form_input">
                                    <?php $get_prd = "select * from power_luggage_prd where luggage_lrno ='".$get_editable_news_row['luggage_lrno']."'";
									$get_prd1 = mysqli_query($objConn,$get_prd);
									$get_prd2 = mysqli_fetch_array($get_prd1);
									
									?>
                                    
                                     <select name="prd_name"  id="prd_name" class="limiterBox" tabindex="10">
                    <option value="0">Select Any</option>
                      <?php 
										$route = mysqli_query($objConn,"select * from power_particulars where particulars_status=0  order by particulars");
										while($route1 = mysqli_fetch_array($route))
										{
											if($get_prd2['luggage_prd_name']==$route1['particulars'])
											echo "<option value=".$route1['id']." selected>".$route1['particulars']."</option>";
											else 
											echo "<option value=".$route1['id']." >".$route1['particulars']."</option>";
										}
										
										?>
                    </select>
                                 </div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Qty<span class="req">*</span></label>
									<div class="form_input"><input type="text" name="luggage_qunty" id="luggage_qunty" value="<?php echo $get_prd2['luggage_qunty']?>" class="large" ></div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Luggage Fees<span class="req">*</span></label>
									<div class="form_input"><strong> 
                                    
                                    <input type="text" name="luggage_fees" id="luggage_fees" value="<?php echo $get_editable_news_row['luggage_fees']?>" class="large" >
                                  </strong></div>
								</div>
								</li>
                                <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$get_editable_news_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							$luggage_charge_sep =0;
							$luggage_uncharge_sep =0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							  
							   $luggage_charge_sep += $luggage_prd2['luggage_charge'];
							   $luggage_uncharge_sep += $luggage_prd2['luggage_uncharge'];
							}
							
							?>
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Loading / Unloading Charges<span class="req">*</span></label>
									<div class="form_input"><strong> 
                                    
                                    <input type="text" name="luggage_charges" id="luggage_charges" value="<?php echo $get_editable_news_row['luggage_charges']?>" class="large" >
                                  </strong></div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Vehicle No <span class="req">*</span></label>
									<div class="form_input">
                                    <?php  if($get_editable_news_row['luggage_status']=='New Arrival') {?>
                                    
                                    <select name="vehicle" class="limiterBox1" tabindex="1">
                          <option value="0">Select Any</option>
                          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											if($vehicl1['id']==$get_editable_news_row['luggage_vehicle'])
											echo "<option value=".$vehicl1['id']." selected>".$vehicl1['vehicle']."</option>";
											else
											echo "<option value=".$vehicl1['id']." >".$vehicl1['vehicle']."</option>";
										}
										
										?>
                        </select><?php } else {
							$vecname =mysqli_fetch_row(mysqli_query($objConn,"select vehicle from power_vehicle where id = ".$get_editable_news_row['luggage_vehicle']));
							
							echo $vecname[0] ;
						}?></div>
								</div>
								</li>
                                
								<li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Luggage  Status.<span class="req">*</span></label>
									<div class="form_input">
                                   <select name="luggage_status">
                                   <?php 
								   if($get_editable_news_row['luggage_status']=='Dispatched')
								   echo "<option>New Arrival</option><option >Dispatched</option><option>Inward</option><option>Delivered</option><option>Cancelled</option>";
								   if($get_editable_news_row['luggage_status']=='Inward')
								   echo "<option>New Arrival</option><option>Dispatched</option><option selected>Inward</option><option>Delivered</option><option>Cancelled</option>";
								  /*if($get_editable_news_row['luggage_status']=='Ready to Delivery')
								  echo "<option>New Arrival</option><option>Dispatched</option><option >Inward</option><option selected>Ready to Delivery</option><option>Delivered</option><option>Cancelled</option>";*/
								  if($get_editable_news_row['luggage_status']=='Delivered')
								   echo "<option>New Arrival</option><option>Dispatched</option><option >Inward</option><option selected>Delivered</option><option>Cancelled</option>"; 
								   if($get_editable_news_row['luggage_status']=='Cancelled')
								   echo "<option>New Arrival</option><option>Dispatched</option><option >Inward</option><option>Delivered</option><option selected>Cancelled</option>"; 
								   if($get_editable_news_row['luggage_status']=='New Arrival')
								   echo "<option selected>New Arrival</option><option>Dispatched</option><option>Inward</option><option>Delivered</option><option>Cancelled</option>";
								   ?>
                                   
                                   </select>
                                   </div>
								</div>
								</li>
                                <?php  if($get_editable_news_row['luggage_doordelivery']=='No' || ($get_editable_news_row['luggage_doordelivery']=='Yes' &&$get_editable_news_row['luggage_doorcharges']==0)) {?>
								<li>
								<div class="form_grid_12">
									<label  id="lfirstname" for="firstname">Door Delivery Charges.<span class="req">*</span></label>
									<div class="form_input">
                                  <input type="text" name="delivery_charge" id="delivery_charge" value="<?php echo $get_editable_news_row['luggage_doorcharges']?>" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                                   </div>
								</div>
								</li><?php }?>
                                  <?php  if($get_editable_news_row['luggage_doordelivery']=='Yes') {?>
                                  <input type="hidden" name="unloading_charge" id="unloading_charge" value="0" ><?php } else {?>
                                <li>
								<div class="form_grid_12">
									<label id="lfirstname" for="firstname">Unloading Charges.<span class="req">*</span></label>
									<div class="form_input">
                                  <input type="text" name="unloading_charge" id="unloading_charge" value="<?php echo $get_editable_news_row['unloading_charge']?>" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                                   </div>
								</div>
								</li><?php }?>
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
				
</body>
</html>