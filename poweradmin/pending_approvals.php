<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_REQUEST['frmdate']))
{
$frmdate = $_REQUEST['frmdate'];
}
if(isset($_REQUEST['todate']))
{
$todate = $_REQUEST['todate'];
}

$route_id_get = $_REQUEST['route_id'];
$routestr='';

if(isset($_POST['DELIVERED']))
{
	$count=(isset($_POST['undel']))?$_POST['undel']:NULL; 
$count1=count($count);
for($i=0;$i<=$count1;$i++)
{
	if(isset($_POST['undel'][$i]) && $_POST['undel'][$i] != '') {
		
		
		 	 $up = "update power_transfer set collection_status =0,collection_date='".$_POST['collection_date']."',bank_deposit=".$_POST['bank_deposit']." where id = ".$_POST['undel'][$i];
		 	$up1 = mysqli_query($objConn,$up);
	}
}
header("location:accounts_kmp.php?frmdate=".$_POST['frmdate']."&todate=".$_POST['todate']);
}
	?>


<!DOCTYPE HTML>
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
<script>
         function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
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
				<img src="images/logo.png" alt="Kmp Travels">
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
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><span><a href="logout.php"><strong>Logout</strong></a> </span></li>
                    
                    
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
						<h6>Day Sheet Entry</h6>
                        <!--<div class="print"><h6>Print</h6></div>-->
					</div>
                    <form name="frm" id="frm" method="post" action="">
					<div class="widget_content">
                          
                    
	
 
    
                        
                        
                        
                       
                       
                        <div align="right">
                       <input type="submit"  class="btn_small btn_blue" name="DELIVERED" value="Click here to clear">
                         </div><br>
    
    
    
    
						<table class="display">
						<thead>
                         <tr>
                        <td colspan="9" align="left" valign="middle" bgcolor="#F9C6F1"><h2>TRANSFER ENTRIES</h2></td>
                        </tr>
						<tr>
							<th align="center">Sl No</th>
                            <th align="left">Create Date</th>
                            <th align="left">Mode</th>
                            <th align="left">Bank</th>
                            <th align="left">Particulars</th>
 							<th align="right">Debit (Rs.)</th>
							 <th align="right">Credit (Rs.)</th>
                            
						</tr>
						</thead>
						<tbody>
                         
                            
                            
                           <tr><td colspan="5"><strong>Transfer History</strong></tr> 
                            <?php $i=1;
					//echo "select * from power_transfer where  collection_date between  '".$frmdate."' and '".$todate."'     and collection_date >= '2021-02-28' and route_id = '".$route_id_get."' and collection_status =1      order by collection_date";
						   $transfer_row=mysqli_query($objConn,"select * from power_transfer where  collection_date between  '".$frmdate."' and '".$todate."'     and collection_date >= '2021-02-28' and route_id = '".$route_id_get."' and collection_status =1      order by collection_date") or die("Collection error:".mysql_error());
						   $cnt=0;
						   while($transfer_row1=mysqli_fetch_array($transfer_row))
						   {
							   $cnt++;
							   $css_set=$cnt%2;
							   
						   ?>
								
								<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
									<td  class="center"><?php echo $i."."; ?></td>
									<td class="center"><?php  
									//echo date('d-M-Y', strtotime($transfer_row1['collection_date']));
									
									?><script>DateInput('collection_date', true, 'yyyy-mm-dd','<?php echo $transfer_row1['collection_date']; ?>')</script></td>
                                    <td  align="left"><?php echo $transfer_row1['collection_mode'];?></td>
                                    <td  align="left">
									<select name="bank_deposit">
                                    
									<?php 
									 $bank_row=mysqli_query($objConn,"select * from power_bank where bank_status =0  order by bank") or die("bank error:".mysql_error());
									 while($bank_row1=mysqli_fetch_row($bank_row))
									 {
										 echo "<option value=".$bank_row1[0].">".$bank_row1[1]."</option>";
									 }
									
									?></td>
									<td  align="left"><?php echo $transfer_row1['particulars'];?></td>
									<td  align="right">
									<?php 
									
									echo number_format($transfer_row1['collection_amount'],2);
									if($transfer_row1['collection_status']==1) 
									echo " <span style=color:red;>[UCB]</span>";
									else 
									$total_debit +=$transfer_row1['collection_amount']; 
									?>
									</td>
									<td  align="right"><input type="checkbox" checked name="undel[]" value="<?php echo $transfer_row1['id']?>">
                                    <input type="hidden" checked name="frmdate" value="<?php echo $frmdate?>">
                                    <input type="hidden" checked name="todate" value="<?php echo $todate?>"></td>
									</tr>
							<?php $i++;
						   
						   }?>   
                           
                             </table>
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    
                        
					</div></form>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>