<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if(isset($_REQUEST['vehicle']))
{
	$_SESSION['route_to']='';
}

if($_REQUEST['lrno']!="")
{

  $lrno=trim($_REQUEST['lrno']);

 $chk = "select * from power_ticket where luggage_lrno = '".$lrno."' and luggage_status = 'New Arrival'";
$chk1= mysqli_query($objConn,$chk);
$chk3= mysqli_fetch_array($chk1);
$chk2= mysqli_num_rows($chk1);
if($chk2>0)
{
  $excess = "select * from power_user_route where user_id = ".$_REQUEST['route_to']." and route_id = ".$chk3['luggage_to'];
$excess1= mysqli_query($objConn,$excess);
$excess2= mysqli_num_rows($excess1); 

if($excess2==0)
{
  $ins = "insert into power_outscan (luggage_lrno,veh_id,route_to,qty,create_date,luggage_status,trip_status) values ('".$lrno."','".$_REQUEST['vehicle']."','".$_REQUEST['route_to']."',1,'".date("Y-m-d H:i:s")."','Excess','".$_SESSION['trip_status']."')";

}
else{
 echo $ins = "insert into power_outscan (luggage_lrno,veh_id,route_to,qty,create_date,luggage_status,trip_status) values ('".$lrno."','".$_REQUEST['vehicle']."','".$_REQUEST['route_to']."',1,'".date("Y-m-d H:i:s")."','Shortage','".$_SESSION['trip_status']."')";	

}

$ins1 = mysqli_query($objConn,$ins);
$luggage_prd = "select luggage_qunty from power_ticket_prd where luggage_lrno = '".$lrno."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_fetch_row($luggage_prd1);
							echo $luggage_scan = "select count(*) from power_outscan where luggage_lrno = '".$lrno."' and  luggage_status <> 'Excess'  ";
							$luggage_scan1 = mysqli_query($objConn,$luggage_scan);
							$luggage_scan_rows = mysqli_fetch_row($luggage_scan1);
						
if($luggage_scan_rows[0]==$luggage_prd_rows[0])
							{
								 $up = "update power_ticket set luggage_status = 'Dispatched' where luggage_lrno = '".$lrno."'";
								 $up1 = mysqli_query($objConn,$up);
								  $up = "update power_outscan set luggage_status = 'Cleared',trip_status='Existing' where luggage_lrno = '".$lrno."'";
								 $up1 = mysqli_query($objConn,$up);
							}
$msg=1;
//header("location:luggage_outscan.php?vehicle=".$_REQUEST['vehicle']."&lrno=".$_REQUEST['lrno']."&msg=".$msg);exit;
}
else {$msg=0;
//header("location:luggage_outscan.php?vehicle=".$_REQUEST['vehicle']."&lrno=".$_REQUEST['lrno']."&msg=".$msg);exit;
}
header("location:luggage_outscan.php");
}
if(isset($_POST['Add']) || isset($_REQUEST['vehicle']))
{
	$_SESSION['vehicle']=$_REQUEST['vehicle'];
	$_SESSION['route_to']=$_REQUEST['route_to'];
	$_SESSION['trip_status']=$_REQUEST['trip_status'];
	if($_REQUEST['trip_status']=='New')
	{
		$sel = "update power_outscan set trip_status= 'Closed' where veh_id = ".$_SESSION['vehicle']." and route_to = ".$_SESSION['route_to']." and  DATE(create_date) = CURDATE() ";
		$sel1 = mysqli_query($objConn,$sel);
	}
	header("location:luggage_outscan.php");
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




<

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
			<div id="top_notification">
				<div class="time">	<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  const barcodeInput = document.getElementById('lrno');
  const barcodeForm = document.getElementById('frm');
  const vehicle = document.getElementById('vehicle');
  const route_to = document.getElementById('route_to');
  const expectedBarcodeLength = 11; // Adjust this according to your barcode length

  // Function to update date and time every 50ms
  function updateDateTime() {
    const dateTimeElement = document.getElementById('date-time');
    if (dateTimeElement) {
      dateTimeElement.textContent = new Date().toLocaleString();
    }
  }

  let debounceTimer;
const debounceDelay = 300; // Adjust delay as needed

barcodeInput.addEventListener('input', function() {
    if (isScanned) return; // Do nothing if already scanned

    const barcodeValue = barcodeInput.value.trim();
    if (barcodeValue.length >= expectedBarcodeLength && vehicle.value != 0 && route_to.value != 0) {
      barcodeForm.submit(); // Submit the form
      barcodeInput.disabled = true; // Disable the input field
	  barcodeInput.value = "";
      isScanned = true; // Set flag to prevent further processing
    } else {
      if (barcodeValue.length < expectedBarcodeLength) {
        alert("Barcode length is too short.");
      } else {
        alert("Check the filter search");
      }
    }
  });
});
</script>		</div>
			</div>
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
				<div class="widget_wrap" style="overflow:auto;">
					<div class="widget_top">
						<span class="h_icon create_write"></span>
						<h6>luggage Outscan </h6>
                       
					</div>
                    <div align="center"><h2 style="color:red;"><?php if($_REQUEST['msg']==1) echo 'Scanned Successfully.';if($_REQUEST['msg']==0) echo 'Please scan the Barcode LR No.';?></h2></div>
					<div class="widget_content">
                    <form name="frm" id="frm" method="post" action="">
    <div class="arrow_box">
    <table width="100%" class="arrow_box_content top_arrow">
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
	  <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Veh.No : </td>
        <td align="left" class="label_txt" style="text-transform:uppercase;">&nbsp;<select name="vehicle" id="vehicle" class="limiterBox" onchange="this.form.submit()">
          <option value="0">Select All</option>
          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											if($_SESSION['vehicle']==$vehicl1['id'])
											echo "<option value=".$vehicl1['id']." selected>".$vehicl1['vehicle']."</option>";
											else
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
        </select></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
	  
	  <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
						<?php 
							$trip = "select count(*) from power_outscan where veh_id = '".$_SESSION['vehicle']."' and  DATE(create_date) = CURDATE()  ";
							$trip1 = mysqli_query($objConn,$trip);
							$trip2 = mysqli_fetch_row($trip1);	 
							if($trip2[0]>0)
							{								
						?>
	  <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Route : </td>
        <td align="left" class="label_txt" style="text-transform:uppercase;">&nbsp;
		<?php if($_SESSION['trip_status']=='New'){?>
		<input type="radio" name="trip_status" id="trip_status" value="New" onclick="this.form.submit()" checked>&nbsp;New
		<input type="radio" name="trip_status" id="trip_status" value="Existing"  onclick="this.form.submit()">&nbsp;Existing
		<?php }elseif($_SESSION['trip_status']=='Existing'){?>
		<input type="radio" name="trip_status" id="trip_status" value="New" onclick="this.form.submit()">&nbsp;New
		<input type="radio" name="trip_status" id="trip_status" value="Existing"  onclick="this.form.submit()" checked>&nbsp;Existing
		<?php }else{?>
		<input type="radio" name="trip_status" id="trip_status" value="New" onclick="this.form.submit()">&nbsp;New
		<input type="radio" name="trip_status" id="trip_status" value="Existing"  onclick="this.form.submit()">&nbsp;Existing
		<?php
		}?>
		
		</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="left" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
							</tr><?php }?>
      <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Select Route : </td>
        <td align="left" class="label_txt" style="text-transform:uppercase;">&nbsp;
		<select name="route_to" id="route_to" class="limiterBox" tabindex="2">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_user where user_status=0 order by user_id");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_SESSION['route_to']==$route1['id'])
											echo "<option value=".$route1['id']." selected>".$route1['user_id']."</option>";
											else
											echo "<option value=".$route1['id'].">".$route1['user_id']."</option>";	
										}
										
										?>
                        </select>&nbsp;<input type="submit" class="btn_small btn_blue" name="Add" value="ADD">
		</td>
        <td align="right" class="label_txt"></td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
	  
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      <?php if(isset($_SESSION['vehicle']) && isset($_SESSION['route_to']))
					{?>
      <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Scan LR NO : </td>
        <td align="left" class="label_txt" style="text-transform:uppercase;">&nbsp;<input type="text" name="lrno" id="lrno" placeholder="Scan barcode here" autofocus></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
					<?php }?>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table>
	</div>
	</form>
	
						

                    
					<div class="widget_content">
					<?php if(isset($_SESSION['vehicle']))
					{?>
                
				 <?php /*<h6 class="inline_code">Ready for Dispatch : Vehicle Wise -
						<?php  
						$vecstr = '';
						if($_REQUEST['vehicle']=='all' || $_REQUEST['vehicle']== '')
						{
							echo "ALL";
							$vecstr = ' and luggage_to = '.$_SESSION['route'].'';
						}
						else
						{
							$vehname =mysqli_fetch_row(mysqli_query($objConn,'select vehicle from power_vehicle where id ='.$_REQUEST['vehicle']));
							echo $vehname[0];
							$vecstr =' and luggage_vehicle = "'.$_REQUEST['vehicle'].'" and luggage_to = '.$_SESSION['route'].'';
						}
							if($_REQUEST['lrno']!='')
							{
								$route_nme = mysqli_query($objConn,"select user_id from power_user where id= ".$_REQUEST['route_to']);
								$route_nme1 = mysqli_fetch_array($route_nme);
								echo '<span class="yellow_pro"> ( HUB : '.$route_nme1[0].' )</span>';
								
								$vecstr .= ' and (luggage_lrno = "'.$_REQUEST['lrno'].'" or  luggage_sender_phone = "'.$_REQUEST['lrno'].'" or luggage_reciever_phone = "'.$_REQUEST['lrno'].'")';
							}	
								?></h6>
					</h6><br>
<br>*/?>
                        
                        
	
						<table class="display">
						<thead>
						<tr><th colspan="12" style="color:red">Shortage Entries</th></tr>
						</thead>
						<thead>
						<tr>
						  
							<th>
								 Sl No
							</th>
							<th>Booking Date</th><th width="7%">Dispatched Date</th>
                            <th >LR No.</th>
                            <th>Sender Name &amp; Phone No.</th>
                            <th>Reciever Name &amp; Phone No.</th>
							<th>
								 Pending Qty
							</th>
							<th>From</th>
							<th>Actual Route To</th>
							<th>Connecting Route To</th>
							<th>Veh. No</th>
							<th>
								Paid / <br> To Pay
							</th>
							<th>Luggage Status</th>
							<?php /*?><th width="18%">
								 Action
							</th><?php */?>
						</tr>
						</thead>
						
						<tbody>
						
						
						
						
                          <?php
                 	 
					 $luggage_outscan=mysqli_query($objConn,"select * from power_outscan where DATE(create_date) = CURDATE() and  luggage_status = 'Shortage' and veh_id = ".$_SESSION['vehicle']." order by create_date desc") or die("Vehicle error:".mysql_error());
					 
					
					
					
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="18" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_outscan1=mysqli_fetch_array($luggage_outscan))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							$luggage = mysqli_query($objConn,"select * from power_ticket where luggage_lrno = '".$luggage_outscan1['luggage_lrno']."'");
							$luggage_row = mysqli_fetch_array($luggage);
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
						  
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center">
							<?php if($luggage_outscan1['create_date']!=NULL) echo date('d-M-Y H:i:s',strtotime($luggage_outscan1['create_date'])); else echo 'Nil'; ?></td>
							
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select luggage_qunty from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_fetch_row($luggage_prd1);
							 $luggage_scan = "select count(*) from power_outscan where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_scan1 = mysqli_query($objConn,$luggage_scan);
							$luggage_scan_rows = mysqli_fetch_row($luggage_scan1);
							echo '<strong>'.($luggage_prd_rows[0]-$luggage_scan_rows[0]).' / '.$luggage_prd_rows[0].'</strong>';
							?></td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$act_routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $act_routeto1 = $act_routeto[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select user_id from  power_user where id = ".$luggage_outscan1['route_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php 
							$vehicle = mysqli_fetch_row(mysqli_query($objConn,"select vehicle from power_vehicle where id = ".$luggage_outscan1['veh_id']));
							echo $vehicle1 = $vehicle[0];
							
							?></td>
							
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
							<?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_confirmed"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" <?php echo $cls;?>>
                             <?php if($luggage_row['luggage_status']=='Inward'){?>
							<a href="#" onclick="return CenterWindow(500,500,50,'print_delivery.php?id=<?php echo $luggage_row['id']; ?>')"><img src="images/print.png"/></a>
							<?php  }
							echo $luggage_row['luggage_status'];
							?></td>
							
						</tr>
                        
						<?php $i++;} } ?>
						</table>
						
						
						<table class="display">
						<thead>
						<tr><th colspan="12" style="color:red">Excess Entries</th></tr>
						</thead>
						<thead>
						<tr>
						  
							<th>
								 Sl No
							</th>
							<th>Booking Date</th><th width="7%">Dispatched Date</th>
                            <th >LR No.</th>
                            <th>Sender Name &amp; Phone No.</th>
                            <th>Reciever Name &amp; Phone No.</th>
							<th>
								 Excess Qty
							</th>
							<th>From</th>
							<th>Actual Route To</th>
							<th>Connecting Route To</th>
							<th>Veh. No</th>
							<th>
								Paid / <br> To Pay
							</th>
							<th>Luggage Status</th>
							<?php /*?><th width="18%">
								 Action
							</th><?php */?>
						</tr>
						</thead>
						
						<tbody>
						
						
						
						
                          <?php
                 	 
					 $luggage_outscan=mysqli_query($objConn,"select * from power_outscan where DATE(create_date) = CURDATE() and luggage_status = 'Excess'  and veh_id = ".$_SESSION['vehicle']."  order by create_date desc") or die("Vehicle error:".mysql_error());
					 $luggage_num=mysqli_num_rows($luggage_outscan);
					
					
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="18" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_outscan1=mysqli_fetch_array($luggage_outscan))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							$luggage = mysqli_query($objConn,"select * from power_ticket where luggage_lrno = '".$luggage_outscan1['luggage_lrno']."'");
							$luggage_row = mysqli_fetch_array($luggage);
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
						  
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center">
							<?php if($luggage_outscan1['create_date']!=NULL) echo date('d-M-Y H:i:s',strtotime($luggage_outscan1['create_date'])); else echo 'Nil'; ?></td>
							
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select luggage_qunty from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_fetch_row($luggage_prd1);
							 $luggage_scan = "select count(*) from power_outscan where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_scan1 = mysqli_query($objConn,$luggage_scan);
							$luggage_scan_rows = mysqli_fetch_row($luggage_scan1);
							echo '<strong>'.($luggage_prd_rows[0]-$luggage_scan_rows[0]).' / '.$luggage_prd_rows[0].'</strong>';
							?></td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$act_routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $act_routeto1 = $act_routeto[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select user_id from  power_user where id = ".$luggage_outscan1['route_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php 
							$vehicle = mysqli_fetch_row(mysqli_query($objConn,"select vehicle from power_vehicle where id = ".$luggage_outscan1['veh_id']));
							echo $vehicle1 = $vehicle[0];
							
							?></td>
							
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
							<?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_confirmed"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" <?php echo $cls;?>>
                             <?php if($luggage_row['luggage_status']=='Inward'){?>
							<a href="#" onclick="return CenterWindow(500,500,50,'print_delivery.php?id=<?php echo $luggage_row['id']; ?>')"><img src="images/print.png"/></a>
							<?php  }
							echo $luggage_row['luggage_status'];
							?></td>
							
						</tr>
                        
						<?php $i++;} } ?>
						</table>
						<br>
						
						<table class="display">
						<thead><tr><th colspan="12" style="color:red">Dispatched Entries</th></tr></thead>
						<thead>
						<tr>
								<th>Sl No</th>
								<th>Booking Date</th>
								<th>Dispatched Date</th>
								<th>LR No.</th>
								<th>Sender Name & Phone No.</th>
								<th>Receiver Name & Phone No.</th>
								<th>Qty</th>
								<th>From</th>
								<th>To</th>
								<th>Veh. No</th>
								<th>Paid / To Pay</th>
								<th>Luggage Status</th>
							</tr>
						
						<?php
						
						 $luggage_outscan=mysqli_query($objConn,"select * from power_outscan where DATE(create_date) = CURDATE()  and veh_id = ".$_SESSION['vehicle']." and trip_status='Existing'  order by route_to") or die("Vehicle error:".mysql_error());
					 $luggage_num=mysqli_num_rows($luggage_outscan);
					
					
					if($luggage_num==0)
					{
                    ?>
					<table class="display">
							
                        <tr>
                        <td colspan="18" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
						
                   <?php
				   }
				   else
				   {
				   
					$grouped_data = [];
					while ($row = mysqli_fetch_assoc($luggage_outscan)) {
						$route_to = $row['route_to'];
						if (!isset($grouped_data[$route_to])) {
							$grouped_data[$route_to] = [];
						}
						$grouped_data[$route_to][] = $row;
					}

					foreach ($grouped_data as $route_to => $records) {
						// Get the route name
						$route_name_result = mysqli_query($objConn, "SELECT user_id FROM power_user WHERE id = $route_to");
						$route_name_row = mysqli_fetch_row($route_name_result);
						$route_name = $route_name_row[0];
						?>
						
						
						<thead><tr><th colspan="12" style="color:red">Connecting Hub: <?php echo $route_name; ?></th></tr></thead>
							
							<tbody>
								<?php
								$i = 1;
								foreach ($records as $record) {
									$luggage = mysqli_query($objConn,"SELECT * FROM power_ticket WHERE luggage_lrno = '".$record['luggage_lrno']."'");
									$luggage_row = mysqli_fetch_array($luggage);
									$css_set = $i % 2;
									?>
									<tr <?php if ($css_set == 0) echo "class='gradeX'"; else echo "class='gradeC'"; ?>>
										<td align="center"><?php echo $i."."; ?></td>
										<td align="center"><?php echo date('d-M-Y', strtotime($luggage_row['create_date']));?></td>
										<td align="center"><?php if ($record['create_date'] != NULL) echo date('d-M-Y H:i:s', strtotime($record['create_date'])); else echo 'Nil'; ?></td>
										<td align="center"><?php echo $luggage_row['luggage_lrno']; if($luggage_row['luggage_ref'] != 0) { echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>"; } ?></td>
										<td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
										<td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
										<td align="center">
											<?php 
											$luggage_prd = "SELECT luggage_qunty FROM power_ticket_prd WHERE luggage_lrno = '".$luggage_row['luggage_lrno']."'";
											$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
											$luggage_prd_rows = mysqli_fetch_row($luggage_prd1);
											$luggage_scan = "SELECT COUNT(*) FROM power_outscan WHERE luggage_lrno = '".$luggage_row['luggage_lrno']."'";
											$luggage_scan1 = mysqli_query($objConn,$luggage_scan);
											$luggage_scan_rows = mysqli_fetch_row($luggage_scan1);
											$ff = $luggage_prd_rows[0] - $luggage_scan_rows[0];
											if ($ff == 0) echo '<strong>'.($luggage_prd_rows[0]).' / '.$luggage_prd_rows[0].'</strong>';
											else echo '<strong>'.$ff.' / '.$luggage_prd_rows[0].'</strong>';
											?>
										</td>
										<td align="center">
											<?php 
											$routefrom = mysqli_fetch_row(mysqli_query($objConn,"SELECT route FROM power_route WHERE id = ".$luggage_row['luggage_from']));
											echo $routefrom1 = $routefrom[0];
											?>
										</td>
										<td align="center">
											<?php 
											$act_routeto = mysqli_fetch_row(mysqli_query($objConn,"SELECT route FROM power_route WHERE id = ".$luggage_row['luggage_to']));
											echo $act_routeto1 = $act_routeto[0];
											?>
										</td>
										<td align="center">
											<?php 
											$vehicle = mysqli_fetch_row(mysqli_query($objConn,"SELECT vehicle FROM power_vehicle WHERE id = ".$record['veh_id']));
											echo $vehicle1 = $vehicle[0];
											?>
										</td>
										<td align="center">
											<?php 
											    echo $luggage_row['luggage_paymethod'];
											?>
										</td>
										<?php 
											if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
											if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_confirmed"';
											if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
											if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
											if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
											?>
											<td align="center" <?php echo $cls;?>>
											 <?php echo $luggage_row['luggage_status'];
											?></td>
										
									</tr>
								<?php 
								$i++;	
								} 
								?>
							
						<br><br>
					<?php 
					}
					}
					?>
						</tbody>
						</table>
                        
                       
					<?php }?>
						  
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>