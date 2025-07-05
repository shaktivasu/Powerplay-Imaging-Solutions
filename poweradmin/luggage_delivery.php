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
if($_REQUEST['news']=="del")
{
$id=$_GET['event_id'];
$del_news=mysqli_query($objConn,"update power_luggage set luggage_status = 'Cancelled'  where id=".$id."") or die("Delete News Error:".mysql_error());
header("location:luggage.php?msg=3");
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
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Are you sure you want to delete the data ";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
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
				<div class="widget_wrap" style="overflow:auto">
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>luggage Pending Delivery </h6>
                        
					</div>
                    
					<div class="widget_content">
                    
                    
								
    
   <form name="frm" id="frm" method="post" action="">
    <div class="arrow_box">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="233" height="26" align="right" class="label_txt">From Date :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date : </td>
        <td width="257" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt"></td>
      </tr>
      <tr>
        <td height="26" align="right" class="label_txt">Select Any Agent</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">
		<?php /*<input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>">*/?>
		<select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">ALL</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0 and (route_nature = 'Booking & Delivery' or route_nature = 'Delivery') order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_POST['route_to']!=$route1['id'])
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										    else
											echo "<option value=".$route1['id']." selected>".$route1['route']."</option>";	
										}
										
										?>
                        </select>
		</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td align="center" class="label_txt"></td>
      </tr>
      <?php /*?><tr>
        <td height="26" align="right" class="label_txt">Vehicle:</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><select name="vehicle" class="limiterBox">
          <option value="all">Select All</option>
          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											if($_POST['vehicle']==$vehicl1['id'])
											echo "<option value=".$vehicl1['id']." selected>".$vehicl1['vehicle']."</option>";
											else
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
        </select></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr><?php */?>
      <tr>
       <td colspan="5"></td>
      </tr>
      
    </table>
</div>
	</form>

								
							
                    
                    
                    
	
						<?php /*?><h6 class="inline_code">luggage Booking : Vehicle Wise -
						<?php  
						$vecstr = '';
						if($_POST['vehicle']=='all' || $_POST['vehicle']== '')
						{
							echo "ALL";
							$vecstr = '';
						}
						else
						{
							$vehname =mysqli_fetch_row(mysqli_query($objConn,'select vehicle from power_vehicle where id ='.$_POST['vehicle']));
							echo $vehname[0];
							$vecstr =' and luggage_vehicle = "'.$_POST['vehicle'].'"';
						}
								
								?> [ <?php echo date('d-M-Y',strtotime($frmdate)).' To '.date('d-M-Y',strtotime($todate));?> ] </h6><?php */?>
					</div>
                    
                    <br>
					<br>

                    
					<div class="widget_content">
                    
                  <?php 
				  
				  
				  if($_POST['route_to']!=0)
				  {
					 ?>
					 
					 <table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<th width="21%">
								 Particular
							</th>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Luggage Charges</th>
							<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>
							<th width="7%">Total Amount</th>
							<th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Luggage Status</th>
							<?php /*?><th width="18%">
								 Action
							</th>
<?php */?>						</tr>
						</thead>
						<tbody>
                          <?php
					//Maximum of News & Events
					//echo "select * from power_luggage where  luggage_to = ".$routewise3[0]." and luggage_status = 'Dispatched'  and create_date between  $frmdate and $todate";
					 
					 
					 
                       $luggage=mysqli_query($objConn,"select * from power_luggage where  luggage_to='".$_POST['route_to']."' and luggage_status = 'Inward'  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());					 
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="15" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                            <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" valign="middle" <?php echo $cls;?>><?php echo $luggage_row['luggage_status']?></td>
							<?php /*?><td align="center" class="center">
							<span>
                           <a href="luggage_edit.php?id=<?php echo $luggage_row['id']; ?>" title="Edit"><img src="images/edit.png"/></a></span>
                            <span><a href="luggage.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span>
							</td>
<?php */?>						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?><tr><td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Paid Amount : 
                        <?php 
						
						 echo $paid_amt ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo $topay_amt; 
						 ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php 
						echo $credit_amt;?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Amount : 
						<?php echo $tot_amt1 =$paid_amt +$topay_amt+$credit_amt;?></strong></td>
                        </tr><?php }?>
						</tbody>
						</table>
					 <?php 
					  
				  }
				  else
				  {
				   //$routewise = "select * from power_route where id in (select luggage_to from power_luggage where create_date>='".$frmdate."' and create_date<='".$todate."' $vecstr".")";
				   $routewise = "select * from power_route where id in (select luggage_to from power_luggage)";
				  $routewise1 = mysqli_query($objConn,$routewise);
				   $routewise2 = mysqli_num_rows($routewise1);
				  if($routewise2>0)
				  {
					while($routewise3 = mysqli_fetch_array($routewise1))
					{
				  ?>
						<h6 class="inline_code"><?php echo $routewise3['route']?></h6><br><br>
                        
                        
                        
	
						
						<table class="display">
						<thead>
						<tr>
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<th width="21%">
								 Particular
							</th>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Luggage Charges</th>
							<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>
							<th width="7%">Total Amount</th>
							<th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Luggage Status</th>
							<?php /*?><th width="18%">
								 Action
							</th>
<?php */?>						</tr>
						</thead>
						<tbody>
                          <?php
					//Maximum of News & Events
					//echo "select * from power_luggage where  luggage_to = ".$routewise3[0]." and luggage_status = 'Dispatched'  and create_date between  $frmdate and $todate";
					 
					 
					 
                     $luggage=mysqli_query($objConn,"select * from power_luggage where  luggage_to = ".$routewise3[0]." and luggage_status = 'Inward'  and create_date between  '".$frmdate."' and '".$todate."'") or die("Vehicle error:".mysql_error());
					 
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="15" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                            <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" valign="middle" <?php echo $cls;?>><?php echo $luggage_row['luggage_status']?></td>
							<?php /*?><td align="center" class="center">
							<span>
                           <a href="luggage_edit.php?id=<?php echo $luggage_row['id']; ?>" title="Edit"><img src="images/edit.png"/></a></span>
                            <span><a href="luggage.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span>
							</td>
<?php */?>						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?><tr><td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Paid Amount : 
                        <?php 
						
						 echo $paid_amt ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo $topay_amt; 
						 ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php 
						echo $credit_amt;?></strong></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="16" align="right"  bgcolor="#F9C6F1"><strong>Total Amount : 
						<?php echo $tot_amt1 =$paid_amt +$topay_amt+$credit_amt;?></strong></td>
                        </tr><?php }?>
						</tbody>
						</table>
						<?php
						}
						?>    <?php }
				  }?>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>