<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


//Add News & Events
if(isset($_POST['signupsubmit']))
{
	
	$create_date = $_POST['collection_date'];
	$veno = $_POST['route_from'];
	$collection_amt = $_POST['collection_amt'];
	$particulars = $_POST['particulars'];
	$str_spl = split(',',$_POST['particulars_detail']);
	$parti = $str_spl[1];
	$comments = $_POST['comments'];
	$paymode = $_POST['paymode'];
	if($_POST['collection_status']==2){
		
	$parti = 'Bank Transfer';
	//$comments = $comments.' '.$_POST['bank_name'].' - '.$_POST['branch_name'].' - '.$_POST['chq_no'].' - '.$_POST['chq_date'];
	
	}
	
	/*if($_POST['collection_status']==1)
	{
	// $news_ins = "INSERT INTO power_ticket (luggage_lrno,luggage_from, luggage_fees , create_date,luggage_paymethod) VALUES('".$particulars."','".$_SESSION['route']."','".$collection_amt."', '".$create_date."','Expenses')";
	}
	if($_POST['collection_status']==0)
	{
		if($_POST['collection_party']==0)
		{
			// Credit
		 $news_ins = "INSERT INTO power_collections_credit (route_id,particulars,collection_amount, collection_status , collection_date,bank_name,branch_name,chq_no,chq_date,pay_mode) VALUES('".$_POST['credit_list']."','".$particulars."','".$collection_amt."',0, '".$create_date."','".$_POST['bank_name']."','".$_POST['branch_name']."','".$_POST['chq_no']."','".$_POST['chq_date']."','".$_POST['paymode']."')";
		}
		if($_POST['collection_party']==1)
		{
			// Agent
		$news_ins = "INSERT INTO power_collections (route_id,particulars,collection_amount, collection_status , collection_date,bank_name,branch_name,chq_no,chq_date,pay_mode) VALUES('".$_POST['agent_list']."','".$particulars."','".$collection_amt."',0, '".$create_date."','".$_POST['bank_name']."','".$_POST['branch_name']."','".$_POST['chq_no']."','".$_POST['chq_date']."','".$_POST['paymode']."')";
		}
	}*/
	if($_POST['collection_status']==2)
	{
		echo $news_ins = "INSERT INTO power_transfer (route_id,particulars,collection_amount, collection_status ,collection_mode, collection_date,bank_name,branch_name,chq_no,chq_date) VALUES('".$_SESSION['route']."','".$comments."','".$collection_amt."',1,'".$paymode."','".$create_date."','".$_POST['bank_name']."','".$_POST['branch_name']."','".$_POST['chq_no']."','".$_POST['chq_date']."')";
	}
	
	if($_POST['collection_status']==1)
	{
	$ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date,comments) values ('Nil','".$_SESSION['route']."','".$parti."','".$collection_amt."','".$_POST['paymode']."',".$_POST['collection_status'].",0,'".$create_date."','".$comments."')";
$ins1 = mysqli_query($objConn,$ins);
	}
	if($_POST['collection_status']==0  )
	{
		if($_POST['agent_list']!=0)
		{
		$age = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$_POST['agent_list']));
		$parti = $age[0];
		}
		if($_POST['credit_list']!=0)
		{
		$cre = mysqli_fetch_row(mysqli_query($objConn,"select credit from power_credit where id = ".$_POST['credit_list']));
		$parti = $cre[0];
		}
		 $ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date,comments) values ('Nil','".$_SESSION['route']."','".$parti."','".$_POST['collection_amt']."','".$_POST['paymode']."',".$_POST['collection_status'].",0,'".$create_date."','".$comments."')";
$ins1 = mysqli_query($objConn,$ins);
	}
	
	$news_ins1 = mysqli_query($objConn,$news_ins);
	
	
	header("Location:daysheet.php?frmdate=".$_POST['fromdate']."&todate=".$_POST['todate']);

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


<script type="text/javascript">
function newsval()
{
	if(document.signupform.route_from.value==0)
	{
	document.signupform.route_from.focus();
	alert("Please Select Any Route");
	return false;
	}
	if(document.signupform.collectin_amt.value=='')
	{
	document.signupform.collectin_amt.focus();
	alert("Enter the Collection Amount");
	return false;
	}

	return true;	
}

function take_value()
{
	//document.signupform.collection_amt.value = document.signupform.particulars.value
	str=document.signupform.particulars.value
	var res = str.split("@", 1);
	var res1 = str.split("@", 2);
 document.signupform.collection_amt.value =  res;
 document.signupform.particulars_detail.value =  res1;
}
function enter_pressed(e){
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return false;
return (keycode == 13);
}

//NUMBERS ONLY
function numbersonly(myfield, e, dec)
{
	var key;
	var keychar;
	
	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)  ){
	   return true;
	}
	// numbers
	else {	
		if ((("0123456789").indexOf(keychar) > -1)){
		   
			return true;
		  
		} 
		else {
			 
			// decimal point jump
			if (dec && (keychar == "."))	{				
				myfield.form.elements[dec].focus();
				return false;
			} else {
				return false;
			}
		}
	}
}
//NUMBERS ONLY

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
<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked || document.getElementById('collection_transfer').checked) {
        document.getElementById('ifYes').style.display = ''; 
    } else {
        document.getElementById('ifYes').style.display = 'none';
    }
	
	
}
function reciept()
{ 
	document.getElementById('agentCheck').disabled=false;
	document.getElementById('creditCheck').disabled=false;
	document.getElementById('creditCheck').checked=false;	
	document.getElementById('agentCheck').checked=false;
	document.getElementById('particulars').disabled=true;
	
	yesnoCheck();
	}
	function voucher()
	{
		document.getElementById('creditCheck').disabled=true;
		document.getElementById('agentCheck').disabled=true;
		document.getElementById('agent_list').disabled=true;
		document.getElementById('credit_list').disabled=true;
		document.getElementById('particulars').disabled=false;
		
		yesnoCheck();
	}
	
	function activecrdit()
	{
	document.getElementById('credit_list').disabled=false;	
	document.getElementById('agent_list').disabled=true;
	}
	function activeagent()
	{
	document.getElementById('agent_list').disabled=false;	
	document.getElementById('credit_list').disabled=true;	
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
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New Expenses - Daysheet </h6>
                        
					</div>
					<div class="widget_content"><div class="go_back"><h6><a href="daysheet.php">Go Back</a></h6></div>
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Pay Moode.<span class="req">*</span></label>
									<div class="form_input">
										 <input name="paymode" type="radio" value="Cash" id="noCheck"  onclick="javascript:yesnoCheck();" checked>Cash&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="paymode" type="radio" value="Cheque" onclick="javascript:yesnoCheck();"  id="yesCheck" >Cheque  / Net Banking / NEFT
									</div>
								</div>
								</li>
                          
                           
                           <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Type.<span class="req">*</span></label>
									<div class="form_input">
									<input name="collection_status" id="collection_status" type="radio" value="0"   onclick="javascript:reciept();" class="disabled" >Reciept&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="collection_status" id="collection_status"type="radio" value="1" onclick="javascript:voucher();" class="disabled" >Voucher<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="collection_status" id="collection_transfer"type="radio" value="2" onclick="javascript:yesnoCheck();"  >Transfer-->
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Collection Date.<span class="req">*</span></label>
									<div class="form_input">
									 <?php /*<script>DateInput('collection_date', true, 'yyyy-mm-dd','<?php echo date('Y-m-d'); ?>')</script> */?>
									 <?php echo date('Y-m-d'); ?>
									</div>
								</div>
								</li>
                              <?php /*  <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Party<span class="req">*</span></label>
									<div class="form_input">
									<!--<input name="collection_party"  type="radio" value="0"  id="creditCheck"  onclick="javascript:activecrdit();"  disabled >Credit Client&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
									<input name="collection_party" type="radio" value="1"  id="agentCheck" onclick="javascript:activeagent();" >Agent
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Select Party<span class="req">*</span></label>
									<div class="form_input">
									<select name="agent_list" id="agent_list" disabled>
                                    <option>Select Any Agent</option>
                                    <?php $agnt = "select * from power_route where id <>".$_SESSION['route']." order by route_type,route";
									$agnt1 = mysqli_query($objConn,$agnt);
									while($agnt2 = mysqli_fetch_array($agnt1))
									{
										if($agnt2['route_type']==1)
										{
										?><option value="<?php echo $agnt2['id']?>"><?php echo $agnt2['route']?> [OWN]</option><?php 
										}
										if($agnt2['route_type']==0)
										{
										?><option value="<?php echo $agnt2['id']?>"><?php echo $agnt2['route']?></option><?php 
										}
									}
									?>
                                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select name="credit_list" id="credit_list" disabled><option>Select Any Credit Client</option>
                                    <?php $crdt = "select * from power_credit where id <>".$_SESSION['route'];
									$crdt1 = mysqli_query($objConn,$crdt);
									while($crdt2 = mysqli_fetch_array($crdt1))
									{
										?>
										
                                        <option value="<?php echo $crdt2['id']?>"><?php echo $crdt2['credit']?></option>
										<?php 

									 }
									?>
                                    </select>
									</div>
								</div>
								</li>*/?>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Particulars.<span class="req">*</span></label>
									<div class="form_input"><?php // echo $exp = "select * from power_expenses where route_id =".$_SESSION['route']?>
										<select name="particulars" id="particulars" onChange="take_value();">
                                        <option value="0">Select Any</option>
                                        <?php  $exp = "select * from power_expenses where route_id =".$_SESSION['route'];
										$exp1 =mysqli_query($objConn,$exp);
										while($exp2 = mysqli_fetch_array($exp1))
										{
											?><option value="<?php echo $exp2['amount'].'@'.$exp2['particulars']?>"><?php echo $exp2['particulars']?></option><?php
										}
										
										?>
                                        </select>
                                        
                                        
									</div>
								</div>
								</li>
                                
								
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Amount.<span class="req">*</span></label>
									<div class="form_input">
										<input type="text" name="collection_amt" id="collection_amt" value="" maxlength="100" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                                        <input type="hidden" name="particulars_detail" id="particulars_detail" value="" maxlength="100" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" >
                                        
									</div>
								</div>
								</li>
                                
								<?php /*<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Colletion Date.<span class="req">*</span></label>
									<div class="form_input">
										<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo date('Y-m-d'); ?>')</script>
									</div>
								</div>
								</li>*/?>
								<li>
                                                <div class="form_grid_12">
                                                    Cooments<span class="req">*</span>
                                                    <div class="form_input">
                                                     <input type="text" name="comments" id="comments" value="" maxlength="200" class="large">
                                                    </div>
                                                </div>
                                            </li>  
								<div id="ifYes" style="display:none;">
                                <li>
                                                <div class="form_grid_12">
                                                    Bank Name<span class="req">*</span>
                                                    <div class="form_input">
                                                      <input type="text" name="bank_name" id="bank_name" value="" maxlength="100" class="large" >
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form_grid_12">
                                                    Branch Name<span class="req">*</span>
                                                    <div class="form_input">
                                                     <input type="text" name="branch_name" id="branch_name" value="" maxlength="100" class="large">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form_grid_12">
                                                    Cheque Number<span class="req">*</span>
                                                    <div class="form_input">
                                                     <input type="text" name="chq_no" id="chq_no" value="" maxlength="100" class="large">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form_grid_12">
                                                    Cheque Date<span class="req">*</span>
                                                    <div class="form_input">
                                                     <input type="text" name="chq_date" id="chq_date" value="" maxlength="100" class="large">
                                                    </div>
                                                </div>
                                            </li>  
                                            
                                            
                                             
                                </div>
								<li>
								<div class="form_grid_12">
									<div class="form_input">
                                    <input type="hidden" name="fromdate" id="fromdate" value="<?php echo $_REQUEST['fromdate']?>" >
                                    <input type="hidden" name="todate" id="todate" value="<?php echo $_REQUEST['todate']?>" >
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