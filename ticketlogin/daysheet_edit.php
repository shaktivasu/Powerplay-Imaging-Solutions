<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


$sel = "select * from power_daysheet where id = ".$_REQUEST['id'];
$sel1 = mysqli_query($objConn,$sel);
$sel2 = mysqli_fetch_array($sel1);

//Add News & Events
if(isset($_POST['signupsubmit']))
{
		$ins = "update  power_daysheet  set create_date = '".$_POST['frmdate']."' where  id = ".$_POST['id'];
		$ins1 = mysqli_query($objConn,$ins);
	header("Location:daysheet.php?frmdate=".$_POST['fromdate']."&todate=".$_POST['frmdate']);

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

window.onunload = refreshParent;
    function refreshParent() {
		
        window.opener.location.reload();
		window.close();
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
										<?php echo $sel2['lr_no']?>
                                        
									</div>
								</div>
								</li>
                                 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Collection Amount.<span class="req">*</span></label>
									<div class="form_input">
										<?php echo $sel2['collection_amount']?>
                                        
									</div>
								</div>
								</li>
								 <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname"> Collection Type.<span class="req">*</span></label>
									<div class="form_input">
										<?php echo $sel2['collection_type']?>
                                        
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
                                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']?>" >
                                  
										<button id="signupsubmit" name="signupsubmit" type="submit" class="btn_small btn_blue"><span>EDIT</span></button>
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