<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if(isset($_POST['get_lr']))
{
$sel = "select * from power_ticket where luggage_lrno = '".$_REQUEST['lr_no']."'";
$sel1 = mysqli_query($objConn,$sel);
$sel2 = mysqli_fetch_array($sel1);
$sel3 = mysqli_num_rows($sel1);
}
//Add News & Events
if(isset($_POST['signupsubmit']))
{
	 $dup = "select * from power_daysheet where lr_no = '".$_POST['lr_no']."'";
	$dup1 = mysqli_query($objConn,$dup);
	$dup2 = mysqli_num_rows($dup1);
	if($dup2 ==0)
	{
		$sel = "select * from power_ticket where luggage_lrno = '".$_REQUEST['lr_no']."'";
		$sel1 = mysqli_query($objConn,$sel);
		$sel2 = mysqli_fetch_array($sel1);
		$collection_amount = $sel2['luggage_fees']+$sel2['luggage_charges']+$sel2['luggage_doordelivery']+$sel2['luggage_doorcharges']+$sel2['unloading_charges'];
		echo $ins = "insert into power_daysheet (lr_no,route_id,collection_type,collection_amount,collection_mode,collection_status,collection_flag,create_date) values ('".$sel2['luggage_lrno']."','".$sel2['luggage_to']."','".$sel2['luggage_paymethod']."','".$collection_amount."','Cash',0,0,'".$_POST['frmdate']."')";
$ins1 = mysqli_query($objConn,$ins);
    ?>
	<script>
        window.opener.location.reload();
		window.close();
    </script>
	
	<?php
	//header("Location:daysheet.php?frmdate=".$_POST['fromdate']."&todate=".$_POST['frmdate']);
	}
	else
	header("Location:daysheet_add.php?msg=already");

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

<div id="container">
	
	
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Edit  - Daysheet Date </h6>
                        
					</div>
					<div class="widget_content"><div class="go_back"><h6><a href="daysheet.php">Go Back</a></h6></div>
						<form id="signupform" name="signupform"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Lr No.<span class="req">*</span></label>
									<div class="form_input">
										<input type="text" name="lr_no" value="<?php echo $_POST['lr_no']?>">
                                        
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									
									<div class="form_input">
										 <button id="get_lr" name="get_lr" type="submit" class="btn_small btn_blue"><span>GET</span></button>
                                        
									</div>
								</div>
								</li>
                               <?php if($sel3>0){?>
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Sender<span class="req">*</span></label>
									<div class="form_input">
										<?php echo $sel2['luggage_sender'].' & '.$sel2['luggage_sender_phone']; ?>
                                        
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Reciever<span class="req">*</span></label>
									<div class="form_input">
										<?php echo $sel2['luggage_reciever'].' & '.$sel2['luggage_reciever_phone']; ?>
                                        
									</div>
								</div>
								</li>
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> From & To<span class="req">*</span></label>
									<div class="form_input">
                                <?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$sel2['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?>To <?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$sel2['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></div>
								</div>
								</li>
								 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Collection Type.<span class="req">*</span></label>
									<div class="form_input">
										<?php echo $sel2['luggage_paymethod']?>
                                        
									</div>
								</div>
								</li>
								
                                
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Colletion Date.<span class="req">*</span></label>
									<div class="form_input">
										<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $sel2['create_date']; ?>')</script>
									</div>
								</div>
								</li>
								
								
								<li>
								<div class="form_grid_12">
									<div class="form_input">
                                    <input type="hidden" name="id" id="id" value="<?php echo $sel2['id']?>" >
                                  
										<button id="signupsubmit" name="signupsubmit" type="submit" class="btn_small btn_blue"><span>ADD</span></button>
									</div>
								</div>
								</li>
                                
                                <?php 
							   }
							  
								?>
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