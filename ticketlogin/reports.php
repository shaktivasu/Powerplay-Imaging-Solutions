<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_POST['frmdate']))
{
$frmdate = $_POST['frmdate'];
}
if(isset($_POST['todate']))
{
$todate = $_POST['todate'];
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

<style type="text/css">

    #printable { display: none; }

    @media print
    {
		body {font-size: 12pt;}
		table, table td {
border: #000 solid 1px;
padding: 0px;
border-spacing: 0px;



}
    	.non-printable { display: none; }
		#non-printable { display: none; }
    	#printable { display: block; }
    }
    
        @media print {
            
            .page-break-before {
                page-break-before: always;
            }
           
            .page-break-after {
                page-break-after: always;
            }
        }
    </style>


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
function CenterWindow(windowWidth, windowHeight, windowOuterHeight, url, wname, features) {
    var centerLeft = parseInt((window.screen.availWidth - windowWidth) / 2);
    var centerTop = parseInt(((window.screen.availHeight - windowHeight) / 2) - windowOuterHeight);
 
    var misc_features;
    if (features) {
      misc_features = ', ' + features;
    }
    else {
      misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';
    }
    var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + centerLeft + ',top=' + centerTop + misc_features;
    var win = window.open(url, wname, windowFeatures);
    win.focus();
    return win;
  }
</script>
<style>.container {
  width:300px;height: 100%;
  padding: 20px;box-shadow:   rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}</style>
</head>
<body id="theme-default" class="full_block">

<div id="left_bar">
	
	
	<div id="sidebar" class="non-printable">
		<div id="secondary_nav">
			<?php include_once("menu.php");?>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left" id="non-printable" >
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
		<div class="header_right"   id="non-printable" >
			
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
						<span class="h_icon file_cabinet"></span>
						<h6>Reports</h6>
                        <div class="print" id="non-printable" onClick="window.print();"><h6>Print</h6></div>
					</div>
                    
					<div class="widget_content">
                    <form name="frm" id="frm" method="post" action="">
    <div class="arrow_box" id="non-printable">
    <table width="100%" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
     
      <tr>
        <td width="233" height="26" align="right" class="label_txt">From Date :&nbsp;&nbsp;</td>
        <td width="272" align="left" class="label_txt" style="text-transform:uppercase;">
          <script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date :&nbsp;&nbsp; </td>
        <td width="257" align="left" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="26" align="right" class="label_txt"></td>
        <td align="left" class="label_txt" style="text-transform:uppercase;"><span class="label_txt" style="text-transform:uppercase;">
          <input type="submit" class="btn_small btn_blue" name="Submit" value="Search">
        </span></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="233" height="26" align="right" class="label_txt"></td>
        <td width="272" align="left" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td width="161" align="right" class="label_txt">&nbsp;</td>
        <td width="257" align="center" class="label_txt">&nbsp;</td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table></div>
	</form>               

<div class="grid_12 container">
						  <h2>Ticket #114276</h2>
						  <table class="display">
						  <tr><td>Ticket Status:</td><td>closed</td>
						  <td>Name:</td><td>Right</td>
						  </tr>
						  <tr><td>Department:</td><td>Support</td>
						  <td>Email:</td><td>rightdevelopers@gmail.com</td></tr>
						  <tr><td>Subject:</td><td>Create Date:	Wednesday, February 7, 2024, 3:48 pm
	While accessing C Panel '503 Service not available' error messag</td>
							<td>Product:</td><td>Right</td></tr>
						  <tr><td>Managed Support:</td><td>Yes</td>
						  <td>Phone:</td><td>8754048210</td>
						  </tr>
						  </table>	
						  </div><span class="clear"></span>
                        <?php 
						if($_POST['Submit'] )
						{
							echo " <h2>My Ticket Details on ". date("d-M-Y",strtotime($frmdate))." To ".date("d-M-Y",strtotime($todate))."</h2><br>";
							?>
						
						
						<?php
					//Maximum of News & Events
					$luggage= mysqli_query($objConn,"SELECT 
    l.create_date,
    l.luggage_lrno,
    l.luggage_sender,
    l.luggage_sender_phone,
    l.luggage_reciever,
    l.luggage_reciever_phone,
    GROUP_CONCAT(lp.luggage_prd_name SEPARATOR ', ') AS products,
    GROUP_CONCAT(lp.luggage_qunty SEPARATOR ', ') AS quantities,
    r_from.route AS route_from,
    r_to.route AS route_to,
    l.luggage_fees,
    (l.luggage_charges + l.unloading_charges) AS handling_charges,
    ((l.luggage_charges + l.unloading_charges + l.luggage_fees) * 0.05) AS gst,
    (l.luggage_fees + l.luggage_charges + l.unloading_charges + ((l.luggage_charges + l.unloading_charges + l.luggage_fees) * 0.05)) AS total_amount,
    l.luggage_paymethod,
    l.luggage_status
FROM 
    power_ticket l
LEFT JOIN 
    power_ticket_prd lp ON l.luggage_lrno = lp.luggage_lrno
LEFT JOIN 
    power_route r_from ON l.luggage_from = r_from.id
LEFT JOIN 
    power_route r_to ON l.luggage_to = r_to.id
WHERE 
    l.create_date BETWEEN '".$frmdate."' AND '".$todate."'
    AND (l.luggage_to = ".$_SESSION['route']." OR l.luggage_from = ".$_SESSION['route'].")
GROUP BY 
    l.luggage_lrno
ORDER BY 
    l.create_date ASC");
	$i=1;
				   $cnt=0;
				   $tot_val=0;$sum_qty=0;
	while($luggage_row=mysqli_fetch_row($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						
						
				   <?php $i++;}?>
						
						
 						
						<?php $i++;
						}
						?>
                          
						
						<div class="grid_12 container">
						  
						  <table class="display badge_style b_high">
						  <tr  width="100%"><td >Wednesday, July 3, 2024, 10:54 am</td></tr>
						  <tr><td>Hi,

Mail quota exceeded 

Kindly advise what I do next.</td></tr>
						  </table>						  
	<br><br>
	
<table class="display badge_style b_done">
						 <tr ><td >Wednesday, July 3, 2024, 10:54 am</td></tr>
						  <tr><td>Hi,

Mail quota exceeded 

Kindly advise what I do next.</td></tr></tbody>
						  </table>	
	

											
						
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>