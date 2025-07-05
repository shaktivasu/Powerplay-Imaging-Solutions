<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


//Add News & Events
if(isset($_POST['signupsubmit']))
{
	
	$create_date = $_POST['collection_date'];
	
	$collection_amt = $_POST['collection_amt'];
	$particulars = $_POST['particulars'];
	
	$comments = $_POST['comments'];
	
	
	
	
	
	if($_POST['paytype']=='Voucher'){
		$create_date = $_POST['frmdate'];
	  $news_ins = "INSERT INTO power_expenses (route_id,particulars,amount,  create_date) VALUES('".$_POST['agent_list']."','".$comments."','".$collection_amt."','".$create_date."')";
		$news_ins1 = mysqli_query($objConn,$news_ins);
		header("Location:expenses_list.php");
	}
		
		if($_POST['paytype']=='Reciept'){
	
	
		 $news_ins = "INSERT INTO power_collections_ho (route_id,particulars,collection_amount,  collection_date,bank_name,branch_name,chq_no,chq_date) VALUES('".$_POST['agent_list']."','".$comments."','".$collection_amt."','".$create_date."','".$_POST['bank_name']."','".$_POST['branch_name']."','".$_POST['chq_no']."','".$_POST['chq_date']."')";
		$news_ins1 = mysqli_query($objConn,$news_ins);
	header("Location:reports_reciept.php");
	}
	
	
	
	
	
	
	
	
	
	

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
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = ''; 
    } else {
        document.getElementById('ifYes').style.display = 'none';
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
			<div class="grid_12">
				<div class="widget_wrap"> <div align="right"> <div  class="btn_40_blue ucase"><a href="reports_reciept.php"><span class="icon finished_work_sl"></span><span>Go Back</span></a><br></div></div>
                       <div class="clearfix"></div>
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6 style="color:red;">Add New Collections - Agent / Add New Expenses - Own Agent </h6>
                      
					</div>
					<div class="widget_content">
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            
                            
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Tupe.<span class="req">*</span></label>
									<div class="form_input">
                                    <?php if($_POST['paytype']=='Voucher'){?>
										 <input name="paytype" type="radio" value="Voucher" onclick="this.form.submit();"  checked>Voucher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="paytype" type="radio" value="Reciept" onclick="this.form.submit();"  id="yesCheck" >Reciept
                                         <?php } elseif($_POST['paytype']=='Reciept')
										 {
											 ?>
											 <input name="paytype" type="radio" value="Voucher" onclick="this.form.submit();">Voucher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="paytype" type="radio" value="Reciept" onclick="this.form.submit();"  id="yesCheck"   checked>Reciept
											 
											 <?php
										 }
										 else
										 {?>
										  <input name="paytype" type="radio" value="Voucher" onclick="this.form.submit();">Voucher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="paytype" type="radio" value="Reciept" onclick="this.form.submit();"  id="yesCheck">Reciept
										 <?php
										 }?>
									</div>
								</div>
								</li>
                            
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Pay Moode.<span class="req">*</span></label>
									<div class="form_input">
										 <input name="paymode" type="radio" value="Cash" id="noCheck"  onclick="javascript:yesnoCheck();" checked>Cash
                                         <?php if($_POST['paytype']!='Voucher'){?>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="paymode" type="radio" value="Cheque" onclick="javascript:yesnoCheck();"  id="yesCheck" >Cheque  / Net Banking / NEFT
                                         <?php } ?>
									</div>
								</div>
								</li>
                           
                            <?php if($_POST['paytype']!='Voucher'){?>
                           <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Collection Date.<span class="req">*</span></label>
									<div class="form_input">
									 <script>DateInput('collection_date', true, 'yyyy-mm-dd','<?php echo date('Y-m-d'); ?>')</script>  
									</div>
								</div>
								</li>
                                <?php } ?>
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Select Party<span class="req">*</span></label>
									<div class="form_input">
									<select name="agent_list" id="agent_list">
                                    <option>Select Any Agent</option>
                                    <?php $agnt = "select * from power_route  order by route";
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
                                    
									</div>
								</div>
								</li>
                                
                               
                                
                                
								
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Payable Amount.<span class="req">*</span></label>
									<div class="form_input">
										<input type="text" name="collection_amt" id="collection_amt" value="" maxlength="100" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                                        <input type="hidden" name="particulars_detail" id="particulars_detail" value="" maxlength="100" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" >
                                        
									</div>
								</div>
								</li>
                                
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Create Date.<span class="req">*</span></label>
									<div class="form_input">
										<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo date('Y-m-d'); ?>')</script>
									</div>
								</div>
								</li>
								<li>
                                                <div class="form_grid_12">
                                                    Comments<span class="req">*</span>
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